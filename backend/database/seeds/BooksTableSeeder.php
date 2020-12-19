<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Book');

        $books[0] = ['title' => 'Code Complete 2nd Edition', 'authors' => 'Steve McConnell', 'picture' => 'book-0.png'];
        $books[1] = ['title' => 'Clean Code', 'authors' => 'Robert C. Martin', 'picture' => 'book-1.jpg'];
        $books[2] = ['title' => 'Refactoring', 'authors' => 'Martin Fowler', 'picture' => 'book-2.jpg'];
        $books[3] = ['title' => 'Head First Design Patterns', 'authors' => 'Eric Freeman, Bert Bates, Kathy Sierra, and Elisabeth Robson', 'picture' => 'book-3.jpg'];
        $books[4] = ['title' => 'Patterns of Enterprise Application Architecture', 'authors' => 'Martin Fowler', 'picture' => 'book-4.jpg'];
        $books[5] = ['title' => 'Working Effectively With Legacy Code', 'authors' => 'Michael Feathers', 'picture' => 'book-5.jpg'];

        $format = [
            'Paperback',
            'Hardcover',
            'Soft Copy'
        ];

        $condition = [
            'Almost New',
            'Good',
            'Usable'
        ];

        for ($i = 0; $i < 6; $i++) {
            DB::table('books')->insert([
                'title' =>  $books[$i]['title'],
                'authors' =>  $books[$i]['authors'],
                'format' =>  $format[rand(0, 2)],
                'original_price' =>  $faker->numberBetween(200, 300),
                'selling_price' =>  $faker->numberBetween(50, 100),
                'condition' =>  $condition[rand(0, 2)],
                'sold' =>  $faker->boolean(),
                'picture' => $books[$i]['picture'],
                'created_at' =>  $faker->date(),
            ]);
            File::copy(base_path().'/public/seed-images/' . $books[$i]['picture'], base_path().'/public/images/' . $books[$i]['picture']);
        }
    }
}
