<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
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
        $moderator = Role::where('name', 'moderator')->value('id');
        $reader = Role::where('name', 'reader')->value('id');

        $user1 = new User();
        $user1->name = 'Ivan';
        $user1->email = 'halaponga2@gmail.com';
        $user1->password = Hash::make(12345);
        $user1->role_id = $moderator;
        $user1->save();

        $user2 = new User();
        $user2->name = 'sergey';
        $user2->email = 'sergey@gmail.com';
        $user2->password = Hash::make(12345);
        $user2->role_id = $reader;
        $user2->save();
    }
}
