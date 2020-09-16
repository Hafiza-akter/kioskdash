<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Role;
use App\Model\FfwcStation;
use App\Model\UserStation;
use App\Model\SlideDetail;
use App\Model\Location;
use App\Model\SlideStatus;
use Hash;


class UserController extends Controller
{
    
    public function index()
    {
        $is_active = 'userlist';
        $userList = User::orderBy('id', 'DESC')->paginate(5);
        return view('admin/user/list', compact('userList','is_active'));
    }

   
    public function create()
    {
        $is_active = 'useradd';
        $roles = Role::all();
        $locations = Location::select('district_name', 'id')->groupBy('district_name')->get();
        // dd($locations);
        $ffwcStations = FfwcStation::all();
        $slideDetails = SlideDetail::all();
        return view('admin/user/create', compact('roles', 'locations', 'ffwcStations', 'slideDetails','is_active'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $validateData = $request->validate([
            'role_id' => 'required',
            // 'district' => 'required',
            // 'email' => 'required',
            'email' => 'required|unique:user,username',
            // 'ffwc_sations' => 'required',
            // 'zoom_level' => 'required',
            'password' => 'required',
            'user_loc_level' => 'required_if:role_id,2',
            'district' => 'required_if:user_loc_level,district,upazila,union',
            'upazila' => 'required_if:user_loc_level,upazila,union',
            'union' => 'required_if:user_loc_level,union',


        ]);
        $user = new User();
        $user->username = $request->input('email');
        $password = $request->input('password');
        $user->secret = Hash::make($password);
        $user->user_loc_level = $request->input('user_loc_level');
        $user->role_id = $request->input('role_id');
        if ($user->user_loc_level == 'district') {
            $user->location_id = $request->input('district');
        } elseif ($user->user_loc_level == 'upazila') {
            $user->location_id = $request->input('upazila');
        } elseif ($user->user_loc_level == 'union') {
            $user->location_id = $request->input('union');
        }
        $user->zoom_level = $request->input('zoom_level');
        $user->save();
        $userId = $user->id;
        if ($request->input('ffwc_sations')) {
            $ffwc_sations = $request->input('ffwc_sations');
            foreach ($ffwc_sations as $ffwc_sation) {
                $userStation = new UserStation();
                $userStation->user_id = $userId;
                $userStation->ffwc_stations_id = $ffwc_sation;
                $userStation->save();
            }
        }

        $slides = $request->input('slide');
        if ($slides) {
            $n = (count($slides));
            // dd($n);
            $slideName = null;
            for ($j = 0; $j < $n; $j++) {
                $slideName = (($slideName) ? $slideName . "," : '') . $slides[$j];
            }
            $slideStatus = new SlideStatus();
            $slideStatus->slide_status = $slideName;
            $slideStatus->slide_order = $slideName;
            $slideStatus->user_id  = $userId;
            $slideStatus->save();
        }

        return redirect()->route('userlist')->with('message', 'User Created Successfully!');
    }

 
    public function edit($id)
    {
        
        $is_active = 'user';
        $roles = Role::all();
        $districts = Location::select('district_name', 'id')->groupBy('district_name')->get();
        $ffwcStations = FfwcStation::all();
        $slideDetails = SlideDetail::all();
        $userStations = UserStation::where('user_id', $id)->pluck('ffwc_stations_id')->toArray();
        $slideStatus = SlideStatus::where('user_id', $id)->first();
        if ($slideStatus) {
            $slide_num = explode(",", $slideStatus->slide_order);
        } else {
            $slide_num = 0;
        }
        $user = User::Where('id', $id)->first();
        $upazilas = $unions = null;
        if ($user->getUserRole->name == 'local') {
            $upazilas = Location::select('upazila_name', 'id')->Where('district_name', $user->getUserLocation->district_name)->groupBy('upazila_name')->get();
            $unions = Location::select('union_name', 'id')
                ->Where('district_name', $user->getUserLocation->district_name)
                ->Where('upazila_name', $user->getUserLocation->upazila_name)
                ->get();
        }
        return view('admin/user/edit', compact('user', 'roles', 'districts', 'upazilas', 'unions', 'ffwcStations', 'userStations', 'slideDetails', 'slide_num','is_active'));
    }

   
    public function update(Request $request)
    {
        // dd($request);
        // dd('ghvgh');

        $id = $request->input('id');
        $user =  User::where('id', $id)->first();
        // dd($request);
        $validateData = $request->validate([

            // 'role_id' => 'required',
            // 'location_id' => 'required',
            'email' => 'required|email|unique:user,username,' . $user->id,

            // 'ffwc_sations' => 'required',
            // 'zoom_level' => 'required',
            'user_loc_level' => 'required_if:user_role,2',
            'district' => 'required_if:user_loc_level,district,upazila,union',
            'upazila' => 'required_if:user_loc_level,upazila,union',
            'union' => 'required_if:user_loc_level,union',
        ]);
        $user->username = $request->input('email');
        if($request->input('password')){
            $password = $request->input('password');
            $user->secret = Hash::make($password);
        }
        $user->user_loc_level = $request->input('user_loc_level');
        if ($user->user_loc_level == 'district') {
            $user->location_id = $request->input('district');
        } elseif ($user->user_loc_level == 'upazila') {
            $user->location_id = $request->input('upazila');
        } elseif ($user->user_loc_level == 'union') {
            $user->location_id = $request->input('union');
        }
        $user->role_id = $request->input('user_role');
        // $user->location_id = $request->input('district');
        $user->zoom_level = $request->input('zoom_level');
        $user->save();
        if ($request->input('ffwc_sations')) {
            $ffwc_sations = $request->input('ffwc_sations');
            $userStation = UserStation::where('user_id', $id)->delete();
            foreach ($ffwc_sations as $ffwc_sation) {
                $userStation = new UserStation();
                $userStation->user_id = $id;
                $userStation->ffwc_stations_id = $ffwc_sation;
                $userStation->save();
            }
        }

        $slides = $request->input('slide');
        if ($slides) {
            $n = (count($slides));
            // dd($n);
            $slideName = null;
            for ($j = 0; $j < $n; $j++) {
                $slideName = (($slideName) ? $slideName . "," : '') . $slides[$j];
            }
            $slideStatus = SlideStatus::where('user_id', $id)->delete();
            $slideStatus = new SlideStatus();
            $slideStatus->slide_status = $slideName;
            $slideStatus->slide_order = $slideName;
            $slideStatus->user_id  = $id;
            $slideStatus->save();
        } else {
            $slideStatus = SlideStatus::where('user_id', $id)->delete();
        }


        return redirect()->route('userlist')->with('message', 'User Updated Successfully!');
    }

}
