<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function ByCategoryPage()
    {
        return view('pages.product-by-category');
    }
    public function CategoryList()
    {
        $data = Category::all();
        return ResponseHelper::Out('success', $data, 200);
    }
    public function CategoryStore(Request $request)
    {
        $validation = $request->validate([
            'categoryName' => 'required|max:50',
            'categoryImage' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:20480',
        ]);

        if ($validation) {
            if ($request->hasFile('categoryImage')) {
                $file = $request->file('categoryImage');
                $extension = $file->getClientOriginalName();
                $filename = time() . '-category-' . $extension;
                $file->move('upload/images/category', $filename);
            }

            Category::create([
                'categoryName' => $request->categoryName,
                'categoryImage' => $filename,
            ]);

            return ResponseHelper::Out('success', 'Category Added Successfully', 200);
        }
    }
}
