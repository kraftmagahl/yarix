<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVulnRequest;
use Illuminate\Http\Request;
use App\Vuln;
use Illuminate\Support\Facades\Auth;

class VulnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $vulns=Vuln::all();
        return view('vulns.index',compact('vulns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vulns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $vuln=Vuln::create($request->all());
        $user_name = Auth::user()->name;
        $vuln->updated_by=$user_name;
        $vuln->save();
        return view('vulns.show',compact('vuln'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $vuln=Vuln::findOrFail($id);
        return view('vulns.show',compact('vuln'));
    }

      /**
     * Search in DB for the specified entry.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $vulns=Vuln::where('Titolo_ufficiale', 'LIKE', '%' . $request->get('Titolo_ufficiale'). '%')->get();
        $vulns1=Vuln::where('Descrizione', 'LIKE', '%' . $request->get('Titolo_ufficiale'). '%')->get();
        $vulns2=Vuln::where('OWASP', 'LIKE', '%' . $request->get('Titolo_ufficiale'). '%')->get();
        $vulns3=Vuln::where('Titolo_non_ufficiale', 'LIKE', '%' . $request->get('Titolo_ufficiale'). '%')->get();
        $vulns = collect($vulns1);
        $vulns=collect($vulns2);
        $vulns=collect($vulns3);
        return view('vulns.search',compact('vulns'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $vuln=Vuln::findOrFail($id);
        return view('vulns.edit',compact('vuln'));
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
        $vuln=Vuln::findOrFail($id);
        $vuln->update($request->all());
        $user_name = Auth::user()->name;
        $vuln->updated_by=$user_name;
        $vuln->save();
        return view('vulns.show',compact('vuln'));
    }

}
