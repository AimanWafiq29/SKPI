<?php

namespace Database\Factories;

use App\Models\Biodata;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // return [
        //     'name' => $this->faker->name(),
        //     'email' => $this->faker->unique()->safeEmail(),
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        // ];

        // Buat User terlebih dahulu
        $user = User::create([
            'nim' => $this->faker->unique()->numerify('##########'),
            'password' => bcrypt('123456'), // password
            'remember_token' => Str::random(10),
        ]);

        // Kemudian buat Biodata untuk User yang telah dibuat
        Biodata::create([
            'user_id' => $user->id,
            'nim' => $user->nim,
            'nama' => $this->faker->name,
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date,
            'prodi' => $this->faker->word,
            'no_ijazah' => $this->faker->unique()->numerify('##########'),
            'no_dokumen' => $this->faker->unique()->numerify('##########'),
            'tgl_dokumen' => $this->faker->date,
            'tahun_masuk' => $this->faker->year,
            'tahun_lulus' => $this->faker->year,
            'gelar' => $this->faker->word,
        ]);

        return [];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
