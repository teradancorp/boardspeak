<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Torann\GeoIP\Facades\GeoIP;
use Auth;
use Validator;
class MemberController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $boards = \App\Board::where('author_id', $user->id)->get();
        return view('/members/home', compact('boards', 'user'));
    }

    public function registration(){

        $ipaddress = \Request::getClientIp(true);
        $location = geoip($ipaddress);

        return view('members/registration', ['location' => $location]);
    }

    public function checkEmail(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users|max:255',
        ]);

        if ($validator->passes()) {
//            return response()->json(['success'=>'Added new records.']);
            session(['user-email' => request('email')]);

        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function doneStep2(Request $request){

        $validator = Validator::make($request->all(),
            [
                'new-name' => 'required|max:70',
                'new-username' => 'required|min:6|max:20',
            ],
            [
                'new-name.required' => 'Your Name field is required.',
                'new-username.required' => 'Alias field is required.',
                'new-username.min' => 'Alias field must be atleast 6 characters.',
            ]);

        if ($validator->passes()) {
            session(['user-fullname' => request('new-name')]);
            session(['user-alias' => request('new-username')]);
            session(['user-city' => request('loc-city')]);
            session(['user-country' => request('loc-country')]);
            session(['user-cny-code' => request('loc-code')]);

        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function doRegister(Request $request){

        $validator = Validator::make($request->all(),

            [
                'text-password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
                'text-bday' => 'required|date_format:Y-n-j',

            ],
            [
                'text-password.required' => 'Password field is required.',
                'text-password.min' => 'Password must be atleast 8 characters.',
                'text-password.regex' => 'Password must contain lowercase, uppercase, numbers and special characters.',
                'text-bday.required' => 'Invalid Birth Date.',
            ]);

        if ($validator->passes()) {

            $user = new User();
            $user->name = session('user-fullname');
            $user->username = session('user-alias');
            $user->email = session('user-email');
            $user->loc_city = session('user-city');
            $user->loc_country = session('user-country');
            $user->loc_cny_code = session('user-cny-code');
            $user->occupation = request('text-occupation');
            $user->gender = request('sel-gender');
            $user->password = Hash::make(request('text-password'));
            $user->save();

//            $user = User::create([
//                'name' => session('user-fullname'),
//                'username' => session('user-alias'),
//                'email' => session('user-email'),
//                'loc_city' => session('user-city'),
//                'loc_country' => session('user-country'),
//                'loc_cny_code' => session('user-cny-code'),
//                'occupation' => request('text-occupation'),
//                'gender' => request('sel-gender'),
//                'password' => Hash::make(request('text-password')),
//            ]);
            Auth::login($user);
            //return redirect()->route('userProfile');
            return response()->json(['success'=>session('user-cny-code')]);

        }
        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function getCountries($code){
        $countries = \App\Country::where('cny_name', 'LIKE', '%'.$code.'%')->get();
        return view('divlayouts/displayCountries', compact('countries'));

    }
    public function getCities($city, $code){
        $cities = \App\City::where('city_name', 'LIKE', '%'.$city.'%')->where('cny_code', $code)->get();
        return view('divlayouts/displayCities', compact('cities'));

    }

}
