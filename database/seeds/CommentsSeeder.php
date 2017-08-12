<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $start    = new Datetime('1st July 2017');
        $end      = new Datetime('1st August 2017');
        $records    =   [
            [
                'description'   =>  'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.',
                'article_id'    =>  17,
                'user_id'   =>  1,
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),
            ],
            [
                'description'   =>  'Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',
                'article_id'    =>  15,
                'user_id'   =>  2,
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),
            ],

            [
                'description'   =>  'Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',
                'article_id'    =>  16,
                'user_id'   =>  3,
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),
            ],

            [
                'description'   =>  'Nulla consequat massa quis enim.',
                'article_id'    =>  15,
                'user_id'   =>  3,
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),
            ],
            [
                'description'   =>  'Nulla consequat massa quis enim.',
                'article_id'    =>  14,
                'user_id'   =>  1,
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),
            ],
            [
                'description'   =>  'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.',
                'article_id'    =>  17,
                'user_id'   =>  1,
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),
            ],
            [
                'description'   =>  'Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',
                'article_id'    =>  17,
                'user_id'   =>  2,
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),
            ],

            [
                'description'   =>  'Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',
                'article_id'    =>  16,
                'user_id'   =>  3,
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),
            ],

            [
                'description'   =>  'Nulla consequat massa quis enim.',
                'article_id'    =>  14,
                'user_id'   =>  3,
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),
            ],
            [
                'description'   =>  'Nulla consequat massa quis enim.',
                'article_id'    =>  15,
                'user_id'   =>  1,
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),
            ],

        ];


        //Check if table is empty before seeding ...
        if(DB::table('comments')->get()->count() == 0){
            foreach ($records   as  $record){
                try{
                    DB::table('comments')->insert($record);
                }catch (Exception   $exception){
                    //Maybe and at some how a foreign key constraint fails due to lost id given
                    continue;
                }
            }
        }
    }
}
