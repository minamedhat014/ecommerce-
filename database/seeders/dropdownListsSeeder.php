<?php

namespace Database\Seeders;

use App\Models\dropdownLists;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class dropdownListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dropdown_lists')->delete();

        DB::table('dropdown_lists')->insert([ 
            array(
              'id' =>  '1',
                'name' => 'dynamic front lists',
                'model_namespace' => 'App\Models\PageType',
            ),
            array(
                'id' => '2',
                'name' => 'Products type',
                'model_namespace' => 'App\Models\ProductType',
            ),
            array(
                'id' => '3',
                'name' => 'Offers type',
                'model_namespace' => 'App\Models\OffersType',
            ),
            
            array(
                'id' => '4',
                'name' => 'Banks',
                'model_namespace' => 'App\Models\Bank',
            ),
            array(
                'id' => '5',
                'name' => 'cities',
                'model_namespace' => 'App\Models\City',
            ),
            array(
                'id' => '6',
                'name' => 'order status',
                'model_namespace' => 'App\Models\OrderStatus',
            ),
            array(
                'id' => '7',
                'name' => 'Delivery statuses ',
                'model_namespace' => 'App\Models\DeliveryStatus',
            ),
          

           

        ]);

            }
    }

