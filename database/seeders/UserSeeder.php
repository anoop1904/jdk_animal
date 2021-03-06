<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
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
        $user = User::where('email', 'anoop@gmail.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "Anoop Kumar";
            $user->email = "anoop@gmail.com";
            $user->mobile_number = "1234567890";
            $user->user_reg_status = "true";
            $user->password = Hash::make('12345678');
            $user->save();
        }
    }
}
