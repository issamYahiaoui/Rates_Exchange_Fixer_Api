<?php

namespace App\Http\Controllers;

use App\Rate;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class RateController extends Controller
{

     private $fixer_api_key = "2d3b5b696603cab63d2965dd8e77be60" ;
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
        return view('dashboard.rates.list',[
            'list'=> Rate::all(),
            'active'=>'rates',
            'title'=> "Rates",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.rates.add',[
            'active'=>'rates',
            'title'=> "Add Rate",

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
            'date' => 'required',

        ];

        $this->validate($request, $rules);

        $date = $request->get('date') ;

        $rate =  Rate::create([
            'date' => $date,
            'user_id' => Auth::user()->id,
            'dzd_rate' => $request->get('dzd_rate') ,
            'gbp_rate' => $request->get('gbp_rate') ,

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
    public function show($id)
    {


        $rate =  Rate::find(id) ;
        if (!$rate) abort(404);
        // show show form
        return view('auth.profile',[
            'active'=>'profile',
            'title'=> "Profile",
            'model' => $rate
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



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Rate::find($id)->delete() ;

        return Redirect::back();
    }
}
