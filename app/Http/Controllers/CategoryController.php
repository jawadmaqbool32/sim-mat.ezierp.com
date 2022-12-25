<?php

namespace App\Http\Controllers;

use App\Core\Helper;
use app\Http\Datatables\CategoryDatatable;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private $dataTable;
    private $thumbWidth;
    private $thumbHeight;
    public function __construct()
    {
        $this->thumbWidth = 200;
        $this->thumbHeight = 200;
        $this->dataTable = new CategoryDatatable();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->dataTable->getData();
        }
        return view('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'status' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $image = '';
            $thumbnail = Helper::uploadfile([
                'file' => $request->file('thumbnail'),
                'path' => 'assets/media/categories/thumbs/',
                'width' => $this->thumbWidth,
                'height' => $this->thumbHeight,
            ]);
            Category::create([
                'name' => $request->name,
                'thumbnail' => $thumbnail,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'published_date' => $request->published_date,
                'status' => $request->status,
            ]);
            DB::commit();
            return response([
                'error' => true,
                'message' => 'New Record Added',
                'redirect' => true,
                'url' => route('categories.index'),
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response([
                'success' => true,
                'message' => 'Something went wrong',
                'console' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $thumbnail = $category->thumbnail;
            if ($request->thumbnail) {
                Helper::deleteExcept([
                    'files' => [$category->thumbnail],
                    'exceptions' => [],
                    'path' => 'assets/media/categories/thumbs/'
                ]);
                $thumbnail = Helper::uploadfile([
                    'file' => $request->file('thumbnail'),
                    'path' => 'assets/media/categories/thumbs/',
                    'width' => $this->thumbWidth,
                    'height' => $this->thumbHeight,
                ]);
            }
            Category::where('id', $category->id)->update([
                'name' => $request->name,
                'thumbnail' => $thumbnail,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'published_date' => $request->published_date,
                'status' => $request->status,
            ]);
            return response([
                'success' => true,
                'message' => 'Record Updated',
                'redirect' => true,
                'url' => route('categories.index'),
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response([
                'success' => true,
                'message' => 'Something went wrong',
                'console' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Helper::deleteExcept([
            'files' => [$category->thumbnail],
            'exceptions' => [],
            'path' => 'assets/media/categories/thumbs/'
        ]);
        $category->delete();
        return response([
            'success' => true,
            'message' => 'Record Deleted',
            'table_reload' => true,
        ]);
    }
}
