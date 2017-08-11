<?php

use Illuminate\Database\Seeder;

class CategoriesSeed extends Seeder
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
                'name' => 'News',
                'slice' =>  'news',
                'published' => 1,
            ],
            [
                'id'    =>  2,
                'name' => 'Sport',
                'slice' =>  'sports',
                'published' => 1,
            ],
            [
                'id'    =>  3,
                'name' => 'Economics',
                'slice' =>  'economics',
                'published' => 1,
            ],

        ];

        //Check if table is empty before seeding ...
        if(DB::table('categories')->get()->count() == 0){
            foreach ($records   as  $record){
                DB::table('categories')->insert($record);
            }
        }
    }
}
