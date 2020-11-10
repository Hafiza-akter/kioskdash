<?php

namespace App\Http\Controllers;
use  App\Http\Classes\BanglaDate;

use Illuminate\Http\Request;
use App\Model\Location;
use App\Model\FfwcStation;
use App\Model\User;

use \Firebase\JWT\JWT;
use Hash;

class DashboardController extends Controller
{

    public function index(Request $request){
        $token = $request->token;
        $secretKey = env('SECRET_KEY');

        $decoded = JWT::decode($token, $secretKey, array('HS256'));
        $decoded_array = (array)$decoded;
        $userID = $decoded_array['user'];

        $userData = User::where('id', $userID)
                    ->first();

        // getSlider
        $sliderData = $userData->getSlider();
        
        // date 
        $bn_date = new BanglaDate( strtotime(date('d-m-Y')) );
        $date = $bn_date->get_date();
        $station = FfwcStation::all()->toJson();
        

        return view('dashboard.index')->with('banglaDate',$date)
                                    ->with('user',$userData)
                                    ->with('station',$station)
                                    ->with('slider',$sliderData);
    }

    public function onLogin(Request $request){

        $email = $request->input('email');
        $password = $request->input('password');

        if($email && $password){
            $user = User::where('username', $email)
                        ->where('role_id', 2)
                        ->first();
    
            if($user && Hash::check($password,$user->secret)){
                $secretKey = env('SECRET_KEY');
                $payload = array(
                    "user" =>$user->id,
                    "iat" => time(),
                    "exp" => time()+(3600*8)
                );
    
                $jwt = JWT::encode($payload, $secretKey);
                return response()->json(['status' => 1, 'statusCode' => 'S100', 'statusDetail' => 'login success', 'token' => $jwt]);
            }else{
                return response()->json(['status' => 0, 'statusCode' => 'E102', 'statusDetail' => 'invalid user']);
            }
        }else{
            return response()->json(['status' => 0, 'statusCode' => 'E101', 'statusDetail' => 'parameter missing']);
        }
    }

}
