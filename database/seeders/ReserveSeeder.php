<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class ReserveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reserves')->insert([
            'name' => Str::random(10),
            'time' => new DateTime(date('Y-m-d H:i:s', rand(strtotime('2020-12-31 00:00:00'), strtotime('2023-12-31 00:00:00')))),
        ]);
    }
}
