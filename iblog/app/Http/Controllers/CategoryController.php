<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    
    public function index()
    {   $categories = Category::with('posts')->paginate(5);

        return view('admin.category.index')->with(['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' =>Str::slug($request->name)
        ]);
        return redirect()->route('categories.create');
    }
    public function edit( $id )
    {   
        $category = Category::find($id);
        return view('admin.category.edit')
                    ->with('category', $category)
                    ->with('id', $id);
    }
    public function update(Request $request, $id )
    {  
        Category::where('id', $id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }
    public function delete( $id )
    {  
        Category::where('id', $id)->delete();
        return redirect()->route('categories.index');
    }
    
}
