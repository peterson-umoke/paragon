<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
        ];
    }

    /**
     * @param $email
     * @return AdminFactory
     */
    public function email($email): AdminFactory
    {
        return $this->state(fn(array $attrs) => ['email' => $email]);
    }

    /**
     * @param $email
     * @return AdminFactory
     */
    public function password($password): AdminFactory
    {
        return $this->state(fn(array $attrs) => ['password' => bcrypt($password)]);
    }

    /**
     * @param $email
     * @return AdminFactory
     */
    public function name($name): AdminFactory
    {
        return $this->state(fn(array $attrs) => ['name' => $name]);
    }
}
