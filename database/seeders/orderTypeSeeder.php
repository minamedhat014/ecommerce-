<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class orderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('order_types')->delete();
    
        $data = [
            'standard', 
            'non standard', 
            'custimized kitchen', 
        ];
        $formattedData = array_map(fn($name) => ['name' => $name], $data);
        DB::table('order_types')->insert($formattedData);
    }
}
