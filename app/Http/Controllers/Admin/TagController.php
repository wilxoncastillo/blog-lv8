<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public $colors = [
        '' => 'Seleccione un color',
        'bg-black' => 'bg-black',
        'bg-white' => 'bg-white',
        'bg-slate-500' => 'bg-slate',
        'bg-gray-500' => 'bg-gray',
        'bg-zinc-500' => 'bg-zinc',
        'bg-neutral-500' => 'bg-neutral',
        'bg-stone-500' => 'bg-stone',
        'bg-red-500' => 'bg-red',
        'bg-orange-500' => 'bg-orange',
        'bg-amber-500' => 'bg-amber',
        'bg-yellow-500' => 'bg-yellow',
        'bg-lime-500' => 'bg-lime',
        'bg-green-500' => 'bg-green',
        'bg-emerald-500' => 'bg-emerald',
        'bg-teal-500' => 'bg-teal',
        'bg-cyan-500' => 'bg-cyan',
        'bg-sky-500' => 'bg-sky',
        'bg-blue-500' => 'bg-blue',
        'bg-indigo-500' => 'bg-indigo',
        'bg-violet-500' => 'bg-violet',
        'bg-purple-500' => 'bg-purple',
        'bg-fuchsia-500' => 'bg-fuchsia',
        'bg-pink-500' => 'bg-pink',
        'bg-rose-500' => 'bg-rose', 
    ];
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create', [
            'colors' => $this->colors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags',
            'color' => 'required'
        ]);

        $tag = Tag::create([
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name')),
            'color' => $request->get('color')
        ]);

        return redirect()->route('admin.tags.edit', compact('tag'))
            ->with('flag', 'Registro ')->with('info', 'Tag creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.create', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', [
            'colors' => $this->colors,
            'tag' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags,slug,' . $tag->id,
            'color' => 'required'
        ]);

        $tag->update([
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name')),
            'color' => $request->get('color')
        ]);

        return redirect()->route('admin.tags.edit', 
            ['colors' => $this->colors,
            'tag' => $tag]
        )->with('flag', 'Registro ')->with('info', 'Tag actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('info', 'El tag fue elimino con exito');
    }
}
