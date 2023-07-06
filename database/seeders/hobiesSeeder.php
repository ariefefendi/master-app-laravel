<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class hobiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobies')->insert(
            [
                ['name' => 'Singing'],
                ['name' => 'Reading'],
                ['name' => 'Travelling']
            ],
        );
    }
}