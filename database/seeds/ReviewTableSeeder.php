<?php

use Falcon\Models\Account\User;
use Falcon\Models\Shop\Category;
use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        $product = Category::bySlug('gaming')->first()->products()->first();

        $review = $product->review([
            'title'  => 'Sample Review Title',
            'body'   => 'This product is fantastic. I will recommend it to all my friends.',
            'rating' => '5'
        ], $user);

        $review2 = $product->review([
            'title'  => 'Sample Review Title',
            'body'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'rating' => '3'
        ], $user);

        $review3 = $product->review([
            'title'  => 'Sample Review Title',
            'body'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'rating' => '4'
        ], $user);

        $review4 = $product->review([
            'title'  => 'Sample Review Title',
            'body'   => 'I didn\'t like this product. Don\'t buy it.',
            'rating' => '1'
        ], $user);
    }
}
