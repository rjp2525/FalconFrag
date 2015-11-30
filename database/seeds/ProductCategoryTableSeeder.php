<?php

use Falcon\Models\Shop\Category;
use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create gaming category
        $gaming = Category::create([
            'slug'          => 'gaming',
            'title'         => 'Game & Voice',
            'description'   => 'We provide huge library of game and voice servers on the fastest hardware and networks for an amazing overall experience!',
            'hidden'        => false,
            'display_order' => 0
        ]);

        // Create web category
        $web = Category::create([
            'slug'          => 'web',
            'title'         => 'Web & Email',
            'description'   => 'Our email hosting solutions are ideal for businesses or individuals looking for a reliable email service.',
            'hidden'        => false,
            'display_order' => 1
        ]);

        // Create dedicated server category
        $dedicated = Category::create([
            'slug'          => 'dedicated',
            'title'         => 'Dedicated Servers',
            'description'   => 'On-demand dedicated servers that offer predictable performance for your most intensive workloads.',
            'hidden'        => false,
            'display_order' => 2
        ]);

        // Create virtual private server category
        $vps = Category::create([
            'slug'          => 'vps',
            'title'         => 'Virtual Private Servers',
            'description'   => 'For a semi-dedicated solution, our Virtual Private Servers offer shared CPU access with guaranteed hard drive and memory resources.',
            'hidden'        => false,
            'display_order' => 3
        ]);

        // Create Minecraft game category
        $minecraft = new Category([
            'slug'          => 'minecraft',
            'title'         => 'Minecraft',
            'description'   => 'Minecraft is a game about breaking and placing blocks. At first, people built structures to protect against nocturnal monsters, but as the game grew players worked together to create wonderful, imaginative things.',
            'hidden'        => false,
            'display_order' => 0
        ]);

        // Relate the Minecraft subcategory to the Gaming category
        $gaming->children()->save($minecraft);
    }
}
