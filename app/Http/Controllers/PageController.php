<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Отображает корневую страницу.
     * @return Factory|View
     */
    public function welcome()
    {
        return view('page.welcome');
    }

    /**
     * Отображает страницу about.
     * @return Factory|View
     */
    public function about()
    {
        return view('page.about');
    }
}
