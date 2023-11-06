<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Hash; //membuat text menjadi terenkripsi
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return User::updateOrCreate(
            [
                'email' => $row['email']
            ],
            [
                'name' => $row['nama'],
                'email' => $row['email'],
                'password' => Hash::make($row['password']),
                'role' => $row['role'],
            ]
        );
    }
}
