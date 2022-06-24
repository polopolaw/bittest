<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListBooksController extends Controller
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
        $result = DB::table('books')
        ->join('authors', 'books.author_id', '=', 'authors.id')
        ->select('books.title', 'authors.name')
        ->get();
        return view('admin.listbook')->with('context', $result);
    }
}
