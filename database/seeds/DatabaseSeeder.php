<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('categories')->truncate();
        DB::table('notes')->truncate();

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(NoteSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
