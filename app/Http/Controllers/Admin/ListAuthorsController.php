<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class ListAuthorsController extends Controller
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

    public function index()
    {  
        $context = [];
        foreach (Author::all() as $author) {
           $context[$author->name] =  Book::where('author_id', $author->id)->count();
        }         
        return view('admin.listauthor')->with('context', $context);
    }
}
