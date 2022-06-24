<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


class bookController extends Controller
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
        $books = Book::all();

        return View::make('admin.books.index')
            ->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return View::make('admin.books.create')
            ->with('authors', $authors);
        
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
            'title' => 'required|max:255',
            'desc' => 'required',
            'year' => 'required|integer',
            'author_id' => 'required|integer'
        ]);
        Book::create($validated);
        $request->session()->put('message', 'Book was successful created!');
        return Redirect::to('admin/books');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the book
        $book = Book::find($id);
        // show the view and pass the book to it
        return View::make('admin.books.show')
            ->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = book::find($id);

        // show the edit form and pass the book
        $authors = Author::all();

        return View::make('admin/books.edit')
            ->with('book', $book)->with('authors', $authors);
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
        $book = Book::find($id);
        $data = $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required',
            'year' => 'required|integer',
            'author_id' => 'required|integer'
        ]);
        $book->fill($data);
        $book->save();
        $request->session()->put('message', 'Book was successful updated!');
        return Redirect::to('admin/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $book = Book::find($id);
        $book->delete();

        // redirect
        $request->session()->put('message', 'Book was successful delete!');
        return Redirect::to('admin/books');
    }
}
