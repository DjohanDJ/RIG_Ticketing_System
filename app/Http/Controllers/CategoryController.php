<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function getAllCategory()
    {
        $categories = Category::all();
        $data = [
            'categories' => $categories
        ];
        return view('superadmin.super-admin-home', $data);
    }

    public function getInsertCategoryPage()
    {
        return view('superadmin.insert-category');
    }

    public function insertCategory(Request $request)
    {
        $categoryName = $request->categoryName;
        Category::create([
            'categoryName' => $categoryName
        ]);
        return redirect('/super-admin-home');
    }

    public function deleteCategory(Request $request)
    {
        $categoryId = $request->id;
        Category::where('id', $categoryId)->first()->delete();
        return redirect('/super-admin-home');
    }

    public function getUpdateCategoryPage(Request $request)
    {
        $selectedCategory = Category::where('id', $request->id)->first();
        $data = [
            'selectedCategory' => $selectedCategory
        ];
        return view('superadmin.update-category', $data);
    }

    public function updateCategory(Request $request)
    {
        Category::where('id', $request->id)->first()->update([
            'categoryName' => $request->categoryName
        ]);
        return redirect('/super-admin-home');
    }
}
