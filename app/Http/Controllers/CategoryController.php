<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\EditCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class CategoryController extends Controller
{

    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getAllCategories(): View
    {
        $categories = $this->categoryService->getAllCategories();

        return view('admin.category.index', compact('categories'));
    }

    public function addCategory(StoreCategoryRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $this->categoryService->storeCategory($validated);

        return Redirect()->back()->with('success', 'Category inserted');
    }

    public function edit(Request $request)
    {
        $category = $this->categoryService->editCategory($request->id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->categoryService->updateCategory($request, $id);
    }
}
