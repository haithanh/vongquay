<?php

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
        $this->call(StoreSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(ItemToStoreSeeder::class);
        $this->call(CodeSeeder::class);
    }
}
