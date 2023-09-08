<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::create([
            'name' => 'Usman Pamungkas',
            'username' => 'pamungkass',
            'email' => 'usmanpamungkas30@gmail.com',
            'password' => bcrypt('12345'),
        ]);
            
            // User::create([
            //     'name' => 'Bagas',
            //     'email' => 'bagasaji30@gmail.com',
            //     'password' => bcrypt('12345'),
            // ]);
                
        // User::factory(2)->create();

        // Category::create([
        //     'name' => 'Public',
        //     'slug' => 'public'
        // ]);

        // Category::create([
        //     'name' => 'Private',
        //     'slug' => 'private'
        // ]);

        // Course::factory(5)->create();

        // Course::create([
        //     'title' => 'Belajar Laravel Pertama',
        //     'slug' => 'belajar-laravel-pertama',
        //     'excerpt' => 'a lacus vestibulum sed arcu non odio euismod 
        //     lacinia at quis risus sed vulputate odio ut enim blandit 
        //     volutpat maecenas volutpat blandit aliquam etiam erat velit',
        //     'description' => 'a lacus vestibulum sed arcu non odio euismod 
        //     lacinia at quis risus sed vulputate odio ut enim blandit volutpat 
        //     maecenas volutpat blandit aliquam etiam erat velit scelerisque in 
        //     dictum non consectetur a erat nam at lectus urna duis convallis 
        //     convallis tellus id interdum velit laoreet id donec ultrices 
        //     tincidunt arcu non sodales neque sodales ut etiam sit amet nisl 
        //     purus in mollis nunc sed id semper risus in hendrerit gravida rutrum 
        //     quisque non tellus orci ac auctor augue mauris augue neque gravida 
        //     in fermentum et sollicitudin ac orci phasellus egestas tellus rutrum 
        //     tellus pellentesque eu tincidunt tortor aliquam nulla facilisi',
        //     'link' => '9jrD0wcfq1g?si=v9seu0KasYyYo6fJ',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);

        // Course::create([
        //     'title' => 'Belajar Laravel Kedua',
        //     'slug' => 'belajar-laravel-Kedua',
        //     'excerpt' => 'a lacus vestibulum sed arcu non odio euismod 
        //     lacinia at quis risus sed vulputate odio ut enim blandit 
        //     volutpat maecenas volutpat blandit aliquam etiam erat velit',
        //     'description' => 'a lacus vestibulum sed arcu non odio euismod 
        //     lacinia at quis risus sed vulputate odio ut enim blandit volutpat 
        //     maecenas volutpat blandit aliquam etiam erat velit scelerisque in 
        //     dictum non consectetur a erat nam at lectus urna duis convallis 
        //     convallis tellus id interdum velit laoreet id donec ultrices 
        //     tincidunt arcu non sodales neque sodales ut etiam sit amet nisl 
        //     purus in mollis nunc sed id semper risus in hendrerit gravida rutrum 
        //     quisque non tellus orci ac auctor augue mauris augue neque gravida 
        //     in fermentum et sollicitudin ac orci phasellus egestas tellus rutrum 
        //     tellus pellentesque eu tincidunt tortor aliquam nulla facilisi',
        //     'link' => '9jrD0wcfq1g?si=v9seu0KasYyYo6fJ',
        //     'category_id' => 1,
        //     'user_id' => 2,
        // ]);

        // Course::create([
        //     'title' => 'Belajar Laravel Ketiga',
        //     'slug' => 'belajar-laravel-Ketiga',
        //     'excerpt' => 'a lacus vestibulum sed arcu non odio euismod 
        //     lacinia at quis risus sed vulputate odio ut enim blandit 
        //     volutpat maecenas volutpat blandit aliquam etiam erat velit',
        //     'description' => 'a lacus vestibulum sed arcu non odio euismod 
        //     lacinia at quis risus sed vulputate odio ut enim blandit volutpat 
        //     maecenas volutpat blandit aliquam etiam erat velit scelerisque in 
        //     dictum non consectetur a erat nam at lectus urna duis convallis 
        //     convallis tellus id interdum velit laoreet id donec ultrices 
        //     tincidunt arcu non sodales neque sodales ut etiam sit amet nisl 
        //     purus in mollis nunc sed id semper risus in hendrerit gravida rutrum 
        //     quisque non tellus orci ac auctor augue mauris augue neque gravida 
        //     in fermentum et sollicitudin ac orci phasellus egestas tellus rutrum 
        //     tellus pellentesque eu tincidunt tortor aliquam nulla facilisi',
        //     'link' => '9jrD0wcfq1g?si=v9seu0KasYyYo6fJ',
        //     'category_id' => 2,
        //     'user_id' => 1,
        // ]);

        // Course::create([
        //     'title' => 'Belajar Laravel Keempat',
        //     'slug' => 'belajar-laravel-Keempat',
        //     'excerpt' => 'a lacus vestibulum sed arcu non odio euismod 
        //     lacinia at quis risus sed vulputate odio ut enim blandit 
        //     volutpat maecenas volutpat blandit aliquam etiam erat velit',
        //     'description' => 'a lacus vestibulum sed arcu non odio euismod 
        //     lacinia at quis risus sed vulputate odio ut enim blandit volutpat 
        //     maecenas volutpat blandit aliquam etiam erat velit scelerisque in 
        //     dictum non consectetur a erat nam at lectus urna duis convallis 
        //     convallis tellus id interdum velit laoreet id donec ultrices 
        //     tincidunt arcu non sodales neque sodales ut etiam sit amet nisl 
        //     purus in mollis nunc sed id semper risus in hendrerit gravida rutrum 
        //     quisque non tellus orci ac auctor augue mauris augue neque gravida 
        //     in fermentum et sollicitudin ac orci phasellus egestas tellus rutrum 
        //     tellus pellentesque eu tincidunt tortor aliquam nulla facilisi',
        //     'link' => '9jrD0wcfq1g?si=v9seu0KasYyYo6fJ',
        //     'category_id' => 1,
        //     'user_id' => 2,
        // ]);
    }
}
