<?php

namespace Database\Seeders;

use App\Models\DeliveryStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DeliveryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('delivery_statuses')->delete();
    
        $data = [
            'stored only successfully', 
            'installed successfully', 
            'stored with some missing items', 
            'stored with complaint', 
            'installed with some missing items', 
            'installed with complaint', 
            'returned', 
            'postponed'
        ];
        $formattedData = array_map(fn($name) => ['name' => $name], $data);
        DB::table('delivery_statuses')->insert($formattedData);
    }
}
