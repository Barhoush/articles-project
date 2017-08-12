<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
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
        $records =   [
            [
                'id'    =>  1,
                'name'  =>  'Mohammad   Barhoush',
                'email' =>  'MohammadBarhoush@gmail.com',
                'password'  =>  bcrypt('testing'),
                'country'   =>  'PS',
                'phone' =>  '0599732856',
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),

            ],
            [
                'id'    =>  2,
                'name'  =>  'Qasem Sweilem',
                'email' =>  'qasem@economies.com',
                'password'  =>  bcrypt('testing'),
                'country'   =>  'US',
                'phone' =>  '0597024983',
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),

            ],
            [
                'id'    =>  3,
                'name'  =>  'John Doe',
                'email' =>  'john@world.com',
                'password'  =>  bcrypt('testing'),
                'country'   =>  'UK',
                'phone' =>  '00022001',
                'created_at'    =>  new DateTime('@' . mt_rand($start->getTimestamp(), $end->getTimestamp())),
            ],

        ];


        //Check if table is empty before seeding ...
        if(DB::table('users')->get()->count() == 0){
            foreach ($records   as  $record){
                DB::table('users')->insert($record);
            }
        }
    }
}
