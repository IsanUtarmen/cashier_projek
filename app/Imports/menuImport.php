<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\menu;

class menuImport implements ToCollection
{
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
            // Assuming your columns in the Excel file have the same names as your database fields
            menu::create([
                
                'Jenis Id' => $row['jenis id'],
                'Nama Menu' => $row['Nama Menu'],
                'Harga' => $row['Harga'],
                'Image' => $row['Image'],
                'Deskripsi' => $row['Deskripsi'],


            ]);
        }
    }
    public function headingRow()
    {
        return 6;
    }
}
