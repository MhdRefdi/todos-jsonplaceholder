<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TodolistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Todolist::factory(10)->create();
    }
}
