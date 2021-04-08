<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

final class CategoryService
{

    public function storeCategory(array $category): void
    {
        Category::insert(
            [
                'category_name' => $category['category_name'],
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]
        );
    }

    public function getAllCategories(): LengthAwarePaginator
    {
        return Category::latest()->paginate(5);
    }

    public function editCategory($id)
    {
        return Category::find($id);
    }

    public function updateCategory($request, $id): RedirectResponse
    {
        Category::find($id)->update(
            [
                'category_name' => $request->category_name
            ]
        );
        return Redirect()->back()->with('success', 'Category updated');
    }
}
