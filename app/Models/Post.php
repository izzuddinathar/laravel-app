<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Izzudin Athar',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui voluptatibus ipsa ea iste voluptate quam architecto fugit sequi quo facilis molestiae in, aperiam molestias dolorum? Ipsa, quaerat in. Dolor, eligendi.',
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Izzudin Athar',
                'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt expedita fuga quidem itaque est blanditiis amet temporibus dolorum veniam. Atque recusandae mollitia quia reiciendis aut ipsa, pariatur facilis sit quod!',
            ],
        ];
    }

    public static function find($slug): array
    {
        $post = Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);

        if (! $post) {
            abort(404);
        }

        return $post;

    }
}
