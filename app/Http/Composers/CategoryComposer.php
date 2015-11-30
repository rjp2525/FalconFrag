<?php

namespace Falcon\Http\Composers;

use Falcon\Models\Shop\Category;
use Illuminate\Contracts\View\View;

class CategoryComposer
{
    /**
     * The list of unhidden product categories
     *
     * @var \Falcon\Models\Shop\Category
     */
    protected $categories;

    /**
     * Create a new category composer
     *
     * @param Category $categories
     * @return void
     */
    public function __construct(Category $categories)
    {
        // Dependencies automatically resolved by service container
        $this->categories = $categories;
    }

    /**
     * Bind the category data to the view
     *
     * @param  View   $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('product_categories', $this->categories->main()->visible()->ordered()->get());
    }
}
