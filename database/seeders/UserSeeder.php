<?php

namespace Database\Seeders;

use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        User::create([
            'l_name'    => 'AOULAD ABDERAHMAN',
            'f_name'    => 'Ibrahim',
            'username'  => 'ibrahim',
            'email'     => 'ibrahim@gmail.com',
            'password'  => Hash::make('123456'),
            'role_id'   => 1,
        ]);

        User::create([
            'l_name'    => 'KHARBOU',
            'f_name'    => 'Adil',
            'username'  => 'adil',
            'email'     => 'adil@gmail.com',
            'password'  => Hash::make('123456'),
            'role_id'   => 2,
        ]);

        User::create([
            'l_name'    => 'ENASSIRI',
            'f_name'    => 'Yassin',
            'username'  => 'yassin',
            'email'     => 'yassin@gmail.com',
            'password'  => Hash::make('123456'),
            'role_id'   => 3,
            'agency_id' => 1,
        ]);

    }
}
