<?php

namespace App\Exports;

use App\Models\Fasilita;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportFasilitas implements FromCollection, WithHeadings
{
    public function collection()
    {
          // Ambil semua data Fasilita
          $fasilitas = Fasilita::all();

          // Inisialisasi nomor urutan
          $counter = 1;

          // Menggunakan map untuk menambahkan nomor urutan ke dalam data
          $data = $fasilitas->map(function ($fasilita) use (&$counter) {
              // Tambahkan nomor urutan ke dalam data fasilitas
              $fasilita->No = $counter++;
              return $fasilita;
          });

          return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Kondisi',
            'Nama Fasilitas',
            'Alamat',
            'Penanggung Jawab',
            'Dibuat pada',
            'Diperbarui pada',
        ];
    }
}

