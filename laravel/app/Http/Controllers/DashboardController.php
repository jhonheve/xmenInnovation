<?php

namespace App\Http\Controllers;
use App\Application;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = Application::get();//var_dump($groups);     
        return view('dashboard',compact('apps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        var_dump("611111111111asdfas");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        var_dump("511111111111asdfas");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        destroy($id);
        $data = $id . "411111111111asdfas";
        var_dump($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        var_dump("311111111111asdfas");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        var_dump("211111111111asdfas");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $updateDetails = Application::where('id', $id)->first();
        //var_dump($updateDetails);
        User::create([            
            'email' => $updateDetails->email,
            'password' => Hash::make($updateDetails->email)
        ]);
        User::save();

        $user = new User;                      
        $user->email = $updateDetails->email;
        $user->password = Hash::make($updateDetails->email);
        $user->save();
        //var_dump($user);
        return index();
    }
}
