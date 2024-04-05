<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaucesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('sauces')->insert([
        [
            'id' => 1,
            'userId' => Auth::user()->id,
            'name' => 'sauce 1',
            'manufacturer' => 'sauce 1',
            'description' => 'sauce 1',
            'mainPepper' => 'sauce 1',
            'imageURL' => 'sauces_images/vr5uzj7VuKDtFPI6xOdPWs8iPdjO03u5thwSusV3.jpg',
            'heat' => '9',
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => [],
            'usersDisliked' => [],
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'id' => 2,
            'userId' => Auth::user()->id,
            'name' => 'sauce 2',
            'manufacturer' => 'sauce 2',
            'description' => 'sauce 2',
            'mainPepper' => 'sauce 5',
            'imageURL' => 'sauces_images/G2briT2u3Drf79p88lvdd0uzy0VBoJlWLNkazgP2.jpg',
            'heat' => '5',
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => [],
            'usersDisliked' => [],
            'created_at' => now(),
            'updated_at' => now()
        ]
        ]);
    }
}
