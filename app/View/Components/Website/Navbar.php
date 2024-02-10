<?php

namespace App\View\Components\Website;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::select('id', 'name')->get();

        return view('components.website.navbar', [
            'categories' => $categories,
        ]);
    }
}
