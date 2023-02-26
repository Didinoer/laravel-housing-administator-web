<?php

namespace Database\Seeders;

use App\Models\block;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class blockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[ 'A','B','C','D','E','F','G','H'];
            Schema::disableForeignKeyConstraints();
            block::truncate();
            Schema::enableForeignKeyConstraints();
            foreach ($data as $value) {
            block::insert([
            'block_name' => $value,
            'created_at' => now(),
            'updated_at' => now()

        ]);
    }
    }


}

