<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Book::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|max:3|min:10',
            'body' => 'required|max:3|min:50',
        ]);

        $book = new Book();
        $book->author_id = $request->author_id;
        $book->title     = $request->title;
        $book->body      = $request->body;
        $book->save();

        return response()->json(['message' => 'Book created successfully'], 201);
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
        return Book::findOrFail($id);
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
        //
        $request->validate([
            'title' => 'required|max:3|min:10',
            'body' => 'required|max:3|min:50',
        ]);

        $book = Book::findOrFail($id);
        $book->author_id = $request->author_id;
        $book->title     = $request->title;
        $book->body      = $request->body;
        $book->save();

        return response()->json(['message' => 'Book created successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
    }
}
