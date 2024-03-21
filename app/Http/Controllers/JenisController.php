<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use PDOException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Paket\Exports;
use App\Exports\JenisExport;
use App\Imports\JenisImport;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;




class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['jenis'] = Jenis::get();
            return view('jenis.index')->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new JenisExport, $date . '_jenis.xlsx');
    }

    // public function importData(Request $request)
    // {
    //     try {

    //         $file = $request->file('file');

    //         \Maatwebsite\Excel\Facades\Excel::import(new JenisImport, $file);

    //         return redirect('jenis')->with('success', 'Data berhasil diimpor!');
    //     } catch (\Exception $e) {
    //         return redirect('jenis')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    //     }
    // }

    // public function importData()
    // {
    //     Excel::import(new JenisImport, request()->file('import'));
    //     return redirect('jenis')->with('success', 'Import data paket berhasil!');
    // }

    public function importData()
    {
        Excel::import(new JenisImport, request()->file('import')); // Replace XLSX with the appropriate reader type
        return redirect('jenis')->with('success', 'Import data paket berhasil!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJenisRequest $request)
    {
        // Jenis::create($request->all());
        DB::beginTransaction();
        jenis::create($request->all());
        DB::commit();

        return redirect('jenis')->with('success', 'Data produk berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisRequest $request, string $id)
    {
        $jenis = Jenis::find($id)->update($request->all());
        return redirect('jenis')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Jenis::find($id)->delete();
        return redirect('jenis')->with('success', 'Data jenis berhasil dihapus!');
    }
}
