<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


class AuthorController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return View::make('admin.authors.index')
            ->with('authors', $authors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        Author::create($validated);
        $request->session()->put('message', 'Author was successful created!');
        return Redirect::to('admin/authors');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the author
        $author = author::find($id);
        // show the view and pass the author to it
        return View::make('admin.authors.show')
            ->with('author', $author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = author::find($id);

        // show the edit form and pass the author
        return View::make('admin/authors.edit')
            ->with('author', $author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        $data = $request->validate([
            'name' => 'required|max:255',
        ]);
        $author->fill($data);
        $author->save();
        $request->session()->put('message', 'Author was successful updated!');
        return Redirect::to('admin/authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $author = Author::find($id);
        $author->delete();

        // redirect
        $request->session()->put('message', 'Author was successful delete!');
        return Redirect::to('admin/authors');
    }
}
