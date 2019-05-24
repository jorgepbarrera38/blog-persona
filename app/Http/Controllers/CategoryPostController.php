<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\CategoryPost;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryPost::latest()->get();
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
    public function store(CategoryRequest $request)
    {
        CategoryPost::create(['name' => $request['name'], 'slug' => str_slug($request['name'])]);
        return redirect()->route('categories.index')->with('success', 'Categoría creada exitosamente');
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
    public function edit(CategoryPost $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryPost $category)
    {
        $data = $request->validate([
            'name' => 'required|max:50|unique:category_posts,name,'.$category->id
        ]);

        $category->update($data);

        return redirect()->route('categories.index')
                         ->with('success', 'La categoría "'. $category->name .'" ha sido actualizada. ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryPost $category)
    {
        if($category->posts()->count()) {
            return redirect()->back()->with('error', 'La categoría "' . $category->name . '" no se puede eliminar porque tiene posts asignados');
        }
        $category->delete();
        return redirect()->back()->with('success', 'La categoría "' . $category->name . '" se eliminó exitosamente');
    }
}
