<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => "new",
            'email' => "new@gmail.com",
            'password' => bcrypt('new@gmail.com'),
            'role' => "is_admin"
        ]);
    }
}
