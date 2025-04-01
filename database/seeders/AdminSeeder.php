<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('Admins')->delete();
        Admin::create([
            'name' => 'mina medhat',
            'email' => 'mina.medhat014@gmail.com',
            'password' => bcrypt('Donty&&147'),
            'created_by'=>'system',
            'phone'=>'01278397789'
        ])->assignRole('super admin');
    }
}
