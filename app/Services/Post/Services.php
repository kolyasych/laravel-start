<?php


namespace App\Services\Post;


use App\Models\Post;

class Services
{
    public function store($data) {
        if(!empty($data['tags'])) {
            $tagsId = $data['tags'];
            unset($data['tags']);
        }

        $post = Post::create($data);
        $post->tags()->attach($tagsId);

    }

    public function update($post, $data) {
        if(!!isset($data['tags'])) {
            $tagsId = $data['tags'];
            unset($data['tags']);
        }


        $post->update($data);
        $post->tags()->sync($tagsId);
    }
}