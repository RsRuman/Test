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
        factory(App\Division::class, 10)->create();
        factory(App\District::class, 50)->create();
        factory(App\Thana::class, 200)->create();
    }
}
