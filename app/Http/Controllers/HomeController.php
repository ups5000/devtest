<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User_test;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserBirthDayUpdateRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(UserBirthDayUpdateRequest $request)
    {
        $data = [];
        $date = $request->input('birthdate');
        if( !isset($date)){
            //If not post request date
            $date = User_test::get_birth(Auth::user()->id);
        }
					      
        if( isset($date) && $date != ''){
            $date = Carbon::parse($date)->format('Y/m/d');
            //if the key exists Sent to DB
            User_test::update_birth(Auth::user()->id, $date);
            //Calculate days
            $data['days_to_bday'] = $this->getDaysToBirthDay($date);
			$data['date'] = $date;
        }
//$data['date'] = User_test::get_birth(Auth::user()->id);
        return view('home',$data);
    }

    protected  function getDaysToBirthDay($date){
        $diffDays = '';
        //Calc days to bday
		$b_day = Carbon::parse($date);
        //reset year to count only days
		$b_day->year(date('Y'));
		$diffDays =  Carbon::now()->diffInDays($b_day,false);
		//BirthDay is over, calc next
		if( $diffDays <= 1 ){
			//Calc today to end year
			$today_endyear =  Carbon::now()->diffInDays(date('Y').'-12-31',false);
			//Calc 01/01
			$nextBirth = Carbon::parse( (date('Y')).'-01-01')->addYear(1);
			$b_day->year(date('Y')+1);
			//Calc days to birthDay in next year and add the values
			$nextBirth = $nextBirth->diffInDays($b_day,false);
			//Result
			$diffDays = $today_endyear + $nextBirth;
		}        		
        return $diffDays;
    }
}
