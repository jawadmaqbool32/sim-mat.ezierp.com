<?php

namespace App\Http\Controllers;

use App\Core\Helper;
use App\Http\Datatables\CategoryDatatable;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::getAll();
            return DataTables::of($categories)
                ->addIndexColumn()
                ->editColumn('thumbnail', function ($category) {
                    if (!$category->thumbnail) {
                        return "Image not available";
                    }
                    return  '<div class="d-flex align-items-center">
                <div class="symbol symbol-45px me-5">
                    <img alt="thumbnail" src="' . asset("assets/media/categories/thumbs/" . $category->thumbnail) . '">
                </div>
            </div>';
                })
                ->editColumn('status', function ($category) {
                    $text = ucwords($category->status);
                    if ($category->status == 'published') {
                        $color = 'btn-success';
                    } elseif ($category->status == 'unpublished') {
                        $color = 'btn-warning';
                    } else {
                        $text = $text . ' (' . date('d M, Y h:i A', strtotime($category->published_date)) . ')';
                        $color = 'btn-danger';
                    }
                    return '<button class="btn btn-sm ' . $color . '">' . $text . '</button>';
                })
                ->addColumn('action', function ($category) {
                    $btns = [];
                    if (auth()->user()->hasPermission('edit-category')) {
                        $btns[] = '<a href="' . route('categories.edit', $category->uid) . '"  class="mx-1 float-end btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                    <span class="svg-icon svg-icon-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                        </svg>
                    </span>
                </a>';
                    }
                    if (auth()->user()->hasPermission('delete-category')) {
                        $btns[] = '<a href="#" data-bs-target="#delete_modal" data-bs-toggle="modal" data-modal_id="' . $category->uid . '" data-modal_name="' . $category->name . '" data-modal_title="Delete ' . $category->name . '?" class="mx-1 float-end btn btn-icon btn-bg-light btn-active-color-primary btn-sm modal-button">
                    <span class="svg-icon svg-icon-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                        </svg>
                    </span>
                </a>';
                    }
                    if (count($btns)) {
                        return implode($btns);
                    } else {
                        return null;
                    }
                })
                ->rawColumns(['action', 'thumbnail', 'status'])
                ->make(true);
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
