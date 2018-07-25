<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Posts as AllPosts ;
class PostsController extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

        $Posts = AllPosts::orderBy('id','DESC')->paginate(5);

        return view('PostCRUD.index',compact('Posts'))

            ->with('i', ($request->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('PostCRUD.create');

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $this->validate($request, [

            'title' => 'required',

            'description' => 'required',

        ]);


        AllPosts::create($request->all());

        return redirect()->route('PostCRUD.index')

            ->with('success','AllPosts created successfully');

    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $Posts = AllPosts::find($id);

        return view('PostCRUD.show',compact('Posts'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $Posts = AllPosts::find($id);

        return view('PostCRUD.edit',compact('Posts'));

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

        $this->validate($request, [

            'post_title' => 'required',

            'post_content' => 'required',

        ]);


        AllPosts::find($id)->update($request->all());

        return redirect()->route('posts.index')

            ->with('success','AllPosts updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        AllPosts::find($id)->delete();

        return redirect()->route('PostCRUD.index')

            ->with('success','AllPosts deleted successfully');

    }
}
