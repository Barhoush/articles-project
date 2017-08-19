<?php

use Illuminate\Database\Seeder;

class UpdateCategoriesRecords extends Seeder
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
                'id'    =>  1,
                'name' => 'NASDAQ',
                'slice' =>  'nasdaq',
                'published' => 1,
            ],
            [
                'id'    =>  2,
                'name' => 'Dow Jones',
                'slice' =>  'dow-jones',
                'published' => 1,
            ],
            [
                'id'    =>  3,
                'name' => 'Gold',
                'slice' =>  'gold',
                'published' => 1,
            ],

        ];

        DB::table('categories')->delete();
        //Check if table is empty before seeding ...
        if(DB::table('categories')->get()->count() == 0){
            foreach ($records   as  $record){
                DB::table('categories')->insert($record);
            }
        }
    }
}
