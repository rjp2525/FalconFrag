<?php

use Falcon\Models\Shop\Category;
use Falcon\Models\Shop\Product;
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
        $gaming = Category::bySlug('gaming')->first();
        $mc = Category::bySlug('gaming')->first()->children()->bySlug('minecraft')->first();
        $web = Category::bySlug('web')->first();
        $dedicated = Category::bySlug('dedicated')->first();
        $vps = Category::bySlug('vps')->first();

        // Attach the products to their relevant categories
        $gaming->products()->saveMany($gaming_products);
        $mc->products()->saveMany($mc_products);
        $web->products()->saveMany($web_products);
        $dedicated->products()->saveMany($dedicated_products);
        $vps->products()->saveMany($vps_products);
    }
}
