<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Publisher;

class PublisherSeeder extends Seeder
{
    public function run()
    {
        $publishers = [
            [
                'name' => 'Penguin Random House',
                'address' => '1745 Broadway, New York, NY 10019',
                'phone' => '+1-212-782-9000'
            ],
            [
                'name' => 'HarperCollins',
                'address' => '195 Broadway, New York, NY 10007',
                'phone' => '+1-212-207-7000'
            ],
            [
                'name' => 'Simon & Schuster',
                'address' => '1230 Avenue of the Americas, New York, NY 10020',
                'phone' => '+1-212-698-7000'
            ],
            [
                'name' => 'Macmillan Publishers',
                'address' => '120 Broadway, New York, NY 10271',
                'phone' => '+1-212-226-7500'
            ],
            [
                'name' => 'Hachette Book Group',
                'address' => '1290 Avenue of the Americas, New York, NY 10104',
                'phone' => '+1-212-364-1100'
            ]
        ];

        foreach ($publishers as $publisher) {
            Publisher::create($publisher);
        }
    }
}