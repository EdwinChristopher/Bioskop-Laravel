<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("movies")->insert( [
            [
                'movie_title'=>'End Game',
                'deskripsi'=>'Film gacor cuy',
                'duration'=>150,
                'release_date'=>now(),
            ],
            [
                'name'=>'Insidius',
                'deskripsi'=>'Film gacor cuy',
                'duration'=>120,
                'release_date'=>now(),
            ],
            [
                'name'=>'Conjuring',
                'deskripsi'=>'Film gacor cuy',
                'duration'=>120,
                'release_date'=>now(),
            ],
            [
                'name'=>'Pocong',
                'deskripsi'=>'Film gacor cuy',
                'duration'=>120,
                'release_date'=>now(),
            ],
            [
                'name'=>'Pitch Perfect',
                'deskripsi'=>'Film gacor cuy',
                'duration'=>120,
                'release_date'=>now(),
            ]
        ]);
    }
}
