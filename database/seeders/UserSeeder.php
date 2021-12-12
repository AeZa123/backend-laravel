<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ลบข้อมูลเก่าออกก่อน
        DB::table('users')->delete();

        $data = [
            'fullname' => 'Suriya Rabalert',
            'username' => 'aeza555',
            'email' => 'aymexe@gmail.com',
            'password' => Hash::make('123456'),
            'tel' => '0638066157',
            'avatar' => 'https://via.placeholder.com/400x400.png/005429?text=uders',
            'role' => '1',
            'remember_token' => 'g2sgho44qw',
        ];

        //สร้างข้อมูล สำหรับ admin
        User::create($data);

        //เรียก userfactory ที่เตรียมการ faker data
        User::factory(299)->create();

    }
}
