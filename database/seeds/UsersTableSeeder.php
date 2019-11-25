<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'name' => 'Vahidin Talic',
          'email' => 'vahidin.talic77@gmail.com',
          'user_type' => 'admin',
          'password' => bcrypt('admin'),
        ]);
    }
}
