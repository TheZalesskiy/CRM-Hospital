<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*//admin
        DB::table('users')->insert([
            'name' => 'Adam Smith',
            'email' => 'adam@smith.com',
            'password' => bcrypt('123123'),
            'phone' => '570940857',
            'adress' => 'Poznan',
            'status' => 'true',
            'pesel' => '04404044444',
            'type' => 'admin'


        ]);
*/
        //patient 1
        DB::table('users')->insert([
            'name' => 'ASmith',
            'email' => 'adam1@smith.com',
            'password' => bcrypt('123123'),
            'phone' => '570940857',
            'adress' => 'Poznan',
            'status' => 'true',
            'pesel' => '04404044444',
            'type' => 'patient'


        ]);

        //patient 2
        DB::table('users')->insert([
            'name' => 'lech honer',
            'email' => 'lechm@gmail.com',
            'password' => bcrypt('123123'),
            'phone' => '570940857',
            'adress' => 'Poznan',
            'status' => 'true',
            'pesel' => '04404044444',
            'type' => 'patient'


        ]);

        //doctor 1 
        DB::table('users')->insert([
            'name' => 'Adam',
            'email' => 'adam2@smith.com',
            'password' => bcrypt('123123'),
            'phone' => '570940857',
            'adress' => 'Poznan',
            'status' => 'true',
            'pesel' => '04404044444',
            'type' => 'doctor'

        ]);

        //doctor 2
        DB::table('users')->insert([
            'name' => 'Maryna Zaliska',
            'email' => 'zaliska@gmail.com',
            'password' => bcrypt('123123'),
            'phone' => '570940857',
            'adress' => 'Poznan',
            'status' => 'true',
            'pesel' => '04404044444',
            'type' => 'doctor'

        ]);

        //spetialization 1
        DB::table('specializayions')->insert([
            'name' => 'oncologi',

        ]);

        //spetialization 2
        DB::table('specializayions')->insert([
            'name' => 'surgeon',

        ]);
    }
}
