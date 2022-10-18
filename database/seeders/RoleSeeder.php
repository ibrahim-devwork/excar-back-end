<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Helpers\Helper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        Role::create(['role' => Helper::INTEGRATOR]);
        Role::create(['role' => Helper::Admin]);
        Role::create(['role' => Helper::User]);
    }
}
