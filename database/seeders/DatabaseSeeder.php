<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
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
        // default and dummy users
        User::factory()->email('user@app.com')->create();
        User::factory(14)->create();

        // default and dummy admins
        Admin::factory()->email('super@app.com')->create();
        Admin::factory(9)->create();
    }
}
