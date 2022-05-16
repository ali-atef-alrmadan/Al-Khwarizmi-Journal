<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('users')->insert([
                    'prefix' => 'دكتوراه',
                    'name' => 'مجد محمد',
                    'degree'=>'ماستر',
                    'email' => 'editor@gmail.com',
                    'birth_date' => '1977-10-07',
                    'country' => 'AS',
                    'Institution' => 'اليرموك',
                    'password' => Hash::make('123456789'),
                ]);
                
        DB::table('users')->insert([
            'prefix' => 'دكتوراه',
            'name' => 'احمد محمد',
            'degree'=> 'ماستر',
            'email' => 'reviewer@gmail.com',
            'birth_date' => '1977-10-07',
            'country' => 'AS',
            'Institution' => 'اليرموك',
            'password' => Hash::make('123456789'),
        ]);

        DB::table('users')->insert([
                    'prefix' => 'لا شيء',
                    'name' => 'خالد محمد',
                    'degree'=>'ماستر',
                    'email' => 'author@gmail.com',
                    'birth_date' => '1977-10-07',
                    'country' => 'AS',
                    'Institution' => 'اليرموك',
                    'password' => Hash::make('123456789'),
                ]);
        
                DB::table('role_user')->insert([
                    'role_id' => 1,
                    'user_id' => 1,
                    'user_type'=>'App\\Models\\User',
                ]);
                DB::table('role_user')->insert([
                    'role_id' => 2,
                    'user_id' => 2,
                    'user_type'=>'App\\Models\\User',
                ]);
                DB::table('role_user')->insert([
                    'role_id' => 3,
                    'user_id' => 3,
                    'user_type'=>'App\\Models\\User',
                ]);

    }
}
