<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$Y7iA.mXKhysaDlNNVKkjCuQIBLG6Ev9CmLxAVQC7f854.lt79Nz5e',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
