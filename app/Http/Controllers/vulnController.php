<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVulnRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;


class VulnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
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
     * @param  \Illuminate\Http\Request  $request
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
    {   $this->validate($request,[
            'Titolo_ufficiale'=>'required',
            'OWASP'=>'required',
            'Gravità'=>'required',
            'Descrizione'=>'required|not_in:'."Enter Description...",
            'Soluzione'=>'not_in:'."Enter Solution...",
            'Descrizione_en'=>'not_in:'."Enter Description...",
            'Soluzione_en'=>'not_in:'."Enter Solution...",
            'PoC'=>'not_in:'."Enter Proof of Concept(PoC)...",
            'PoC_en'=>'not_in:'."Enter Proof of Concept(PoC)..."
        ]);
        $category=$request->get('Category');
        $model="App\\".$category;
        $vuln = $model::create();
        $user_name = Auth::user()->name;
        $vuln->fillable(array_merge($vuln->getFillable(),
        [
            'Titolo_non_ufficiale',
            'Titolo_ufficiale',
            'OWASP',
            'Gravità',
            'Descrizione',
            'Soluzione',
            'PoC',
            'Descrizione_en',
            'Soluzione_en',
            'PoC_en',
            'updated_by'

            ]));
        $vuln->fill([
            'Titolo_ufficiale'=>$request->get('Titolo_ufficiale'),
            'OWASP'=>$request->get('OWASP'),
            'Gravità'=>$request->get('Gravità'),
            'Descrizione'=>$request->get('Descrizione'),
            'Soluzione'=>$request->get('Soluzione'),
            'PoC'=>$request->get('PoC'),
            'Descrizione_en'=>$request->get('Descrizione_en'),
            'Soluzione_en'=>$request->get('Soluzione_en'),
            'PoC_en'=>$request->get('PoC_en'),
            'updated_by'=>$user_name
        ])->save();
        return view('vulns.show',compact('vuln','category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
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
     * @param  \Illuminate\Http\Request  $request
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
    {    $this->validate($request,[
            'Titolo_ufficiale'=>'required',
            'OWASP'=>'required',
            'Descrizione'=>'required'
        ]);
        $category=$request->get('Category');
        $model="App\\".$category;
        $vuln=$model::findOrFail($id);
        $user_name = Auth::user()->name;
        $vuln->fillable(array_merge($vuln->getFillable(),
        [
            'Titolo_non_ufficiale',
            'Titolo_ufficiale',
            'OWASP',
            'Gravità',
            'Descrizione',
            'Soluzione',
            'PoC',
            'Descrizione_en',
            'Soluzione_en',
            'PoC_en',
            'updated_by'

            ]));
        $vuln->fill([
            'Titolo_ufficiale'=>$request->get('Titolo_ufficiale'),
            'OWASP'=>$request->get('OWASP'),
            'Gravità'=>$request->get('Gravità'),
            'Descrizione'=>$request->get('Descrizione'),
            'Soluzione'=>$request->get('Soluzione'),
            'PoC'=>$request->get('PoC'),
            'Descrizione_en'=>$request->get('Descrizione_en'),
            'Soluzione_en'=>$request->get('Soluzione_en'),
            'PoC_en'=>$request->get('PoC_en'),
            'updated_by'=>$user_name
        ])->save();
        return view('vulns.show',compact('vuln','category'));
    }
     /**
     * create a new kind of storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function new_category(Request $request){
        $categories=$request->input('categories');
        return view ('new_category',compact('categories'));
    }

    public function json(Request $request, $titolo){
        return response($titolo,200)->header('Content-Type','text/plain');
    }


}
