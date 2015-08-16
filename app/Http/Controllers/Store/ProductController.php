<?php

namespace Falcon\Http\Controllers\Store;

use Falcon\Http\Controllers\Controller;
use Falcon\Models\Store\Category;
use Falcon\Models\Store\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    /**
     * Initialize the controller
     *
     * @param \Falcon\Models\Store\Category $category
     * @param \Falcon\Models\Store\Product  $product
     */
    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    /**
     * Display a list of categories available
     *
     * @return Response
     */
    public function index()
    {
        $categories = $this->category->main()->visible()->ordered()->get();
        return view('store.index', compact('categories'));
    }

    /**
     * Display all products associated with a category
     *
     * @param  string $slug
     * @return Response
     */
    public function getCategory($slug, $subcategory = null)
    {
        $category = $this->category->bySlug($slug);
        return view('store.category', compact('category'));
    }

    /**
     * Display the product detail page
     *
     * @param  string $category_slug
     * @param  string $sub_slug
     * @param  string|null $product_slug
     * @return Response
     */
    public function getProduct($category_slug, $sub_slug, $product_slug = null)
    {
        // If there's 3 route parameters, assume there's a subcategory
        if ($product_slug != null) {
            try {
                $product = $this->category->bySlug($category_slug)->children()->bySlug($sub_slug)->products()->bySlug($product_slug);
                return view('store.product', compact('product'));
            } catch (ModelNotFoundException $e) {}
        }

        // Check to see if second parameter is a subcategory
        try {
            $category = $this->category->bySlug($category_slug)->children()->bySlug($sub_slug);
            return view('store.category', compact('category'));
        } catch (ModelNotFoundException $e) {}

        // If second parameter is not a subcategory, try displaying a product
        $product = $this->category->bySlug($category_slug)->products()->bySlug($sub_slug);
        return view('store.product', compact('product'));
    }
}
