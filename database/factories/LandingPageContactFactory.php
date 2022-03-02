<?php

namespace Database\Factories;

use App\Models\FromWhereList;
use App\Models\Industry;
use Illuminate\Database\Eloquent\Factories\Factory;

class LandingPageContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $x = $this->faker->randomElement(landingPageTypes());
        if ($x == "action") {
            $data = [
                'name' => $this->faker->name(),
                'company_name' => $this->faker->company(),
                'phone_number' => $this->faker->phoneNumber(),
                'email' => $this->faker->email(),
                'message' => $this->faker->paragraph(),
                'type' => $x,
                'industry_id' => Industry::all()->random()->id,
                'from_where_id' => FromWhereList::all()->random()->id,
            ];
        } else {
            $data = [
                'name' => $this->faker->name(),
                'company_name' => $this->faker->company(),
                'phone_number' => $this->faker->phoneNumber(),
                'email' => $this->faker->email(),
                'message' => $this->faker->paragraph(),
                'type' => $x,
            ];
        }
        return $data;
    }
}
