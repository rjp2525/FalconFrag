<?php

use Falcon\Models\Store\Category;
use Falcon\Models\Store\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create some fake products
        $gaming_products = factory(Product::class, 50)->make();
        $mc_products = factory(Product::class, 10)->make();
        $web_products = factory(Product::class, 8)->make();
        $dedicated_products = factory(Product::class, 12)->make();
        $vps_products = factory(Product::class, 9)->make();

        // Find the categories
        $gaming = Category::bySlug('gaming');
        $mc = Category::bySlug('gaming')->children()->bySlug('minecraft');
        $web = Category::bySlug('web');
        $dedicated = Category::bySlug('dedicated');
        $vps = Category::bySlug('vps');

        // Attach the products to their relevant categories
        $gaming->products()->saveMany($gaming_products);
        $mc->products()->saveMany($mc_products);
        $web->products()->saveMany($web_products);
        $dedicated->products()->saveMany($dedicated_products);
        $vps->products()->saveMany($vps_products);
    }
}
