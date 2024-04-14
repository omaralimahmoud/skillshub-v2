<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\StoreCategoryRequest;
use App\Http\Requests\dashboard\UpdateCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::latest()->paginate(10);

        return view('dashboard.pages.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function store(StoreCategoryRequest $request): RedirectResponse
    {

        $request->addCategory();

        $request->session()->flash('message', 'row add successfully');

        return back();

    }

    public function update(UpdateCategoryRequest $request): RedirectResponse
    {

        $request->updateCategory();

        $request->session()->flash('message', 'row updated successfully');

        return back();

    }

    public function toggle(Category $category): RedirectResponse
    {
        $category->update([
            'is_active' => ! $category->is_active,
        ]);

        return back();
    }

    public function destroy(Category $category, Request $request): RedirectResponse
    {
        try {
            $category->delete();
            $message = 'row deleted successfully';

        } catch (Exception $e) {
            $message = "can't deleted this row";
        }

        $request->session()->flash('message', $message);

        return back();
    }
}
