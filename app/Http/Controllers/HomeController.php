<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User ;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$request->user()->authorizeRoles(['employee', 'manager']);
        return view('home');
    }


    public function getPosts()
    {
        return \DataTables::of(User::query())->make(true);
    }
    /*
public function someAdminStuff(Request $request)
{
  $request->user()->authorizeRoles('manager');

  return view(‘some.view’);
}
*/
}
