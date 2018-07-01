<?php

namespace App\Http\Controllers;

use App\application;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Redirect;
use Storage;
use File;

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
        $file = $request->file('pathBefore');
        $file_after = $request->file('pathAfter');
        //$fileName = $file->getClientOriginalName();
        /*
        var_dump($request->hasFile('pathBefore'));
        var_dump(is_null($file));
        var_dump($file);
        */
        //$fileContentBefore = file_get_contents($file);
        //$blobBefore = base64_encode($fileContentBefore);
        $blobBefore = $file->openFile()->fread($file->getSize());
        $blobAfter = $file_after->openFile()->fread($file_after->getSize());
        
         $totalApp = Application::where('email',$request->email)->count();              
         if ($totalApp == 0 && $request->hasFile('pathBefore') && $request->hasFile('pathAfter')) {
             $app = new Application;         
             $app->reason = $request->reason;
             $app->email = $request->email;
             $app->pathBefore =  $blobBefore;
             $app->pathAfter =  $blobAfter;
             $app->group_id = 2;
             $app->save();
         }else{
            Application::where('email', '==', $request->email)->update(array('reason' => $request->reason));
         }
        return redirect('/');        
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
