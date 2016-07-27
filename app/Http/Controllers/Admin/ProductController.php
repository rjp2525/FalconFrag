<?php

namespace Falcon\Http\Controllers\Admin;

use Falcon\Http\Controllers\Controller;
use Falcon\Http\Requests\Admin\Products\CreateCategoryRequest;
use Falcon\Models\Shop\Category;
use Falcon\Models\Shop\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getCategories(Category $category)
    {
        $category_list = ['none' => 'None'] + $category->main()->ordered()->with('children')->get()->nest()->listsFlattened();
        return view('admin.products.categories', compact('category_list'));
    }

    /**
     * Create a new category
     *
     * @param  Request $request
     * @return Response
     */
    public function createCategory(CreateCategoryRequest $request, Category $categories)
    {
        if (empty($request->input('description'))) {
            $description = null;
        } else {
            $description = $request->input('description');
        }

        if ($request->input('parent') == 'none') {
            $parent = null;
        } else {
            $parent = $request->input('parent');
        }

        if (empty($request->input('hidden'))) {
            $hidden = false;
        } else {
            $hidden = true;
        }

        $category = $categories->create([
            'title'         => $request->input('title'),
            'slug'          => Str::slug($request->input('title')),
            'description'   => $description,
            'parent_id'     => $parent,
            'hidden'        => $hidden,
            'display_order' => $request->input('display_order')
        ]);

        if (!$category) {
            return response()->json(['error' => true, 'message' => 'An error occurred while creating the category. Please try again later.']);
        }

        return response()->json(['success' => true, 'message' => 'The category was successfully created.']);
    }

    public function editCategory(CreateCategoryRequest $request, Category $categories, $id)
    {
        if (empty($request->input('description'))) {
            $description = null;
        } else {
            $description = $request->input('description');
        }

        if ($request->input('parent') == 'none') {
            $parent = null;
        } else {
            $parent = $request->input('parent');
        }

        if (empty($request->input('hidden'))) {
            $hidden = false;
        } else {
            $hidden = true;
        }

        $category = $categories->find($id);
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $category->parent_id = $parent;
        $category->hidden = $hidden;
        $category->display_order = $request->input('display_order');

        if ($category->save()) {
            return response()->json(['success' => true, 'message' => 'The category was successfully updated.']);
        } else {
            return response()->json(['error' => true, 'message' => 'An error occurred while updating the category. Please try again later.']);
        }
    }

    public function getEditCategory(Category $categories, $id)
    {
        $category = $categories->find($id);
        $category_list = ['none' => 'None'] + $categories->main()->ordered()->with('children')->get()->nest()->listsFlattened();
        return view('admin.products.editcategory', compact('category', 'category_list'));
    }

    public function deleteCategory(Category $categories, $id)
    {
        $category = $categories->find($id);
        $category->delete();
    }

    public function getProducts(Product $product)
    {
        $products = $product->all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
