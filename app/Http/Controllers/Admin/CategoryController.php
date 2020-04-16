<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('can:create category', ['only' => ['create', 'store']]);
        $this->middleware('can:edit category', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete category', ['only' => ['destroy']]);
    }

    public function index()
    {
        $categories = Category::when(request('search'), function($category) {
            return $category->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->get();
        
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect('admin/category')
        ->with('success', 'A catgory created successfully.'); 
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect('admin/category')
            ->with('success', 'A catgory updated successfully.'); 
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('admin/category')
            ->with('success', 'A catgory deleted successfully.'); 
    }
}
