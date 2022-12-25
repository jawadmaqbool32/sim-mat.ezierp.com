<?php

namespace App\Http\Controllers;

use App\Core\Helper;
use App\Http\Datatables\ProductDatatable;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategories;
use ERP\Core\HelperFunction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private $thumbWidth;
    private $thumbHeight;
    public function __construct()
    {
        $this->thumbWidth = 200;
        $this->thumbHeight = 200;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Product::dataTable();
        }
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::getAll()->get();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'thumbnail' => 'required',
            'status' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $thumbnail = Helper::uploadfile([
                'file' => $request->file('thumbnail'),
                'path' => 'assets/media/products/thumbs/',
                'width' => $this->thumbWidth,
                'height' => $this->thumbHeight,
            ]);
            $images = [];
            if (is_array($request->images)) {
                foreach ($request->images as $key => $image) {
                    $images[] = Helper::uploadfile([
                        'file' => $image,
                        'path' => 'assets/media/products/images/',
                        'width' => $this->thumbWidth,
                        'height' => $this->thumbHeight,
                    ]);
                }
            }
            $product = Product::create([
                'name' => $request->name,
                'thumbnail' => $thumbnail,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'tags' => $request->tags,
                'meta_description' => $request->meta_description,
                'published_date' => $request->published_date,
                'status' => $request->status,
                'images' => json_encode($images),
            ]);
            $product->refresh();
            if (is_array($request->categories)) {
                $categories = Category::whereIn('uid', $request->categories)->select('id')->get();
                foreach ($categories as $key => $category) {
                    ProductCategories::create([
                        'product_id' => $product->id,
                        'category_id' => $category->id,
                    ]);
                }
            }
            DB::commit();
            return response([
                'success' => true,
                'message' => 'New Record Added',
                'redirect' => true,
                'url' => route('products.index'),
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response([
                'error' => true,
                'message' => 'Something went wrong',
                'console' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::getAll()->get();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        DB::beginTransaction();
        try {
            $thumbnail = $product->thumbnail;
            if ($request->thumbnail) {
                Helper::deleteExcept([
                    'files' => [$product->thumbnail],
                    'exceptions' => [],
                    'path' => 'assets/media/products/thumbs/'
                ]);
                $thumbnail = Helper::uploadfile([
                    'file' => $request->file('thumbnail'),
                    'path' => 'assets/media/products/thumbs/',
                    'width' => $this->thumbWidth,
                    'height' => $this->thumbHeight,
                ]);
            }
            $images = [];
            if (is_array($request->images)) {
                foreach ($request->images as $key => $image) {
                    $images[] = Helper::uploadfile([
                        'file' => $image,
                        'path' => 'assets/media/products/images/',
                        'width' => $this->thumbWidth,
                        'height' => $this->thumbHeight,
                    ]);
                }
            }
            if (is_array($request->old_images)) {
                $images = array_merge($images, $request->old_images);
            }
            Helper::deleteExcept([
                'files' => json_decode($product->images),
                'exceptions' => $request->old_images,
                'path' => 'assets/media/products/images/'
            ]);
            Product::where('id', $product->id)->update([
                'name' => $request->name,
                'thumbnail' => $thumbnail,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'tags' => $request->tags,
                'meta_description' => $request->meta_description,
                'published_date' => $request->published_date,
                'status' => $request->status,
                'images' => json_encode($images),
            ]);
            ProductCategories::where('product_id', $product->id)->delete();
            if (is_array($request->categories)) {
                $categories = Category::whereIn('uid', $request->categories)->select('id')->get();
                foreach ($categories as $key => $category) {
                    ProductCategories::create([
                        'product_id' => $product->id,
                        'category_id' => $category->id,
                    ]);
                }
            }
            return response([
                'success' => true,
                'message' => 'Record Updated',
                'redirect' => true,
                'url' => route('products.index'),
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response([
                'error' => true,
                'message' => 'Something went wrong',
                'console' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Helper::deleteExcept([
            'files' => json_decode($product->images),
            'exceptions' => [],
            'path' => 'assets/media/products/images/'
        ]);
        Helper::deleteExcept([
            'files' => [$product->thumbnail],
            'exceptions' => [],
            'path' => 'assets/media/products/thumbs/'
        ]);
        $product->delete();
        return response([
            'success' => true,
            'message' => 'Record Deleted',
            'table_reload' => true,
        ]);
    }
}
