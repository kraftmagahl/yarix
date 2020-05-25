<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVulnRequest;
use Illuminate\Http\Request;
use App\Vuln;

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

    public function search(Request $request){
        $vulns=Vuln::where('Titolo_ufficiale', 'LIKE', '%' . $request->get('Titolo_ufficiale'). '%')->get();
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
        return redirect('/home');
    }

}
