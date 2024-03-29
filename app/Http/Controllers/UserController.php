<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show nationalities list
        return view('dashboard.users.list',[
            'list'=> User::all(),
            'active'=>'users',
            'title'=> "Users",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.users.add',[
            'active'=>'users',
            'title'=> "Add User",

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $rules = [
            'phone' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ];

        $this->validate($request, $rules);

       $user =  User::create([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'role' => $request->get('role'),
            'password' => bcrypt($request->get('password')),

        ]);


        Session::Flash('success',"Operation has successfully finished");
        return Redirect::back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {


        $user =  Auth::user() ;
        if (!$user) abort(404);
        // show show form
        return view('auth.profile',[
            'active'=>'profile',
            'title'=> "Profile",
            'model' => $user
        ]);
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
//        dd('enter') ;
//
//        //update a nationality
//        $rules = [
//            'phone' => 'required',
//            'password' => 'required|string|min:6|confirmed',
//        ];
//
//        $this->validate($request, $rules);
//
//       $user =  User::find($id)->update([
//            'name' => $request->get('name'),
//            'phone' => $request->get('phone'),
//            'password' => bcrypt($request->get('password')),
//
//        ]);
//
//       dd($user) ;
//        Session::Flash('success',"Operation has successfully finished");
//
//        return Redirect::back();

    }
    public function updateProfile(Request $request)
    {


        //update a nationality
        $rules = [
            'email' => 'required',

        ];

        $this->validate($request, $rules);

        $user = Auth::user();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));

      $user->save() ;
        Session::Flash('success',"Operation has successfully finished");

        return Redirect::back();

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        User::find($id)->delete() ;

        return Redirect::back();
    }
}
