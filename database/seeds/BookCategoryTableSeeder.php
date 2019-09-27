<?php

use Illuminate\Database\Seeder;

class BookCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book_category = [];

        for ($i = 1; $i <= 100; $i++) {
            $book_category[] = [
                'book_id' => $i,
                'category_id' => rand(1,20)
            ];
        }

        \DB::table('book_category')->insert($book_category);
    }
}
