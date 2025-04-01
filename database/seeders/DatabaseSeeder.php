<?php

namespace Database\Seeders;

 // use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CustomerHomeTypes;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call(RoleSeeder::class);
       $this->call(permissionSeeder::class);
       $this->call(AdminSeeder::class);
       $this->call(offertypeSeeder::class);
       $this->call(bankSeeder::class);
       $this->call(dropdownListsSeeder::class);
       $this->call(citySeeder::class);
       $this->call(orderStatusSeeder::class);
       $this->call(mediaSeeder::class);
       $this->call(DeliveryStatusSeeder::class);
       $this->call(SocialMediaLinkSeeder::class);
       $this->call(PageTypeSeeder::class);
       $this->call(ChartOfAccountsSeeder::class);
       
    }
}
