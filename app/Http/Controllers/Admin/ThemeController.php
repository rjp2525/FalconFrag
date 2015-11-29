<?php

namespace Falcon\Http\Controllers\Admin;

use Falcon\Http\Controllers\Controller;

class ThemeController extends Controller
{
    // Index
    public function index()
    {
        return view('theme.admin.index');
    }
}
