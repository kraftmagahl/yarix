<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVulnRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;



class VulnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $category=$request->get('Category');
        $model="App\\".$category;
        $vulns=$model::all();
        return view('vulns.index',compact('vulns','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   $category=$request->get('Category');
        return view('vulns.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $category=$request->get('Category');
        $model="App\\".$category;
        $vuln=$model::create($request->all());
        $user_name = Auth::user()->name;
        $vuln->updated_by=$user_name;
        $vuln->save();
        return view('vulns.show',compact('vuln','category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   $category=$request->get('Category');
        $model="App\\".$category;
        $vuln=$model::findOrFail($request->get('id'));
        return view('vulns.show',compact('vuln','category'));
    }

      /**
     * Search in DB for the specified entry.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $category=$request->get('Category');
        $model="App\\".$category;
        $vulns=$model::where('Titolo_ufficiale', 'LIKE','%'. $request->get('Titolo_ufficiale').'%')
        ->orwhere('Titolo_ufficiale', 'LIKE',  $request->get('Titolo_ufficiale'))
        ->orwhere('Descrizione', 'LIKE', '%' . $request->get('Titolo_ufficiale'). '%')
        ->orwhere('OWASP', 'LIKE', $request->get('Titolo_ufficiale'))
        ->orwhere('OWASP', 'LIKE','%'. $request->get('Titolo_ufficiale').'%')
        ->orwhere('Titolo_non_ufficiale', 'LIKE', '%' . $request->get('Titolo_ufficiale'). '%')->get();
        return view('vulns.search',compact('vulns','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   $category=$request->get('Category');
        $model="App\\".$category;
        $vuln=$model::findOrFail($request->get('id'));
        return view('vulns.edit',compact('vuln','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $category=$request->get('Category');
        $model="App\\".$category;
        $vuln=$model::findOrFail($id);
        $vuln->update($request->all());
        $user_name = Auth::user()->name;
        $vuln->updated_by=$user_name;
        $vuln->save();
        return view('vulns.show',compact('vuln','category'));
    }

    public function new_category(Request $request){
        $categories=$request->input('categories');
        return view ('new_category',compact('categories'));
    }

}
