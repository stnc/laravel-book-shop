<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Posts as AllPosts;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = $request->input('search');
        if ($request->has('search')) {
            $Posts = AllPosts::with('comments')->whereHas('comments', function ($q) use ($category) {
                //$q->where('CommentId',$category);
                $q->where('comment_content', 'LIKE', '%' . $category . '%');
            })->paginate(5);


            return view('admin.posts.index', compact('Posts'))->with('i', ($request->input('page', 1) - 1) * 5);;
        } else {
            $Posts = AllPosts::orderBy('id', 'DESC')->paginate(5);
            return view('admin.posts.index', compact('Posts'))->with('i', ($request->input('page', 1) - 1) * 5);
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $cats = \App\Models\Category::all();

        return view('admin.posts.create',compact('cats'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $destinationPath = 'uploads';
        $fileName = null;
        if ($request->hasFile('media_picture')) {

            $file = $request->media_picture;

            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $fileName = $timestamp . '-' . $file->getClientOriginalName();

            $file->move($destinationPath, $fileName);

        }


        $this->validate($request, [
            'post_title' => 'required',
            'post_content' => 'required',

        ]);

        $update_data = [
            'post_title' => $request->post_title,
            'post_content' => $request->post_content,
            'media_picture' => $fileName,
            'post_author' => 1,
            'post_status' => 1,
            'post_order' => 1,
        ];

        $posts = AllPosts::create($update_data);

        $explode = explode(',', $request->get('tags'));
        foreach ($explode as $exp) {
            $tag = new \App\Models\Tag;
            $tag->name = $exp;
            $posts->tags()->save($tag);
        }

        $posts->categories()->attach($request->get('cat'));

        return redirect()->route('posts.index')
            ->with('success', 'AllPosts created successfully');

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id, Request $request)

    {

        $posts = AllPosts::find($id);
        $tags = ($posts->tags()->get());
        $comments = ($posts->comments()->get());


        return view('admin.posts.show', compact('posts', 'tags'));


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)

    {

        // $Posts = AllPosts::find($id);
        //   $Posts = AllPosts::find($id)->categories()->get();//reverse
        $Posts = AllPosts::where('id', '=', $id)->with('categories', 'comments', 'tags')->first();;

        return view('admin.posts.edit', compact('Posts'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)

    {

        $file = $request->file('media_picture');
        $destinationPath = 'uploads';


        $this->validate($request, [
            'post_title' => 'required',
            'post_content' => 'required',

            'media_picture' => ' mimes:jpeg,jpg,png | max:1000',
        ]);


        if ($request->hasFile('media_picture')) {
            $file = $request->media_picture;
            $fileName = $file->getClientOriginalName();
            $file->move($destinationPath, $file->getClientOriginalName());
        } else {
            $fileName = null;
        }


        $update_data = [
            'post_title' => $request->post_title,
            'post_content' => $request->post_content,
            'media_picture' => $fileName,
            'post_author' => 1
        ];


        AllPosts::find($id)->update($update_data);

        return redirect()->route('posts.index')
            ->with('success', 'AllPosts updated successfully');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)

    {

        AllPosts::find($id)->delete();

        return redirect()->route('posts.index')
            ->with('success', 'AllPosts deleted successfully');

    }
}
