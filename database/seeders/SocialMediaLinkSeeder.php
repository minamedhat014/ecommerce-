<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SocialMediaLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('social_media_links')->delete();
    
        DB::table('social_media_links')->insert([ 
            array(
              'id' =>  '1',
                'name' => 'face book',
                'icon' => 'fa-brands fa-facebook',
            ),
            array(
                'id' => '2',
                'name' => 'instagram',
                'icon' => 'fa-brands fa-instagram',
            ),
            array(
                'id' => '3',
                'name' => 'linkedin',
                'icon' => 'fa-brands fa-linkedin',
            ),
            array(
                'id' => '4',
                'name' => 'tiktok',
                'icon' => 'fa-brands fa-tiktok',
            ),
            array(
                'id' => '5',
                'name' => 'twitter',
                'icon' => 'fa-brands fa-twitter',
            ),
            array(
                'id' => '6',
                'name' => 'youtube',
                'icon' => 'fa-brands fa-youtube',
            ),
            array(
                'id' => '7',
                'name' => 'whats app',
                'icon' => 'fa-brands fa-whatsapp',
            ),
            
      
      

        ]);

    }
}
