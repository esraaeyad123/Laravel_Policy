<?php

namespace App\Http\Controllers\Admin;
use App\Model\user\tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class tagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tags=tag::all();
        return view('admin.tag.show',compact('tags'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.tag');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'slug'=>'required',
            'name'=>'required',


        ]);

        $tag=new tag;


        $tag->slug = $request->slug;
        $tag->name = $request->name;
        $tag->save();
        return redirect(route('tag.index'));    }

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
        $tag=  tag::where('id',$id)->first();
        return view('admin.post.edit',compact('tag'));
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
        $this->validate($request,[

            'slug'=>'required',
            'name'=>'required',


        ]);

        $tag=tag::find($id);


        $tag->slug = $request->slug;
        $tag->name = $request->name;
        $tag->save();
        return redirect(route('tag.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tag::where('id',$id)->delete();
        return redirect()->back();
    }
}
