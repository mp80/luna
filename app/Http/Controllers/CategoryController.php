<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
}
