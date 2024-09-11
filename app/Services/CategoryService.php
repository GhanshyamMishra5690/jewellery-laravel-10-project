<?php 
namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CategoryService
{
    /**
     * Get all categories.
     */
    public function getAllCategories()
    {
        return Category::all();
    }

    /**
     * Get a category by id.
     */
    public function getCategoryById($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Create a new category.
     */
    public function createCategory($data)
    {
        return Category::create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
        ]);
    }

    /**
     * Update a category by id.
     */
    public function updateCategory($id, $data)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
        ]);

        return $category;
    }

    /**
     * Delete a category by id.
     */
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }

}    