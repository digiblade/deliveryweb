<?php

namespace Database\Factories;

use App\Models\NewUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class NewUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NewUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_name' => $this->faker->name(),
            'user_email' => $this->faker->unique()->safeEmail(),
            'user_type'=>'1',
            'user_password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
