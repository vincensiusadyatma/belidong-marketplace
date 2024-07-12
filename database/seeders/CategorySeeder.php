<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                "name" => "Ebook",
                "slug" => "ebook",
                "icon" => "images/ic_ebook.svg",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Course",
                "slug" => "course",
                "icon" => "images/ic_ebook.svg",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Template",
                "slug" => "template",
                "icon" => "images/ic_ebook.svg",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Font",
                "slug" => "font",
                "icon" => "images/ic_ebook.svg",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]
        ]);
    }
}
