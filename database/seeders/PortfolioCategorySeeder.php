<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('portfolio_categories')->insert([
            'name' => "Web"
        ]);
         DB::table('portfolio_categories')->insert([
            'name' => "Mobile"
        ]);
         DB::table('portfolio_categories')->insert([
            'name' => "Logo"
        ]);
         DB::table('portfolio_categories')->insert([
            'name' => "Web Design"
        ]);
         DB::table('portfolio_categories')->insert([
            'name' => "Illustration"
        ]);
    }
}
