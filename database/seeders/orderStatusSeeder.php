<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class orderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_statuses')->delete();
        $data=['open','confirmed','sent to factory','sent back to branch','ready','closed','cancelled','returned'];
        foreach ($data as $row) {
            OrderStatus::create([
                  'name'=> $row
                ]);
    }
    }
}
