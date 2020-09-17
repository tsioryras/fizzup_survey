<?php

namespace Database\Seeders;

use App\Models\Fizzup_customers;
use App\Models\Fizzup_surveys;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = Fizzup_customers::all();
        foreach ($customers as $customer) {
            $survey = Fizzup_surveys::factory()->make();
            $survey->customer()->associate($customer);
            $survey->save();
        }
    }
}
