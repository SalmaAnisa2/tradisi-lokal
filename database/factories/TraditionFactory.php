<?

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()-> sentence(rand(3, 6));
        $slug = Str::slug($title);
        return [
            'title' => $title,
            'slug' => $slug,
            'synopsis' => fake()->paragraph(rand(5,  10)),
            'cover_image' => 'https://picsum.photos/seed/' . Str::random(10) . '/480/640',
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}