<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{

    protected $model = Admin::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'), // 12345
            'brand' =>'1',
            'category' =>'1',
            'product' =>'1',
            'slider' =>'1',
            'coupons' =>'1',
            'shipping' =>'1',
            'returnorder' =>'1',
            'review' =>'1',
            'remember_token' => Str::random(10),
        ];
    }
}
