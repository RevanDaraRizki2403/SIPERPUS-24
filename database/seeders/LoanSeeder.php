<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("loans")->insert(
            [[
                'user_id'=>1,
                'loan_at'=>now()->toDateString(),
                'return_at'=>now()->toDateString(),
            ]],

        );}
}
