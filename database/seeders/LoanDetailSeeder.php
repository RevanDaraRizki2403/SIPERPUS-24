<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("loan_details")->insert([
            'loan_id'=>1,
            'book_id'=>1,
            'is_return'=>1,

        ]);
    }
}
