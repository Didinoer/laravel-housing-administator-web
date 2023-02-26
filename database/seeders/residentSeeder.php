<?php

namespace Database\Seeders;

use App\Models\resident;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class residentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        resident::truncate();
        Schema::enableForeignKeyConstraints();
        resident::factory()->count(333)->create();
    }
}
