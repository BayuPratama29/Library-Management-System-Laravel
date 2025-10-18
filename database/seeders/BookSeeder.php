<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        $books = [
            [
                'title' => '1984',
                'author_id' => 1,
                'publisher_id' => 1,
                'category_id' => 1,
                'year' => 1949,
                'stock' => 5,
                'description' => 'A dystopian social science fiction novel and cautionary tale about the future.'
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'author_id' => 6,
                'publisher_id' => 2,
                'category_id' => 1,
                'year' => 1960,
                'stock' => 3,
                'description' => 'A gripping tale of a young girl\'s coming-of-age in the Deep South and the crisis of conscience that rocked a small community.'
            ],
            [
                'title' => 'The Great Gatsby',
                'author_id' => 10,
                'publisher_id' => 3,
                'category_id' => 1,
                'year' => 1925,
                'stock' => 4,
                'description' => 'A classic American novel set in the Jazz Age on Long Island, near New York City.'
            ],
            [
                'title' => 'Pride and Prejudice',
                'author_id' => 6,
                'publisher_id' => 1,
                'category_id' => 1,
                'year' => 1813,
                'stock' => 6,
                'description' => 'A romantic novel of manners written by Jane Austen.'
            ],
            [
                'title' => 'The Catcher in the Rye',
                'author_id' => 8,
                'publisher_id' => 4,
                'category_id' => 1,
                'year' => 1951,
                'stock' => 4,
                'description' => 'A story by J. D. Salinger, partially published in serial form in 1945–46.'
            ]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}