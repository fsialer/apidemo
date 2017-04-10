<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users=User::all()->toArray();
        $users=User::all();
        return \Response::Json(['status' => 'success',
                            'error'   => false,
                            'data'    => $users]);
        //return Response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user=new User($request->all());
        $user->password=\Hash::make($user->password);
        $user->save();
       /* $image=new Image();
        $image->name=$request->image;
        $user->image()->associate($image);       
        $image->save();*/
        return \Response::Json(['status' => 'success',
                            'error'   => false,
                            'data'    => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $user=User::find($id);
        return \Response::Json(['status' => 'success',
                            'error'   => false,
                            'data'    => $user]);
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
        $user=User::find($id);
        $user->fill($request->all());
        $user->save();
        return \Response::Json(['status' => 'success',
                            'error'   => false,
                            'data'    => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return \Response::Json(['status' => 'success',
                            'error'   => false,
                            'data'    => $user]);
    }
}
