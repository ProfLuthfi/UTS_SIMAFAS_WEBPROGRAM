<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KondisiSeeder extends Seeder
{
    private $kondisis = [
        ["bagus", "Bagus"],
        ["perbaikan", "Perbaikan"],
        ["rusak", "Rusak"],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->kondisis as $role) {
            \App\Models\Kondisi::create([
                "guid" => $role[0],
                "name" => $role[1],
            ]);
        }
    }
}
