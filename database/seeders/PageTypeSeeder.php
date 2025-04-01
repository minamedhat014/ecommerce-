<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('page_types')->delete();
        $data = [
            'nav bar', 
            'footer', 
            'category',
        ];
        $formattedData = array_map(fn($name) => ['name' => $name], $data);
        DB::table('page_types')->insert($formattedData);
    }
    }

