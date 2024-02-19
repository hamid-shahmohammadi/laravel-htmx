<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        foreach (range(1, 50) as $index) {
            DB::table('posts')->insert([
                'title' => $faker->sentence(),
                'body' => $faker->paragraph(),
            ]);
        }
    }
}
