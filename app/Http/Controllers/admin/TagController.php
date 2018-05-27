<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\TagRequest;
use App\Http\Requests\TagUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\models\Tag;
use Illuminate\Support\Facades\Session;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.tags.index')->with('tags',Tag::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        //

        $input=$request->all();


        Tag::create($input);


        Session::flash('success','Created Tag Successfully');


        return redirect()->route('tag.index');


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

        return view('admin.tags.edit')->with('tag',Tag::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, $id)
    {
        //
        $input=$request->all();

        $tag=Tag::findOrFail($id);
        $tag->update($input);

        Session::flash('success','Updated Successfully');

        return redirect()->route('tag.index');
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
        $tag=Tag::findOrFail($id);
        $tag->delete();

        Session::flash('success','Deleted Successfully');

        return redirect()->route('tag.index');
    }
}
