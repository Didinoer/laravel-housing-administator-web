<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =['admin','IT'];
        Schema::disableForeignKeyConstraints();
        role::truncate();
        Schema::enableForeignKeyConstraints();
        foreach ($data as $value) {
            role::insert([
            'name' => $value,
            'created_at' => now(),
            'updated_at' => now()

        ]);
    }

}
}
