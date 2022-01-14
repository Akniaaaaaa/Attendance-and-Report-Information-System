<?php

namespace App\Imports;

use App\Models\Soal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SoalImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Soal([
            'nomor_soal' => $row['nomor_soal'],
            'soal' => $row['soal'],
            'pilgan_a' => $row['pilgan_a'],
            'pilgan_b' => $row['pilgan_b'],
            'pilgan_c' => $row['pilgan_c'],
            'pilgan_d' => $row['pilgan_d'],
            'pilgan_e' => $row['pilgan_e'],
            'id_kategori' => $row['id_kategori'],
            'kunci_jawaban' => $row['kunci_jawaban'],
            'bobot' => $row['bobot'],
            'paket' => $row['paket'],
        ]);
    }
}