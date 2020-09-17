<?php

namespace Database\Seeders;

use App\Models\Fizzup_customers;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fizzup_customers::factory(20)->create();
    }
}
