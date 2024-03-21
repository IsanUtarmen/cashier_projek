<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Jenis;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Database\QueryException;
use Exception;
use PDOException;
use App\Exports\MenuExport;
use App\Imports\MenuImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['menu'] = Menu::with(['jenis'])->get();
            $data['jenis'] = Jenis::get(); // Perbaikan penulisan 'jenis'
            return view('menu.index')->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $data = $request->all();
        $data['image'] = $imageName;

        Menu::create($data);

        return redirect('menu')->with('success', 'Data menu berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, string $id)
    {
        $menu = Menu::find($id);

        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $data = $request->all();
        $data['image'] = $imageName;

        $menu->update($data);

        return redirect('menu')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Menu::find($id)->delete();
        return redirect('menu')->with('success', 'Data Menu berhasil dihapus!');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new MenuExport, $date . '_menu.xlsx');
    }

    public function importData(Request $request)
    {
        try {
            $file = $request->file('file');
            \Maatwebsite\Excel\Facades\Excel::import(new MenuImport, $file);
            return redirect('menu')->with('success', 'Data berhasil diimpor!');
        } catch (\Exception $e) {
            return redirect('menu')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
