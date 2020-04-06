<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =
            [
                "Bookmaker",
                "Books",
                "Car Services",
                "Clothing",
                "Counselling Services",
                "Dental",
                "Financial Services",
                "Food Service",
                "Health &amp; Beauty",
                "Hotel &amp; Accommodation",
                "Household Goods &amp; Services",
                "IT &amp; Electronics",
                "Leisure and Entertainment",
                "Other",
                "Pets &amp; Animal Welfare",
                "Sports",
            ];
        $insert = [];
        foreach ($categories as $category) {
            $insert[] = ['name' => $category];
        }
        DB::table('service_categories')
          ->insertOrIgnore(
              $insert
          );
    }
}
