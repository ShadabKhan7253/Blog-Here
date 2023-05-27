<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['validateAdmin'])->only(['create','edit','update','destroy','trash']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Category::orderBy('id','desc')->paginate(5);
        $categories = Category::latest()->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        // dd($request);
        // request()->validate([
        //     'name' => 'required | min:3 | max:255'
        // ]);

        $userId = auth()->user()->id;

        Category::create([
            'name' => $request->name,
            'created_by' => $userId,
            'last_updated_by' => $userId,
        ]);

        // session()->put('success','Category created successfully...');
        session()->flash('success','Category created successfully...');
        return redirect(route('admin.categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact(['category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request,Category $category)
    {
        $category->name = $request->name;
        $category->save();

        session()->flash('success','Category updated successfully...');
        return redirect(route('admin.categories.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Category $category)
    {
        // TODO: Validate whether the category has post associate with it. if not then only proceed
        $category->delete();
        session()->flash('success','Category deleted successfully...');
        return redirect(route('admin.categories.index'));
    }
}
