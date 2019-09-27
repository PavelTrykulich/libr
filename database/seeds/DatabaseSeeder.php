<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Author::class, 50)->create();
        factory(\App\Category::class, 20)->create();
        factory(\App\Book::class, 100)->create();
        $this->call(BookCategoryTableSeeder::class);
    }
}
