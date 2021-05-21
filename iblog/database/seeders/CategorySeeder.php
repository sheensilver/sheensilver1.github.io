<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Đời sống',
            'slug' =>Str::slug('Đời sống')
        ]);
        Category::create([
            'name' => 'Giải trí',
            'slug' =>Str::slug('Giải trí')
        ]);
        Category::create([
            'name' => 'Xã hội',
            'slug' =>Str::slug('Xã hội')
        ]);
        Category::create([
            'name' => 'Kiến thức',
            'slug' =>Str::slug('Kiến thức')
        ]);
        Category::create([
            'name' => 'Tin tức',
            'slug' =>Str::slug('Pháp luật')
        ]);
        Category::create([
            'name' => 'Người nổi tiếng',
            'slug' =>Str::slug('Người nổi tiếng')
        ]);
    }
}
