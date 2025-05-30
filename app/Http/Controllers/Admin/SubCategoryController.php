<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryStoreRequest;
use App\Http\Requests\SubCategoryUpdateRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = SubCategory::with('category')->get();

        return view('admin.sub_category.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.sub_category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryStoreRequest $request)
    {

        SubCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'category_id' => $request->category,
        ]);
        notyf()->success('Your sub category has been created.');
        return to_route('admin.sub_category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subCategory = SubCategory::findOrFail(base64_decode($id));
        $categories = Category::get();
        return view('admin.sub_category.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryUpdateRequest $request, string $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'category_id' => $request->category,
        ]);
        notyf()->success('Your sub category has been updated.');
        return to_route('admin.sub_category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();
        notyf()->success('Your sub category has been deleted.');
        return to_route('admin.sub_category.index');
    }

    /* get sub category by ajax request */
    public function getSubCategory(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->category_id)->get();
        if ($subCategories->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No Sub Category found'
            ]);
        }
        $data = "<option value=''>Select Sub Category</option>";
        foreach ($subCategories as $subCategory) {
            $data .= "<option value='" . $subCategory->id . "'>" . $subCategory->name . "</option>";
        }


        return response()->json($data);
    }
}
