<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Tag;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Hash;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => Hash::make('password')
        ]);

        $author2 = User::create([
            'name' => 'Ni Kita Timpukin',
            'email' => 'nikitae@gmail.com',
            'password' => Hash::make('password')
        ]);

        $cat1 = Category::create([
            'name' => 'News'
        ]);

        $cat2 = Category::create([
            'name' => 'Product'
        ]);

        $cat3 = Category::create([
           'name' => 'Marketing'
        ]);

        $cat4 = Category::create([
           'name' => 'Design'
        ]);

        $tag1 = Tag::create([
            'name' => 'Job'
        ]);

        $tag2 = Tag::create([
            'name' => 'Freebie'
        ]);

        $tag3 = Tag::create([
           'name' => 'Record'
        ]);

        $Post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'content' => 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'category_id' => $cat1->id,
            'image' => 'posts/1.jpg',
            'user_id' => $author1->id            
        ]);

        $Post2 = Post::create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'content' => 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'category_id' => $cat2->id,
            'image' => 'posts/2.jpg',
            'user_id' => $author2->id            
        ]);

        $Post3 = Post::create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'content' => 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'category_id' => $cat3->id,
            'image' => 'posts/3.jpg',
            'user_id' => $author1->id            
        ]);

        $Post4 = Post::create([
            'title' => 'New published books to read by a product designer',
            'description' => 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'content' => 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'category_id' => $cat4->id,
            'image' => 'posts/4.jpg',
            'user_id' => $author2->id            
        ]);

        $Post1->tags()->attach([$tag1->id,$tag2->id]);
        $Post2->tags()->attach([$tag1->id,$tag2->id,$tag3->id]);
        $Post3->tags()->attach($tag1->id);
        $Post4->tags()->attach([$tag1->id,$tag3->id]);

    }
}
