<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Joao', 'email' => 'joao@ufscar.br', 'password' => bcrypt('senha123'), 'role' => 'admin'],
            ['name' => 'Juca', 'email' => 'juca@ufscar.br', 'password' => bcrypt('senha321'), 'role' => 'institution'],
            ['name' => 'Jose', 'email' => 'juca@ufscar.br', 'password' => bcrypt('senha321'), 'role' => 'volunteer'],
        ];
        
        foreach($users as $user)
        {
            App\User::create($user)->save();
        }
    }
}
