<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
 
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.create')->only('create', 'store');
        $this->middleware('can:admin.categories.edit')->only('edit', 'update');
        $this->middleware('can:admin.categories.destroy')->only('destroy');
    }
    
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $category = Category::create([
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name'))
        ]);

        return redirect()->route('admin.categories.edit', compact('category'))
            ->with('flag', 'Registro ')->with('info', 'La categoria creada con exito');

    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id
        ]);
        
        $category->update([
            'name' =>  $request->get('name'),
            'slug' => Str::slug($request->get('name'))

        ]);

        return redirect()->route('admin.categories.edit', compact('category'))->with('info', 'La categoria se actualizo con exito');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('info', 'La categoria fue elimino con exito');
    }
}
