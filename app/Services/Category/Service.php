<?php


namespace App\Services\Category;


use App\Models\Category;

class Service
{
    public function store($category)
    {
        Category::firstOrCreate($category);
    }

    public function update($category, $updateCategory )
    {
        $category->update($updateCategory);
    }

}