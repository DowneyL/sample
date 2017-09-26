<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = User::find(1);
        $user->name = '八月第五天';
        $user->email = 'heng8050lee@qq.com';
        $user->password = bcrypt('panzer950805scc');
        $user->is_admin = true;
        $user->save();
    }
}