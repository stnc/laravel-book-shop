<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Posts as AllPosts ;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    //https://www.kahramaner.com/yazilim/query-builder-methods/
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
//https://scotch.io/tutorials/simple-laravel-crud-with-resource-controllers
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

            'post_title' => 'required',

            'post_content' => 'required',

        ]);


        AllPosts::create($request->all());

        return redirect()->route('posts.index')

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
        $tags =($Posts->tags()->get());
        $comments=($Posts->comments()->get());

        return view('PostCRUD.show',compact('Posts','tags'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

       // $Posts = AllPosts::find($id);
        $Posts = AllPosts::find($id)->categories()->get();//reverse
        $Posts = AllPosts::where ('id','=',$id)->with('categories')->first();;

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
////https://laraveldaily.com/upload-multiple-files-laravel-5-4/
/// /// https://laracasts.com/discuss/channels/laravel/how-to-display-file-which-had-already-upload-laravel-52?page=1

        $file = $request->file('media_picture');
        $destinationPath = 'uploads';



        $this->validate($request, [
            'post_title' => 'required',
            'post_content' => 'required',
            'media_picture' => ' mimes:jpeg,jpg,png | max:1000',
        ]);



        if ($request->hasFile('media_picture'))
        {
            $file =$request->media_picture;
            $fileName = $file->getClientOriginalName();
            $file->move($destinationPath,$file->getClientOriginalName());
        } else {
            $fileName=null;
        }




//$request->all()
        $update_data=['post_title'=>$request->post_title,
            'post_content'=>$request->post_content,
            'media_picture'=>$fileName
            ];


        AllPosts::find($id)->update($update_data);

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

        return redirect()->route('posts.index')

            ->with('success','AllPosts deleted successfully');

    }
}
