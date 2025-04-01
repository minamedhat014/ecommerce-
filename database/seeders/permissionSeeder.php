<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Permissions')->delete();
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $arrayOfPermissionNames  =[

      'view system settings','write system settings',
      'view users','write users',
           

        ];

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'admin'];
        });
    
        Permission::insert($permissions->toArray());  

      
    }
}
