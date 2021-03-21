<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory([
            'name'     => 'System',
            'email'    => 'system@app.com',
            'password' => bcrypt('password'),
        ])->approved()->create();
    }
}
