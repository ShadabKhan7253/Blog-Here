<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Shadab',
            'email' => 'shadabkhan@gmail.com',
            'password' => Hash::make('abcd1234'),
            'role' => 'admin',
        ]);
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categories = ['Sports','Technology','Gaming'];

        foreach($categories as $category) {
            $user = User::all()->random();
            Category::create([
                'name' => $category,
                'created_by' => $user->id,
                'last_updated_by' => $user->id
            ]);
        }

        $tags = ['Java','C Programming','Python','Cricket'];
        $user = User::all()->random();
        foreach($tags as $tag) {
            Tag::create(['name'=>$tag]);
        }

        // for($i=1;$i<10;$i++) {
        //     Tag::create(['name'=>fake()->word]);
        // }

        $this->call(BlogsSeeder::class);
    }
}
