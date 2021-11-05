<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;


class AuthorControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Author::get();
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
            'name' => 'required|max:10|min:3',
            'age' => 'required|max:10|min:1',
            'privince' => 'required',
        ]);

        $author = new Author();
        $author->name = $request->name;
        $author->age  = $request->age;
        $author->province = $request->province;

        $author->save();
        return response()->json(['message' => 'Author created successfully'], 201);

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
        return Author::findOrFail($id);
        
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
            'name' => 'required|max:10|min:3',
            'age' => 'required|max:10|min:1',
            'privince' => 'required',
        ]);
        

        $author = Author::findOrFail($id);;
        $author->name = $request->name;
        $author->age  = $request->age;
        $author->province = $request->province;

        $author->save();
        return response()->json(['message' => 'Author update successfully'], 200);
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
