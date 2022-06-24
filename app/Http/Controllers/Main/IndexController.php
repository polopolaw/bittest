<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Show the application main page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $result = DB::table('books')
        ->join('authors', 'books.author_id', '=', 'authors.id')
        ->select('books.*', 'authors.*')
        ->get();
        return view('main.index')->with('context', $result);
    }
}
