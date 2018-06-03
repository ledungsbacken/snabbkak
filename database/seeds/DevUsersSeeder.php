<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
use App\Recepie;
use App\Ingredient;

class DevUsersSeeder extends Seeder
{

    const N_RECEPIES_PER_USER = 20;

    private $devUsers = [
        [
            'name' => 'Robin Sandström',
            'email' => 'ledungsbacken@gmail.com',
            'password' => 'secret',
            'role' => [
                'super_admin',
                'admin',
            ],
        ],
        [
            'name' => 'Daniel Ljungqvist',
            'email' => 'ljungqvist93@gmail.com',
            'password' => 'secret',
            'role' => [
                'super_admin',
                'admin',
            ],
        ],
        [
            'name' => 'Demo Admin',
            'email' => 'admin@snabbkak.com',
            'password' => 'secret',
            'role' => [
                'admin',
            ],
        ],
        [
            'name' => 'Demo Moderator',
            'email' => 'moderator@snabbkak.com',
            'password' => 'secret',
            'role' => [
                'moderator',
            ],
        ],
        [
            'name' => 'Demo User',
            'email' => 'user@snabbkak.com',
            'password' => 'secret',
            'role' => [
                'user',
            ],
        ],
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $devUsers = $this->devUsers;
        foreach($devUsers as $index => $devUser) {
            // To not create same user twice
            if(User::whereEmail($devUser['email'])->exists()) {
                continue;
            }

            // Create user
            $user = factory(User::class)->create(
                [
                    'name' => $devUser['name'],
                    'email' => $devUser['email'],
                    'password' => bcrypt($devUser['password']),
                ]
            );

            // Create recepies
            $recepies = factory(Recepie::class, self::N_RECEPIES_PER_USER)->create([
                'user_id' => $user->id,
            ]);
            $recepies->each(function($recepie) use ($user) {
                $ingredients = factory(Ingredient::class, rand(1, 9))->create([
                    'recepie_id' => $recepie->id,
                ]);
            });

            // Set role
            $roles = Role::all();
            foreach($devUser['role'] as $devUserRole) {
                $role = $roles->where('name', $devUserRole);
                $user->roles()->attach($role);
            }
        }
    }
}
