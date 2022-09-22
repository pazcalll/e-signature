<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // data seeder berupa lecturer_id dan student_id pada SignatureSeeder mungkin perlu disesuaikan dengan
        // kondisi terkini dari database yang dipakai oleh server
        $this->call(SignatureSeeder::class);
    }
}
