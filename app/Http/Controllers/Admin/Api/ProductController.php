<?php

namespace Falcon\Http\Controllers\Admin\Api;

use Falcon\Http\Controllers\Controller;
use Falcon\Models\Shop\Category;

class ProductController extends Controller
{
    public function getProductCategories(Category $category)
    {
        return response()->json($category->main()->ordered()->with('children')->get()->nest()->listTreeView());
    }

    public function getProductCategory(Category $category, $id)
    {
        return response()->json($category->find($id));
    }
}
