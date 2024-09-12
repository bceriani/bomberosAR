<?php


namespace Database\Seeders;

use App\Models\User;
use App\Models\League;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => '4dm1n0',
            'dni' => '42044832',
            'name' => 'Administrador',
            'role' => 'Admin',
            'email' => 'NULL@NULL.com',
            'password' => bcrypt('root'),
        ]);
    }
}
