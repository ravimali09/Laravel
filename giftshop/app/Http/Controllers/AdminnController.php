<?php

namespace App\Http\Controllers;

use App\Models\adminn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminnController extends Controller
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
    public function create()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
    
        $validated = $request->validate([
            'email'=> 'required|email',
           'password'=> 'required|min:3|max:12',
        ]);
        $email=$request->email;
        $password=$request->password;
        
        $data=adminn::where('email',$email)->first();  
        if($data)
        {
            if(Hash::check($password,$data->password))
            {
                    session()->put('admin_id',$data->id);
					session()->put('email',$data->email);
					session()->put('name',$data->name);

                    echo "<script> 
                    alert('Login Suuceess !');
                    window.location='/dashboard';
                    </script>";
               
            }
            else
            {
                echo "<script> 
                        alert('Password not match !'); 
                        window.location='/admin_login';
                    </script>";
                   
               
            }
        }
        else
        {
            echo "<script>
                alert('Admin does not exits !');
                window.location='/admin_login';
             </script>";
            
        }

    }
    public function admin_logout()
    {
        session()->pull('admin_id');
        session()->pull('email');
        session()->pull('name');
        
        echo "<script>
        alert('Logout Success !');
        window.location='/admin_login';
     </script>";

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\adminn  $adminn
     * @return \Illuminate\Http\Response
     */
    public function show(adminn $adminn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\adminn  $adminn
     * @return \Illuminate\Http\Response
     */
    public function edit(adminn $adminn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\adminn  $adminn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, adminn $adminn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\adminn  $adminn
     * @return \Illuminate\Http\Response
     */
    public function destroy(adminn $adminn)
    {
        //
    }
}
