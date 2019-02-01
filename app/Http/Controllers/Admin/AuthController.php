<?php

namespace App\Http\Controllers\Admin;

use App\Http\Middleware\notAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class AuthController extends Controller
{

    private $request;

    /**
     * AuthController constructor.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->middleware(notAuth::class);
    }

    public function index()
    {
        return $this->getLogin();
    }


    public function show($method)
    {
        $method = "get" . ucwords($method);
        if (method_exists($this, $method))
            return call_user_func(array($this, $method), $this->request);
        else
            return "Route Bulunamadı";

    }


    public function update(Request $request, $method)
    {
        $method = "post" . ucwords($method);
        if (method_exists($this, $method))
            return call_user_func(array($this, $method), $this->request);
        else
            return "Route Bulunamadı";
    }


    private function getLogin()
    {
        return view('Admin.auth.login');
    }


    private function postLogin(Request $request)
    {

        if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'),'type'=>'admin'])) {
            return redirect()->to('admin/dashboard');
        }

        return redirect()->back()->withErrors(['can' => 'hata ver']);
    }


    private function getLogout()
    {
        auth()->guard('admin')->logout();
        return redirect('admin/dashboard');
    }


}
