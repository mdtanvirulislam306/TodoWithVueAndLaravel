<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
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
        DB::table ('todo')->insert ([
            'todo' => Str::random(20),
            'status' => false,
        ]);
    }
}
