<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Request as models;

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
        $input =$request->get('Category');
        $user =Auth::user();
        return view('home', compact('input'));
    }

    public function choose(){
            $dir=base_path().'\app';
            $files = scandir($dir);
            $categories = array();
            $namespace = 'App\\';
            foreach($files as $file) {
            //skip current and parent folder entries and non-php files
                if ($file == '.' || $file == '..' || !preg_match('/\.php/', $file) || $file=='User.php') continue;
                $model=trim($file,'.php');
                array_push($categories,$model);
            }
        return view('choose',compact('categories'));
    }
}
