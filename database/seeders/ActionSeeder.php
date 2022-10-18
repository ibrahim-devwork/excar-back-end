<?php

namespace Database\Seeders;

use App\Models\Action;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Action::truncate();
        Schema::enableForeignKeyConstraints();
        
        $actions = [
            'add-client',
            'update-client',
            'delete-client',
            'active-client',
            'unactive-client',
        ];

        foreach($actions as $action) {
            Action::create(['action' => $action]);
        }
        
    }
}
