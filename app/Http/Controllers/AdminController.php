<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
        }else{
       
           return view("admin.login");
        }
        return view("admin.login");
    }

    public function create()
    {
        //
    }

   
    public function auth(Request $request)
    {
       $email=$request->post('email');
       $password=$request->post('password');

    //    $result=admin::where(['email'=>$email,'password'=>$password])->get();
       $result=admin::where(['email'=>$email])->first();


       if($result){
        if(Hash::check($request->post('password'),$result->password)){
            $request->session()->put('ADMIN_LOGIN',true);
            $request->session()->put('ADMIN_ID',$result->id);
            return redirect('admin/dashboard');
        }else{
            $request->session()->flash('error','please enter correct password');
            return redirect('admin');
        }
      
     }else{

        $request->session()->flash('error','please enter valid login details');
        return redirect('admin');
       }
    
    

    //  if(isset($result['0']->id)){
    //     $request->session()->put('ADMIN_LOGIN',true);
    //     $request->session()->put('ADMIN_ID',$result['0']->id);
    //     return redirect('admin/dashboard');
    //  }else{
    //     $request->session()->flash('error','please enter valid login details');
    //     return redirect('admin');
    //  }
    } 

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
//     public function updatepassword()
//     {
//        $r=Admin::find(1);
//        $r->password=Hash::make('raju1234');
//        $r->save(); 

//     }
}
