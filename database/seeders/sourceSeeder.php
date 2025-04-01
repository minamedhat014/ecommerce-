<?php

namespace Database\Seeders;

use App\Models\ProductSource;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class sourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_sources')->delete();
        $data=['Sai','SW','out source'];

        foreach ($data as $row) {
        ProductSource::create([
              'name'=> $row
            ]);
        }
    }
}
