<?php

namespace App\Http\Controllers;

use App\Thoughts;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;

class ThoughtsController extends Controller
{

    protected $user;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
//        ->where('created_at', '>=', Carbon::now()->startOfMonth())
        $lastMonthThoughts = $user->thoughts()
            ->get(['description', 'created_at'])
            ->where('created_at', '<=', Carbon::now()->startOfMonth());
        return response()->json($lastMonthThoughts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Request $request)
    {
        $thought = new Thoughts();
        $newUser = $request->all();
        $newUser['user_id'] = $user->getKey('id');

        unset($newUser['_token']);

        if($thought->create($newUser)) {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Thoughts $thought)
    {
        return response()->json($thought->where('user_id', $user->get(['id'])));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\User $user)
    {
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\User $user)
    {
        return 'update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\User $user, Thoughts $thought)
    {
        $isDeleted = $thought->delete();
        return response()->json(compact('isDeleted'));
    }
}
