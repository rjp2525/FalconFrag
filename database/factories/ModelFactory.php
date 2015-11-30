<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
 */

$factory->define(Falcon\Models\Account\User::class, function ($faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => str_random(10),
        'remember_token' => str_random(10)
    ];
});

$factory->defineAs(Falcon\Models\Vault\Role::class, 'admin', function ($faker) {
    return [
        'name'        => 'Administrator',
        'node'        => 'admin',
        'description' => $faker->text(60),
        'level'       => 3
    ];
});

$factory->defineAs(Falcon\Models\Vault\Role::class, 'staff', function ($faker) {
    return [
        'name'        => 'Staff',
        'node'        => 'staff',
        'description' => $faker->text(60),
        'level'       => 2
    ];
});

$factory->define(Falcon\Models\Vault\Role::class, function ($faker) {
    return [
        'name'        => 'Client',
        'node'        => 'client',
        'description' => $faker->text(60)
    ];
});

$factory->define(Falcon\Models\Vault\Permission::class, function ($faker) {
    return [
        'name'        => $faker->word . ' ' . $faker->word,
        'node'        => $faker->word . '.' . $faker->word,
        'description' => $faker->text(60)
    ];
});

$factory->define(Falcon\Models\Shop\Product::class, function ($faker) {
    $word = $faker->word;

    return [
        'name'              => ucfirst($word),
        'slug'              => \Illuminate\Support\Str::slug($word),
        'description_short' => $faker->text(140),
        'description'       => '<p>' . $faker->paragraph(8) . '</p><p>' . $faker->paragraph(8) . '</p><p>' . $faker->paragraph(8) . '</p>'
    ];
});

$factory->define(Falcon\Models\Shop\Option::class, function ($faker) {
    $types = ['checkbox', 'email', 'password', 'radio', 'text', 'url', 'dropdown'];
    $word = $faker->word;
    $type = $faker->randomElement($types);

    if ($type == 'radio' || $type == 'dropdown') {
        $options = array();
        $option_word = $faker->word;
        for ($i = 0; $i < $faker->randomDigitNotNull; $i++) {
            array_add($options, strtolower($option_word), ucfirst($option_word));
        }

        return [
            'field_id' => \Illuminate\Support\Str::slug($word, '_'),
            'name'     => ucfirst($word),
            'type'     => $type,
            'options'  => $options,
            'required' => $faker->boolean
        ];
    }

    return [
        'field_id' => \Illuminate\Support\Str::slug($word, '_'),
        'name'     => ucfirst($word),
        'type'     => $type,
        'required' => $faker->boolean
    ];
});
