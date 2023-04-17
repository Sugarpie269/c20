<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\user_form_data;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\user_form_data>
 */
class user_form_dataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = user_form_data::class;
    public function definition()
    {
        $max = 1.0;
        $min = 0.0;
        $range = $max - $min;
        $num = $min + $range * (mt_rand() / mt_getrandmax());    
        $num = round($num, 2);
        $num2 = $min + $range * (mt_rand() / mt_getrandmax());    
        $num2 = round($num2, 2);
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail(),
            'country' => 101,
            'state' => 4006,
            'age' => Str::random(3),
            'gender' => 'Male',
            'latitude' => (float) $num,
            'longitude' => (float) $num2,
            'unique_light_number' => $this->faker->unique(true)->text(50),
            'nomination_type' => 'person',
            'nominee_relation' => $this->faker->name,
            'keep_public' => 'Y',
            'naminee_name' => $this->faker->name,
            'naminee_email' => $this->faker->safeEmail(),
            'naminee_gender' => 'Male',
            'naminee_country' => 101,
            'naminee_state' => 4006,
            'story' => $this->faker->text,
            'info_url' => $this->faker->text,
            'concent_1' => 1,
            'concent_2' => 1,
            'concent_3' => 1,
            'is_approved' => 'Y',
        ];
    }
}
