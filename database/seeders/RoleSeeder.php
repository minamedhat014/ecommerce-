<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->delete();
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $arrayOfRolesNames  =[
            'super admin','admin' ,'manager','editor'
        ];

        $roles = collect($arrayOfRolesNames)->map(function ($roles) {
            return ['name' => $roles, 'guard_name' => 'admin'];
        });
    
    Role::insert($roles->toArray());  

      
    }

}
        
  

