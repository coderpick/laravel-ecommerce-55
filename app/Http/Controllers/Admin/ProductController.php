<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use App\Traits\FileUploader;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use FileUploader;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $brands = Brand::get();

        return view('admin.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {

        $product = Product::create([
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'brand_id' => $request->brand,
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'price' => $request->price,
            'discount' => $request->discount,
            'discount_price' => $request->discount_price,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'stock' => $request->quantity,
            'is_featured' => $request->is_featured,
            'status' => $request->status,
        ]);
        if ($request->hasFile('feature_image')) {
            $feature_image = $this->upload($request->file('feature_image'), 'uploads/product/feature', 600, 750);
            $product->update(['feature_image' => $feature_image]);
            $product->save();
        }

        $imageData = [];

        if ($files = $request->file('images')) {
            foreach ($files as $key => $file) {
                $path = $this->upload($file, 'uploads/product/gallery', 600, 750);
                $imageData[] = [
                    'product_id' => $product->id,
                    'image' => $path,
                ];
            }
        }

        ProductImage::insert($imageData);

        notyf()->success('Your product has been created.');

        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $product = Product::with('productImages')->findOrFail($id);
        $brands = Brand::get();
        $categories = Category::get();
        $subCategories = SubCategory::where('category_id', $product->category_id)->get();

        return view('admin.product.edit', compact('brands', 'categories', 'product', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        $product = Product::withTrashed()->findOrFail($id);

        if ($request->discount) {
            $discountPrice = $request->price - ($request->price * $request->discount) / 100;
        }

        $product->update([
            'category_id' => $request->category,
            'sub_category_id' => $request->subCategory,
            'brand_id' => $request->brand,
            'name' => $request->name,
            'slug' => $request->slug,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount ?? null,
            'discount_price' => $discountPrice ?? null,
            'quantity' => $request->quantity,
            'is_featured' => $request->is_featured,
            'status' => $request->is_featured,
        ]);

        $imageData = [];

        if ($files = $request->file('images')) {

            foreach ($files as $key => $file) {
                $path = $this->upload($file, 'uploads/product/gallery', 600, 750);
                $imageData[] = [
                    'product_id' => $product->id,
                    'image' => $path,
                ];
            }
        }

        if ($files = $request->file('images')) {
            $productImages = ProductImage::where('product_id', $product->id)->get();
            foreach ($productImages as $key => $value) {
                if (! in_array($value->image, $files)) {
                    if (File::exists(public_path($value->image))) {
                        File::delete(public_path($value->image));
                    }
                    $value->delete();
                }
            }
        }
        /* insert new images */
        ProductImage::insert($imageData);

        notyf()->success('Product update successfully.');

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::with('productImages')->withTrashed()->findOrFail($id);

        if (count($product->productImages) > 0) {

            foreach ($product->productImages as $key => $value) {
                if (File::exists(public_path($value->image))) {
                    File::delete(public_path($value->image));
                }
            }
        }

        if (File::exists(public_path($product->feature_image))) {
            File::delete(public_path($product->feature_image));
        }

        $product->delete();

        notyf()->success('Product deleted successfully.');

        return redirect()->route('admin.product.index');
    }
}
