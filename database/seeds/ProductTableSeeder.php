<?php

use Falcon\Models\Shared\Price;
use Falcon\Models\Shop\Category;
use Falcon\Models\Shop\Option;
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
        $ark = new Product([
            'name'              => 'ARK: Survival Evolved',
            'slug'              => 'ark-survival-evolved',
            'description_short' => 'As a man or woman stranded naked, freezing and starving on a mysterious island, you must hunt, craft, grow, and build shelters to survive.',
            'description'       => 'As a man or woman stranded naked, freezing and starving on the shores of a mysterious island called ARK, you must hunt, harvest resources, craft items, grow crops, research technologies, and build shelters to withstand the elements. Use your cunning and resources to kill or tame & breed the leviathan dinosaurs and other primeval creatures roaming the land, and team up with or prey on hundreds of other players to survive, dominate... and escape!',
            'display_order'     => 0
        ]);

        $ark_options_server_type = new Option([
            'field_id' => 'server_type',
            'name'     => 'Server Type',
            'type'     => 'dropdown',
            'options'  => json_encode([
                'public'  => 'Public',
                'private' => 'Private'
            ])
        ]);

        $ark_options_slots = new Option([
            'field_id' => 'slots',
            'name'     => 'Player Slots',
            'type'     => 'dropdown',
            'options'  => json_encode([
                12 => '12 Players',
                13 => '13 Players',
                14 => '14 Players',
                15 => '15 Players',
                16 => '16 Players',
                17 => '17 Players',
                18 => '18 Players',
                19 => '19 Players',
                20 => '20 Players',
                21 => '21 Players',
                22 => '22 Players',
                23 => '23 Players',
                24 => '24 Players',
                25 => '25 Players',
                26 => '26 Players',
                27 => '27 Players',
                28 => '28 Players',
                29 => '29 Players',
                30 => '30 Players',
                31 => '31 Players',
                32 => '32 Players'
            ])
        ]);

        $ark_prices = new Price([
            'monthly'    => 0.99,
            'quarterly'  => 0.96,
            'semiannual' => 0.93,
            'annual'     => 0.90,
            'biennial'   => 0.87
        ]);

        /*$bf4 = Product::create([
        'name'              => 'Battlefield 4',
        'slug'              => 'battlefield-4',
        'description_short' => 'Battlefield 4 is the genre-defining action blockbuster made from moments that blur the line between game and glory.',
        'description'       => 'Battlefield 4 is the genre-defining action blockbuster made from moments that blur the line between game and glory. Fueled by the next-generation power and fidelity of Frostbite" 3 Battlefield 4 provides a visceral dramatic experience unlike any other. Only in Battlefield can you demolish the buildings shielding your enemy. Only in Battlefield will you lead an assault from the back of a gun boat. Battlefield grants you the freedom to do more and be more while playing to your strengths and carving your own path to victory. In addition to its hallmark multiplayer Battlefield 4 features an intense dramatic character-driven campaign that starts with the evacuation of American VIPs from Shanghai and follows your squad\'s struggle to find its way home. There is no comparison. Immerse yourself in the glorious chaos of all-out war found only in Battlefield.',
        'display_order'     => 1
        ]);

        $csgo = Product::create([
        'name'              => 'Counter-Strike: Global Offensive',
        'slug'              => 'counter-strike-global-offensive',
        'description_short' => 'Valve\'s original team-based modern-military first-person shooter, now in its fourth iteration, gets rebuilt for competitive play.',
        'description'       => 'Valve\'s original team-based modern-military first-person shooter, now in its fourth iteration, gets rebuilt for competitive play circa 2012, featuring new maps, weapons, gameplay mechanics, and game modes.',
        'display_order'     => 2
        ]);*/

        // Create some fake products
        //$gaming_products = factory(Product::class, 50)->make();
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

        $gaming->products()->save($ark);
        $gaming->products()->bySlug('ark-survival-evolved')->first()->prices()->save($ark_prices);
        $gaming->products()->bySlug('ark-survival-evolved')->first()->options()->save($ark_options_server_type);
        //$gaming->products()->bySlug('ark-survival-evolved')->first()->options()->save($ark_options_slots);

        // Attach the products to their relevant categories
        //$gaming->products()->saveMany($gaming_products);
        $mc->products()->saveMany($mc_products);
        $web->products()->saveMany($web_products);
        $dedicated->products()->saveMany($dedicated_products);
        $vps->products()->saveMany($vps_products);
    }
}
