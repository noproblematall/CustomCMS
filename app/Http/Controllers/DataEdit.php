<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MengisiProfil;
use App\Models\PakanTernak;
use App\Models\TableIsian;
use App\Models\EditEvent;
use App\Models\EventHistory;
use App\Models\Role;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;

class DataEdit extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $isian = TableIsian::where('user_id',$user_id)->first();
        $mengisi = MengisiProfil::where('user_id',$user_id)->first();
        $pakan = PakanTernak::where('user_id',$user_id)->first();
        return view('inputdata',compact('isian','mengisi','pakan'));
    }

    public function user_inputdata()
    {
        $user_id = Auth::user()->parent_id;
        $isian = TableIsian::where('user_id',$user_id)->first();
        $mengisi = MengisiProfil::where('user_id',$user_id)->first();
        $pakan = PakanTernak::where('user_id',$user_id)->first();
        return view('userinput',compact('isian','mengisi','pakan'));
    }

    public function search()
    {
        $tables = $this->showTables();
        $admins = Role::where('name', 'Admin')->first()->users;
        return view('search',compact('admins','tables'));
    }

    public function user_datasearch()
    {
        $tables = $this->showTables();
        return view('user_data_search',compact('tables'));
    }

    public function admin_search(Request $request)
    {
        $tables = $this->showTables();
        $user_id = $request->get('admin_id');
        $admins = Role::where('name', 'Admin')->first()->users;
        $isian = TableIsian::where('user_id',$user_id)->first();
        $mengisi = MengisiProfil::where('user_id',$user_id)->first();
        $pakan = PakanTernak::where('user_id',$user_id)->first();
        return view('search',compact('isian','mengisi','pakan','admins','user_id','tables'));
    }

    public function core_search(Request $request)
    {
        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role_id;
        if($user_role == 1){
            $table = $request->get('table');
            $column_name = $request->get('column');
            $keyword = $request->get('keyword');
            $result = DB::table($table)->join('users',$table.'.user_id','=','users.id')->where($column_name,'like','%'.$keyword.'%')->select('users.name',$table.'.*')->get()->toArray();
            return response()->json($result);
        }else{
            if($user_role == 2){
                $table = $request->get('table');
                $column_name = $request->get('column');
                $keyword = $request->get('keyword');
                $result = DB::table($table)->where('user_id',$user_id)->where($column_name,'like','%'.$keyword.'%')->get()->toArray();
                return response()->json($result);
            }else{
                $table = $request->get('table');
                $column_name = $request->get('column');
                $keyword = $request->get('keyword');
                $user_id = Auth::user()->parent_id;
                $result = DB::table($table)->where('user_id',$user_id)->where($column_name,'like','%'.$keyword.'%')->get()->toArray();
                return response()->json($result);
            }
            
        }
        
    }

    public function containsOnlyNull($input)
    {
        return empty(array_filter($input, function ($a) { return $a !== null;}));
    }

    public function isian_edit(Request $request)
    {
        $table_name = 'TABEL ISIAN';
        $flag = false;
        $data = $request->all();
        if(!$request->has('user_id')){
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->name;
            unset($data['_token']);
            $flag = $this->containsOnlyNull($data);
            $data['user_id'] = $user_id;           
        }else{
            $user_id = $data['user_id'];
            $user_name = Auth::user()->name;
            unset($data['_token']);
            unset($data['user_id']);
            $flag = $this->containsOnlyNull($data);
            $data['user_id'] = $user_id;  
        }
        $isisan = TableIsian::where('user_id',$user_id)->first();        
        if($isisan){
            $database_data = $isisan->toArray();            
        }
        if($flag){
            if($isisan){
                unset($database_data['id'],$database_data['user_id'],$database_data['created_at'],$database_data['updated_at']);
                if(!$this->containsOnlyNull($database_data)){
                    $isisan->update($data);
                    
                }
            }
        }else{
            if($isisan){
                unset($database_data['id'],$database_data['created_at'],$database_data['updated_at']);
                $diff = count(array_diff_assoc($data,$database_data));                
                    if($diff > 0){
                        $isisan->update($data);
                        // $event = EditEvent::where('id',3)->first();
                        // $event_name = $event->event_name;
                        // $event_type = $event->event_type;
                        // $event_name = str_replace('uuu',$user_name,$event_name);
                        // $event_name = str_replace('ttt',$table_name,$event_name);
                        // EventHistory::create([
                        //     'user_id' => $user_id,
                        //     'history_name' => $event_name,
                        //     'history_type' => $event_type
                        // ]);
                        // return $event_name;
                    }
                
            }else{
                TableIsian::create($data);
                // $event = EditEvent::where('id',2)->first();
                // $event_name = $event->event_name;
                // $event_type = $event->event_type;
                // $event_name = str_replace('uuu',$user_name,$event_name);
                // $event_name = str_replace('ttt',$table_name,$event_name);
                // EventHistory::create([
                //     'user_id' => $user_id,
                //     'history_name' => $event_name,
                //     'history_type' => $event_type
                // ]);
                // return $event_name;
            }
        }        
        
    }

    public function mengisi_edit(Request $request)
    {
        $table_name = 'SUMBER DATA UNTUK MENGISI PROFIL KELURAHAN';
        $flag = false;
        $data = $request->all();
        if(!$request->has('user_id')){
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->name;
            unset($data['_token']);
            $flag = $this->containsOnlyNull($data);
            $data['user_id'] = $user_id;
        }else{
            $user_id = $data['user_id'];
            $user_name = Auth::user()->name;
            unset($data['_token']);
            unset($data['user_id']);
            $flag = $this->containsOnlyNull($data);
            $data['user_id'] = $user_id;  
        }
        $isisan = MengisiProfil::where('user_id',$user_id)->first();
        if($isisan){
            $database_data = $isisan->toArray();            
        }

        if($flag){
            if($isisan){
                unset($database_data['id'],$database_data['user_id'],$database_data['created_at'],$database_data['updated_at']);
                if(!$this->containsOnlyNull($database_data)){
                    $isisan->update($data);
                    // $event = EditEvent::where('id',4)->first();
                    // $event_name = $event->event_name;
                    // $event_type = $event->event_type;
                    // $event_name = EditEvent::where('id',4)->first()->event_name;
                    // $event_name = str_replace('uuu',$user_name,$event_name);
                    // $event_name = str_replace('ttt',$table_name,$event_name);
                    // EventHistory::create([
                    //     'user_id' => $user_id,
                    //     'history_name' => $event_name,
                    //     'history_type' => $event_type
                    // ]);
                    // return $event_name;
                }
            }
        }else{
            if($isisan){
                unset($database_data['id'],$database_data['created_at'],$database_data['updated_at']);
                $diff = count(array_diff_assoc($data,$database_data)); 
                    if($diff > 0){
                        $isisan->update($data);
                        // $event = EditEvent::where('id',3)->first();
                        // $event_name = $event->event_name;
                        // $event_type = $event->event_type;
                        // $event_name = str_replace('uuu',$user_name,$event_name);
                        // $event_name = str_replace('ttt',$table_name,$event_name);
                        // EventHistory::create([
                        //     'user_id' => $user_id,
                        //     'history_name' => $event_name,
                        //     'history_type' => $event_type
                        // ]);
                        // return $event_name;
                    }

            }else{
                MengisiProfil::create($data);
                // $event = EditEvent::where('id',2)->first();
                // $event_name = $event->event_name;
                // $event_type = $event->event_type;
                // $event_name = str_replace('uuu',$user_name,$event_name);
                // $event_name = str_replace('ttt',$table_name,$event_name);
                // EventHistory::create([
                //     'user_id' => $user_id,
                //     'history_name' => $event_name,
                //     'history_type' => $event_type
                // ]);
                // return $event_name;
            }
        }        
    }

    public function pakan_edit(Request $request)
    {
        $table_name = 'KETERSEDIAAN HIJAUAN PAKAN TERNAK';
        $flag = false;
        $data = $request->all();
        if(!$request->has('user_id')){
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->name;
            unset($data['_token']);
            $flag = $this->containsOnlyNull($data);
            $data['user_id'] = $user_id;    
        }else{
            $user_id = $data['user_id'];
            $user_name = Auth::user()->name;
            unset($data['_token']);
            unset($data['user_id']);
            $flag = $this->containsOnlyNull($data);
            $data['user_id'] = $user_id;  
        }
        $isisan = PakanTernak::where('user_id',$user_id)->first();
        if($isisan){
            $database_data = $isisan->toArray();            
        }
        
        if($flag){
            if($isisan){
                unset($database_data['id'],$database_data['user_id'],$database_data['created_at'],$database_data['updated_at']);
                if(!$this->containsOnlyNull($database_data)){
                    
                    $isisan->update($data);
                    // $event = EditEvent::where('id',4)->first();
                    // $event_name = $event->event_name;
                    // $event_type = $event->event_type;
                    // $event_name = str_replace('uuu',$user_name,$event_name);
                    // $event_name = str_replace('ttt',$table_name,$event_name);
                    // EventHistory::create([
                    //     'user_id' => $user_id,
                    //     'history_name' => $event_name,
                    //     'history_type' => $event_type
                    // ]);
                    // return $event_name;
                }
            }
        }else{
            if($isisan){
                unset($database_data['id'],$database_data['created_at'],$database_data['updated_at']);
                $diff = count(array_diff_assoc($data,$database_data));
 
                    if($diff > 0){
                        $isisan->update($data);
                        // $event = EditEvent::where('id',3)->first();
                        // $event_name = $event->event_name;
                        // $event_type = $event->event_type;
                        // $event_name = str_replace('uuu',$user_name,$event_name);
                        // $event_name = str_replace('ttt',$table_name,$event_name);
                        // EventHistory::create([
                        //     'user_id' => $user_id,
                        //     'history_name' => $event_name,
                        //     'history_type' => $event_type
                        // ]);
                        // return $event_name;
                    }

            }else{
                PakanTernak::create($data);
                // $event = EditEvent::where('id',2)->first();
                // $event_name = $event->event_name;
                // $event_type = $event->event_type;
                // $event_name = str_replace('uuu',$user_name,$event_name);
                // $event_name = str_replace('ttt',$table_name,$event_name);
                // EventHistory::create([
                //     'user_id' => $user_id,
                //     'history_name' => $event_name,
                //     'history_type' => $event_type
                // ]);
                // return $event_name;
            }
        }        
        
    }

    public function isian_single_edit(Request $request)
    {
        $table_name = 'TABEL ISIAN';
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        if($request->ajax()){
            $column_name = $request->get('single_name');
            $value = $request->get('single_value');
            $exist = DB::table('table_isians')->where('user_id',$user_id)->count();
            if($exist > 0){
                $database_value = DB::table('table_isians')->where('user_id',$user_id)->first()->$column_name;
                if(empty($value)){
                    if(!empty($database_value)){
                        DB::table('table_isians')
                        ->where('user_id', $user_id)
                        ->update([$column_name => $value]);
                        $event = EditEvent::where('id',4)->first();
                        $event_name = $event->event_name;
                        $event_type = $event->event_type;
                        $event_name = str_replace('uuu',$user_name,$event_name);
                        $event_name = str_replace('ttt',$table_name,$event_name);
                        $event_name = str_replace('ccc',$column_name,$event_name);
                        EventHistory::create([
                            'user_id' => $user_id,
                            'history_name' => $event_name,
                            'history_type' => $event_type
                        ]);
                    }
                }else{
                    if($value != $database_value){
                        DB::table('table_isians')
                        ->where('user_id', $user_id)
                        ->update([$column_name => $value]);
                        $event = EditEvent::where('id',3)->first();
                        $event_name = $event->event_name;
                        $event_type = $event->event_type;
                        $event_name = str_replace('uuu',$user_name,$event_name);
                        $event_name = str_replace('ttt',$table_name,$event_name);
                        $event_name = str_replace('ccc',$column_name,$event_name);
                        EventHistory::create([
                            'user_id' => $user_id,
                            'history_name' => $event_name,
                            'history_type' => $event_type
                        ]);
                    }
                    
                }

            }else if($exist == 0 && !empty($value)){
                DB::table('table_isians')->insert(
                    ['user_id' => $user_id, $column_name => $value]
                );
                $event = EditEvent::where('id',2)->first();
                $event_name = $event->event_name;
                $event_type = $event->event_type;
                $event_name = str_replace('uuu',$user_name,$event_name);
                $event_name = str_replace('ttt',$table_name,$event_name);
                EventHistory::create([
                    'user_id' => $user_id,
                    'history_name' => $event_name,
                    'history_type' => $event_type
                ]);

            }
            // return 'ok';
        }else{
            return redirect('/');
        }
        
    }

    public function mengisi_single_edit(Request $request)
    {
        $table_name = 'SUMBER DATA UNTUK MENGISI PROFIL KELURAHAN';
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        if($request->ajax()){
            $column_name = $request->get('single_name');
            $value = $request->get('single_value');            
            $exist = DB::table('mengisi_profils')->where('user_id',$user_id)->count();
            if($exist > 0){
                $database_value = DB::table('mengisi_profils')->where('user_id',$user_id)->first()->$column_name;
                if(empty($value)){
                    if(!empty($database_value)){
                        DB::table('mengisi_profils')
                        ->where('user_id', $user_id)
                        ->update([$column_name => $value]);
                        $event = EditEvent::where('id',4)->first();
                        $event_name = $event->event_name;
                        $event_type = $event->event_type;
                        $event_name = str_replace('uuu',$user_name,$event_name);
                        $event_name = str_replace('ttt',$table_name,$event_name);
                        $event_name = str_replace('ccc',$column_name,$event_name);
                        EventHistory::create([
                            'user_id' => $user_id,
                            'history_name' => $event_name,
                            'history_type' => $event_type
                        ]);
                    }
                }else{
                    if($value != $database_value){
                        DB::table('mengisi_profils')
                        ->where('user_id', $user_id)
                        ->update([$column_name => $value]);
                        $event = EditEvent::where('id',3)->first();
                        $event_name = $event->event_name;
                        $event_type = $event->event_type;
                        $event_name = str_replace('uuu',$user_name,$event_name);
                        $event_name = str_replace('ttt',$table_name,$event_name);
                        $event_name = str_replace('ccc',$column_name,$event_name);
                        EventHistory::create([
                            'user_id' => $user_id,
                            'history_name' => $event_name,
                            'history_type' => $event_type
                        ]);
                    }
                    
                }

            }else if($exist == 0 && !empty($value)){
                DB::table('mengisi_profils')->insert(
                    ['user_id' => $user_id, $column_name => $value]
                );
                $event = EditEvent::where('id',2)->first();
                $event_name = $event->event_name;
                $event_type = $event->event_type;
                $event_name = str_replace('uuu',$user_name,$event_name);
                $event_name = str_replace('ttt',$table_name,$event_name);
                EventHistory::create([
                    'user_id' => $user_id,
                    'history_name' => $event_name,
                    'history_type' => $event_type
                ]);

            }
            // return 'ok';
        }else{
            return redirect('/');
        }
        
    }

    public function pakan_single_edit(Request $request)
    {
        $table_name = 'KETERSEDIAAN HIJAUAN PAKAN TERNAK';
        $user_name = Auth::user()->name;
        $user_id = Auth::user()->id;
        if($request->ajax()){
            $column_name = $request->get('single_name');
            $value = $request->get('single_value');
            $exist = DB::table('pakan_ternaks')->where('user_id',$user_id)->count();
            if($exist > 0){
                $database_value = DB::table('pakan_ternaks')->where('user_id',$user_id)->first()->$column_name;
                if(empty($value)){
                    if(!empty($database_value)){
                        DB::table('pakan_ternaks')
                        ->where('user_id', $user_id)
                        ->update([$column_name => $value]);
                        $event = EditEvent::where('id',4)->first();
                        $event_name = $event->event_name;
                        $event_type = $event->event_type;
                        $event_name = str_replace('uuu',$user_name,$event_name);
                        $event_name = str_replace('ttt',$table_name,$event_name);
                        $event_name = str_replace('ccc',$column_name,$event_name);
                        EventHistory::create([
                            'user_id' => $user_id,
                            'history_name' => $event_name,
                            'history_type' => $event_type
                        ]);
                    }
                }else{
                    if($value != $database_value){
                        DB::table('pakan_ternaks')
                        ->where('user_id', $user_id)
                        ->update([$column_name => $value]);
                        $event = EditEvent::where('id',3)->first();
                        $event_name = $event->event_name;
                        $event_type = $event->event_type;
                        $event_name = str_replace('uuu',$user_name,$event_name);
                        $event_name = str_replace('ttt',$table_name,$event_name);
                        $event_name = str_replace('ccc',$column_name,$event_name);
                        EventHistory::create([
                            'user_id' => $user_id,
                            'history_name' => $event_name,
                            'history_type' => $event_type
                        ]);
                    }
                    
                }

            }else if($exist == 0 && !empty($value)){
                DB::table('pakan_ternaks')->insert(
                    ['user_id' => $user_id, $column_name => $value]
                );
                $event = EditEvent::where('id',2)->first();
                $event_name = $event->event_name;
                $event_type = $event->event_type;
                $event_name = str_replace('uuu',$user_name,$event_name);
                $event_name = str_replace('ttt',$table_name,$event_name);
                EventHistory::create([
                    'user_id' => $user_id,
                    'history_name' => $event_name,
                    'history_type' => $event_type
                ]);

            }
            // return 'ok';
        }else{
            return redirect('/');
        }
        
    }

    public function showTables() {
        $db_tables = DB::select('SHOW TABLES');

        $tables = [];
        $i = 0;
        foreach($db_tables as $table) {
            $table = (array)$table;
            $table = $table['Tables_in_'.env('DB_DATABASE')];
            
            if($table != 'edit_events' && $table != 'event_histories' && $table != 'migrations' && $table != 'password_resets' && $table != 'roles' && $table != 'users') {
                    $tables[$i] = $table;
                    $i++;
            }
        }

        return $tables;
    }

    public function column_name(Request $request)
    {
        $table_name = $request->get('data');
        $columns = $this->get_table_columnName($table_name);
        // unset($columns[0]);
        return response()->json($columns);
    }

    private function get_table_columnName($table) {
        $columns = DB::table($table)->getConnection()
        ->getSchemaBuilder()
        ->getColumnListing($table);
        array_shift($columns);
        return $columns;
    }
}
