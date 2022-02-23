<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class TestPostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('post', compact('posts'));
    }

    public function create()
    {
        $strArr = [
            [
                'title' => '4 title',
                'content' => ' 4 content',
                'likes' => 40,
                'is_publishd' => 1
            ],
            [
                'title' => '5 title',
                'content' => ' 5 content',
                'likes' => 50,
                'is_publishd' => 1
            ],
            [
                'title' => '6 title',
                'content' => ' 6 content',
                'likes' => 60,
                'is_publishd' => 1
            ]
        ];

        foreach ($strArr as $item) {
            Post::create($item);
        }
        dd('OK');
    }

    public function update()
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            if ($post->likes == 50) {
                $post->update([
                    'likes' => 55
                ]);
            }
        }

        $post = Post::where('likes', 55)->get();

        foreach ($post as $item) {
            dd($item->likes);
        }
    }


    public function firstOrCreate()
    {
        $arr = [
            'content' => ' firstOrCreate new content with arr with logic',
            'likes' => 60,
            'is_publishd' => 1
        ];


        $post = Post::firstOrCreate([
            'title' => 'firstOrCreate with arr title'
        ], $arr
        );

        dd($post->content);


    }

    public function updateOrCreate()
    {
        $arr = [
            'content' => ' updateOrCreate new content',
            'likes' => 60,
            'is_publishd' => 1
        ];

        /*        $posts = Post::updateOrCreate([
                    'title' => '61 title'
                ],
                    [
                        'content' => ' updateOrCreate new content'
                    ]);

                dd($posts->content);*/

        $posts = Post::all();
        foreach ($posts as $post) {
            if ($post->likes == 55) {
                $newPost = Post::updateOrCreate([
                    'likes' => 55,
                ],
                    [
                        'content' => 'updateOrCreate new content with logic'
                    ]);
                dd($newPost->content);
            }

        }

    }

    public function delete()
    {
        $post = Post::withTrashed()->find(1)->restore();
        dd($post);
    }
}
