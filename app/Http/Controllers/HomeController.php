<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

use App\Models\MengisiProfil;
use App\Models\PakanTernak;
use App\Models\TableIsian;

use App\Models\EditEvent;
use App\Models\EventHistory;

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
    public function index()
    {

        $chart_end = Carbon::now();
        $chart_start = $chart_end->copy()->subDays(5);
        $period = CarbonPeriod::create($chart_start,$chart_end);
        $key_array = $isians_mount = $mengisi_mount = $pakan_mount = $admins = $users = array();
        foreach ($period as $date) {
            $key = $date->format('Y-m-d');
            $key_display = $date->format('d M Y');
            array_push($key_array, $key_display);
            $daily_isians = TableIsian::whereDate('created_at',$key)->sum('jabatan');
            $daily_mengisi = MengisiProfil::whereDate('created_at',$key)->sum('field4');
            $daily_pakan = PakanTernak::whereDate('created_at',$key)->sum('disubsidi_dinas');
            array_push($isians_mount,$daily_isians);
            array_push($mengisi_mount,$daily_mengisi);
            array_push($pakan_mount,$daily_pakan);

            $daily_admin = User::where('role_id', 2)->whereDate('created_at',$key)->count();
            $daily_user = User::where('role_id', 3)->whereDate('created_at',$key)->count();
            array_push($admins,$daily_admin);
            array_push($users,$daily_user);
        }

        return view('home',compact('admins','users','isians_mount','mengisi_mount','pakan_mount','key_array'));
    }

    public function setting()
    {
        $admins = Role::where('name', 'Admin')->first()->users;
        return view('setting', compact('admins'));
    }

    public function user_setting(Request $request)
    {
        $id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $cur_photo = Auth::user()->photo;
        $username = $request->get('username');
        $set_email = $request->get('email');
        $cur_password = $request->get('cur_password');
        $new_password = $request->get('password');
        
        if($cur_password){
            if(!Hash::check($cur_password, Auth::user()->password)){
                $errors = ['cur_password' => 'The password is incorrect.'];
                return back()->withErrors($errors);
            }else{
                if($request->hasfile('photo')){
                    $fileName = time() . '.' . request()->photo->getClientOriginalExtension();
                    request()->photo->move(public_path('images/avatars'),$fileName);
                    // $request->photo->storeAs('public/profile',$fileName);
                    $photo = 'images/avatars/' . $fileName;
                }else{
                    $photo = $cur_photo;
                }
                DB::table('users')
                ->where('id', $id)
                ->update([
                    'username' => $username,
                    'email' => $set_email,
                    'password' => Hash::make($new_password),
                    'photo' => $photo,
                ]);
                
                $event = EditEvent::where('id',1)->first();
                $event_name = $event->event_name;
                $event_type = $event->event_type;
                $event_name = str_replace('uuu',$user_name,$event_name);
                $event_name = str_replace('sss',$user_name,$event_name);
                EventHistory::create([
                    'user_id' => $id,
                    'history_name' => $event_name,
                    'history_type' => $event_type
                ]);

                return back()->with('success','The password was successfully changed.');
            }
        }else{
            if($request->hasfile('photo')){
                $fileName = time() . '.' . request()->photo->getClientOriginalExtension();
                request()->photo->move(public_path('images/avatars'),$fileName);
                // $request->photo->storeAs('public/profile',$fileName);
                $photo = 'images/avatars/' . $fileName;
            }else{
                $photo = $cur_photo;
            }
            DB::table('users')
            ->where('id', $id)
            ->update([
                'username' => $username,
                'email' => $set_email,
                'photo' => $photo,
            ]);
            return back();
        }
        
        
    }



    public function user()
    {
        // $role = Auth::user()->role->name;
        // if($role != "Super Admin") return back();
        $admins = Role::where('name', 'Admin')->first()->users;
        $user = new User();
        $users = $user->where('id', '!=',1)->get();
        return view('user', compact('users','admins'));
    }

    public function adduser(Request $request)
    {
        $name = $request->get('name');
        $user = new User();
        $exist = $user->where('name',$name)->first();
        if($exist !== null){
            return 0;
        }else{
            $photo = 'images/avatars/1.png';
            $username = $request->get('username');
            $role = $request->get('role');
            $password = $request->get('password');
            $email = $request->get('email');
            $admin = $request->get('admin');
            if($admin){
                User::create([
                    'name' => $name,
                    'username' => $username,
                    'email' => $email,
                    'role_id' => $role,
                    'parent_id' => $admin,
                    'photo' => $photo,
                    'password' => Hash::make($password)
                ]);
                return 1;
            }else{
                User::create([
                    'name' => $name,
                    'username' => $username,
                    'email' => $email,
                    'role_id' => $role,
                    'photo' => $photo,
                    'password' => Hash::make($password)
                ]);
                return 1;
            }
        }        
    }    

    public function useredit($id)
    {
        $user = User::find($id);
        $admins = Role::where('name', 'Admin')->first()->users;
        return view('user_edit',compact('user','admins'));
    }

    public function user_edit(Request $request)
    {
        $user_name = Auth::user()->name;
        $user_id = Auth::user()->id;
        $name = $request->get('name');
        $id = $request->get('id');
        $count = User::where('name',$name)->count();
        if($count > 0){
            $existUser = User::where('name',$name)->select('id')->first();
            if($existUser->id != $id){
                $errors = ['name' => 'The User ID has already been taken.'];
                return back()->withErrors($errors);
            }
        }
        $username = $request->get('username');
        $role = $request->get('role');
        $password = $request->get('password');
        $email = $request->get('email');
        $admin = $request->get('admin');
        DB::table('users')
        ->where('id', $id)
        ->update([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'role_id' => $role,
            'parent_id' => $admin,
            'password' => Hash::make($password)
        ]);

        $event = EditEvent::where('id',1)->first();
        $event_name = $event->event_name;
        $event_type = $event->event_type;
        $event_name = str_replace('uuu',$user_name,$event_name);
        $event_name = str_replace('sss',$name,$event_name);
        EventHistory::create([
            'user_id' => $user_id,
            'history_name' => $event_name,
            'history_type' => $event_type
        ]);

        return back()->with('success','The password was successfully changed.');
    }

    public function userdelete($id)
    {
        $exist = User::find($id)->my_users->count();
        if($exist > 0){
            $errors = ['exist' => 'You can\'t delete this "Admin". Because, this "Admin" has some "User". First, you have to delete the "User"'];
            return back()->withErrors($errors);
        }else{
            DB::table('users')->where('id',$id)->delete();
            return back();
        }
        
    }
}
