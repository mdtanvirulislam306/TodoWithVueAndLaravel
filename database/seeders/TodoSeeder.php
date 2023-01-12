<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TodoModel;
class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Todo Sheed
        
        TodoModel::factory()->count(5)->create();
    }
}
