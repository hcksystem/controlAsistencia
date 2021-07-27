<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;
use Session;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_user = User::count();
        $count_jefes = User::leftjoin('role_user','users.id','role_user.user_id')
                        ->leftjoin('roles','role_user.role_id','roles.id')
                        ->where('roles.id',3)
                        ->count();
        $users = User::all();
        $groups = Group::where('id_group_parent',0)->get();
        $subgroups = Group::all();
        $jefes = User::leftjoin('role_user','users.id','role_user.user_id')
        ->leftjoin('roles','role_user.role_id','roles.id')
        ->where('roles.id',3)
        ->get();
        return view('pages.group.index',compact('count_user','count_jefes','jefes','users','groups','subgroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();         
        Group::create($data);
        return response()->json(['message'=>'Grupo registrado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        return response()->json($group);
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
        $group = Group::find($id);
        $group->update($request->all());
        $group->save();
        Session::flash('message-success',' Grupo '. $request->group.' editada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parent = Group::where('id_group_parent',$id)->get()->count();
        if($parent > 0){
            return response()->json($parent);
        }else{
            $group = Group::find($id);
            $group->delete();
            return response()->json($parent);
        }
        
    }

    public function searchJefes($id)
    {
        $jefes = User::leftjoin('role_user','users.id','role_user.user_id')
        ->leftjoin('roles','role_user.role_id','roles.id')
        ->leftjoin('users_groups','users.id','users_groups.id_user')
        ->leftjoin('groups','users_groups.id','groups.id')
        ->where('roles.id',3)
        ->where('groups.id',$id)
        ->get();
        return response()->json($jefes);
    }

    public function searchUsers($id)
    {
        $users = User::leftjoin('users_groups','users.id','users_groups.id_user')
        ->leftjoin('groups','users_groups.id','groups.id')
        ->where('groups.id',$id)
        ->get();
        return response()->json($users);
    }

}
