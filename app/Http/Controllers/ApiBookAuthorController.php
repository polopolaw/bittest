<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateBookRequest;

class ApiBookAuthorController extends Controller
{
    public function list()
    {
        $result = DB::table('books')
        ->join('authors', 'books.author_id', '=', 'authors.id')
        ->select('books.*', 'authors.*')
        ->get();
        return response()->json($result, 200);
    }

    public function show(Book $book)
    {
        return $book;
    }

    /**
     * Update the settings.
     *
     * @param UpdateBookRequest $request
     * @return Json
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->validated());
        return response()->json($book, 200);
    }

    public function delete(Book $book)
    {
        $book->delete();

        return response()->json(null, 204);
    }
}
