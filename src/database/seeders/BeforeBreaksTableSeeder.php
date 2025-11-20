<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BeforeBreaksTableSeeder extends Seeder
{
    public function run()
    {
        //----2025年11月5日(水)----
        $param = [
            'beforecorrection_id' => 1,
            'break_index'     => 1,
            'before_break_start'   => Carbon::create(2025, 11, 5, 12, 0, 0),
            'before_break_end'     => Carbon::create(2025, 11, 5, 13, 0, 0),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('beforebreaks')->insert($param);
        $param = [
            'beforecorrection_id' => 1,
            'break_index'     => 2,
            'before_break_start'   => Carbon::create(2025, 11, 5, 15, 0, 0),
            'before_break_end'     => Carbon::create(2025, 11, 5, 15, 15, 0),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('beforebreaks')->insert($param);

        //----2025年11月8日(土)----
        $param = [
            'beforecorrection_id' => 2,
            'break_index'     => 1,
            'before_break_start'   => null,
            'before_break_end'     => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('beforebreaks')->insert($param);

        //----2025年12月1日(月)----
        $param = [
            'beforecorrection_id' => 3,
            'break_index'     => 1,
            'before_break_start'   => Carbon::create(2025, 12, 1, 12, 0, 0),
            'before_break_end'     => Carbon::create(2025, 12, 1, 13, 0, 0),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('beforebreaks')->insert($param);

        //----2025年12月2日(火)----
        $param = [
            'beforecorrection_id' => 4,
            'break_index'     => 1,
            'before_break_start'   => Carbon::create(2025, 12, 2, 12, 0, 0),
            'before_break_end'     => Carbon::create(2025, 12, 2, 13, 0, 0),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('beforebreaks')->insert($param);
    }
}
