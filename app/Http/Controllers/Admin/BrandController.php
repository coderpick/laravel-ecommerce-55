<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\ImageUploader;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;

class BrandController extends Controller
{
    use ImageUploader;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::with('createdBy')->get();
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandStoreRequest $request)
    {
        if ($request->hasFile('logo')) {
            $filepath = $this->uploadImage($request->file('logo'), 'uploads/brand/');
        }

        Brand::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'logo' => $filepath
        ]);
        notyf()->success('Your brand has been created.');
        return redirect()->route('admin.brand.index');
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
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandUpdateRequest $request, string $id)
    {
        $brand = Brand::findOrFail($id);
        if ($request->hasFile('logo')) {
            $filepath = $this->uploadImage($request->file('logo'), 'uploads/brand/', $brand->logo);
        } else {
            $filepath = $brand->logo;
        }
        $brand->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'logo' => $filepath,
            'status' => $request->status
        ]);
        notyf()->success('Your brand has been updated.');
        return redirect()->route('admin.brand.index');
    }

    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        if (isset($brand->logo) && file_exists($brand->logo)) {
            unlink($brand->logo);
        }
        $brand->delete();
        notyf()->success('Your brand has been deleted.');
        return to_route('admin.brand.index');
    }
}
