<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=10;$i++){
        	DB::table('users')->insert(
        		['name'=>'User_'.$i,
        		 'email'=>'user'.$i.'.@gmail.com',
        		 'password'=>bcrypt('123456'),
        		 'role'=>0,
        		 'created_at'=>new DateTime(),
        		]);
        }
    }
}
