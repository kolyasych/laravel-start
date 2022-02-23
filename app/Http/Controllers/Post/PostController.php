<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Services\Post\Services;
use Illuminate\Http\Request;

class PostController extends BaseController
{


    public function index()
    {

//        $post = Tag::find(1)->posts;
//
//        $tags = Post::find(1)->tags;
//        foreach ($tags as $tag) {
//            echo($tag['title']);
//        }
//        dd($tags);




//        $category = Category::find(2)->post;
//        $post = Post::find(1)->category['title'];
//        dd($post);


//        $category = Category::find(2);
//
//        $post = Post::where('category_id', $category['id'])->get();
//        dd($post);






       $posts = Post::paginate(15);

        $categories = Category::all();

        return view('post.index', compact('posts', 'categories'));
    }



    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->services->store($data);
//        $data = request()->validate([
//            'title' => 'string',
//            'description' => 'string',
//            'content' => 'string',
//            'category_id' => '',
//            'tags' => ''
//        ]);


//        foreach ($tagsId as $tag) {
//            PostTag::firstOrCreate(
//                [
//                    'tag_id' => $tag,
//                    'post_id' => $post['id']
//                ]
//            );
//        }



        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        $tags = $post->tags;
        $category = Category::where('id', $post['category_id'])->get();
        return view('post.show', compact('post', 'category', 'tags'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post, UpdateRequest $request)
    {
//        $data = request()->validate(
//            [
//                'title' => '',
//                'description' => '',
//                'content' => '',
//                'category_id' => '',
//                'tags' => ''
//            ]
//        );

        $data = $request->validated();
        $this->services->update($post, $data);

        return redirect()->route('posts.show', $post['id']);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }


    public function search(FilterRequest $request)
    {

        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)->paginate(10);

        return view('post.filter', compact('posts'));
    }
}
