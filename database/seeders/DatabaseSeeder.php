<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
        User::create([
            'name' => 'Jobayer Al Mahmud',
            'email' => 'jobayer@gmail.com',
            'password' => bcrypt('night'),
        ]);
        $this->call([
            ExpenseSeeder::class
        ]);
    }
}
