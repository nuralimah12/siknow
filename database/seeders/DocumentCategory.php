<?php

namespace Database\Seeders;

use App\Models\DocumentCategory as ModelsDocumentCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentCategory extends Seeder
{
    /**
     * Run the database seeds.
     */

        public function run(): void
        {
            ModelsDocumentCategory::insert([
                [
                'category' => 'Modul',
                'created_at' => now(),
                'updated_at' => now()
                ],
                [
                'category' => 'Manual Book',
                'created_at' => now(),
                'updated_at' => now()
                ],
                [
                'category' => 'News',
                'created_at' => now(),
                'updated_at' => now()
                ],
            ]);
    }
}
