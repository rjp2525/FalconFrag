<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OAuthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ensure the OAuth clients table is empty
        DB::table('oauth_clients')->delete();

        // Generate a Carbon datetime for timestamp fields
        $datetime = Carbon::now();

        // Create a demo OAuth2 client
        $client_id = str_random(25);
        $client_secret = str_random(50);
        $client_name = 'Falcon Frag Android';

        $client = [
            'id' => $client_id,
            'secret' => $client_secret,
            'name' => $client_name,
            'created_at' => $datetime,
            'updated_at' => $datetime,
        ];

        // Insert the client into the database
        DB::table('oauth_clients')->insert($client);

        // Clear the OAuth grants table
        DB::table('oauth_grants')->delete();

        // Create grant records in the database for password authentication
        $grants = [
            [
                'id' => 'password',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'id' => 'refresh_token',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
        ];

        // Insert the grants to the table
        DB::table('oauth_grants')->insert($grants);

        // Clear the client grants table
        DB::table('oauth_client_grants')->delete();

        // Create the client -> grant relationships
        $client_grants = [
            [
                'client_id' => $client_id,
                'grant_id' => 'password',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'client_id' => $client_id,
                'grant_id' => 'refresh_token',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
        ];

        // Insert the client -> grant relationships
        DB::table('oauth_client_grants')->insert($client_grants);
    }
}
