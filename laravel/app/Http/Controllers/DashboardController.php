<?php

namespace App\Http\Controllers;
use App\Application;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->check()) {
            $apps = Application::get();        
            return view('dashboard',compact('apps'));
        }else{
            return redirect('/');
        }        
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
        if (auth()->check()) {
            $this->destroy($id);
        }else{
            return redirect('/');
        }
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
        //var_dump($id);
        $updateDetails = Application::where('id', $id)->first();
        if (!is_null($updateDetails)) {
           $newUser = User::where('email', $updateDetails->email)->first();                
            if (is_null($newUser)) {
                User::create([            
                    'email' => $updateDetails->email,
                    'password' => Hash::make($updateDetails->email),
                    'group_id' => "1"
                ]);                
            }
            $updateDetails->delete();
        }       
        return $this->index();
    }

    public function logout(){
        auth()->logout();
        session()->flash('message', 'Some goodbye message');        
        return redirect('/');
  }
}
