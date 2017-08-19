<?php

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $start    = new Datetime('1st October 2015');
        $end      = new Datetime('1st Jan 2017');
        $records    =   [
            [
                'id'    =>  14,
                'title' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.',
                'published' =>  1,
                'category_id'   =>  1,
                'description' => ' Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),
            ],
            [
                'id'    =>  15,
                'title' => 'Nulla consequat massa quis enim.',
                'published' =>  1,
                'category_id'   =>  2,
                'description' => 'Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),
            ],
            [
                'id'    =>  16,
                'title' => 'Donec pede justo, fringilla vel, aliquet nec',
                'published' =>  1,
                'category_id'   =>  1,
                'description' => 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. 
Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.
',
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),
            ],
            [
                'id'    =>  17,
                'title' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.',
                'published' =>  1,
                'category_id'   =>  3,
                'description' => ' Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),
            ],
            [
                'title' => 'Nulla consequat massa quis enim.',
                'published' =>  1,
                'category_id'   =>  2,
                'description' => 'Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),
            ],
            [
                'title' => 'Donec pede justo, fringilla vel, aliquet nec',
                'published' =>  1,
                'category_id'   =>  3,
                'description' => 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. 
Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.
',
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),
            ],

        ];

        //Check if table is empty before seeding ...
        if(DB::table('articles')->get()->count() == 0){
            foreach ($records   as  $record){
                DB::table('articles')->insert($record);
            }
        }
    }

}
