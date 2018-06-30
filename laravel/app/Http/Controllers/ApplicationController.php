<?php

namespace App\Http\Controllers;

use App\application;
use Illuminate\Http\Request;
use Redirect;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(application $application)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //var_dump($request->input('reason'));        
         
         $totalApp = Application::where('email',$request->email)->count();
         var_dump($totalApp);
         if ($totalApp == 0) {
             $app = new Application;         
             $app->reason = $request->reason;
             $app->email = $request->email;
             $app->group_id = 2;
             $app->save();
         }else{
            Application::where('email', '==', $request->email)->update(array('reason' => $request->reason));
         }
         return Redirect::action('WelcomeController@index');
        /*         
        'pathBefore' =>$request->input('pathBefore'),
        'pathAfter' => $request->input('pathAfter'),
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(application $application)
    {
        //
    }
}
