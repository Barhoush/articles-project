<?php

use Illuminate\Database\Seeder;

class FactorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $records    =   [
            [
                'name'  =>  'NASDAQ',
                'factor'    =>  3,
                'price' =>  1.0,
                'created_at'    =>  new DateTime()
            ],
            [
                'name'  =>  'Dow Jones',
                'factor'    =>  4,
                'price' =>  1.0,
                'created_at'    =>  new DateTime()
            ],
            [
                'name'  =>  'Gold',
                'factor'    =>  5,
                'price' =>  1.0,
                'created_at'    =>  new DateTime()
            ],

        ];

        //Check if table is empty before seeding ...
        if(DB::table('factors')->get()->count() == 0){
            foreach ($records   as  $record){
                DB::table('factors')->insert($record);
            }
        }
    }
}
