<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Book::all();

        //return $data;
        return response()->json([
                "message" => "Load data success",
                "data"=> $table
            ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new Book();
        $table->title = $request->title;
        $table->description = $request->description;
        $table->author = $request->author;
        $table->publisher = $request->publisher;
        $table->date_of_issue = $request->date_of_issue;
        $table->save();

        return response()->json([
            "message" => "Load data success",
            "data"=> $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Book::find($id);
        if($table){
            return $table;
        }else{
            return ["massage" => "Data not found"];

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = Book::find($id);
        if($data){
            $data->title = $request->title ? $request->title : $data->title;
            $data->description = $request->description ? $request->description : $data->description;
            $data->author = $request->author ? $request->author : $data->author;
            $data->publisher = $request->publisher ? $request->publisher : $data->publisher;
            $data->date_of_issue = $request->date_of_issue ? $request->date_of_issue : $data->date_of_issue;
            $data->save();

            return $data;
        }else{
            return ["message" => "Data  Tidak  Ditemukan"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Book::find($id);
        if ($table){
            $table->delete();
            return ["message"=>"Delete success"];
        }else{
            return ["message"=>"Data not found"];
        }
    }
}
