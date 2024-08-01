<?php

namespace Database\Seeders;

use App\Models\Divisi as ModelsDivisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Divisi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsDivisi::insert(
            [
            'name' => 'Teknologi Informasi',
            'created_at' => now(),
            'updated_at' => now()
            ],
        );
    }
}
