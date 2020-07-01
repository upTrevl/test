<?php

namespace App\Http\Controllers\Api;

use App\Activity;
use App\Http\Controllers\Controller;
use App\Http\Resources\Activities;
use App\Http\Resources\Users;
use App\User;
use Illuminate\Http\Request;
use Validator;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return  Activities::collection(Activity::all());
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
     * @return Activities
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'city_id' => 'required',
            'date_start' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $activity = Activity::create($request);

        return new Activities($activity);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Activities
     */
    public function show($id)
    {
        return new Activities(Activity::find($id));
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
     * @return Activities
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'city_id' => 'required',
            'date_start' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $activity = Activity::find($id);

        $activity->update($request);

        return new Activities($activity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return bool
     */
    public function destroy($id)
    {
        Activity::find($id)->destroy();

        return true;
    }


    public function getUsers($id)
    {
        $users = Activity::find($id)->users;

        return Users::collection($users);
    }

    public function joinUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'activity_id' => 'required|exists:activities,id',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $activity = Activity::find($request->activity_id);

        $user = User::find($request->user_id);

        $activity->users()->attach($user);

        return new Activities($activity);
    }

    public function leaveUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'activity_id' => 'exists:App\Activity,id',
            'user_id' => 'exists:App\User,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $activity = Activity::find($request->activity_id);

        $user = User::find($request->user_id);

        $activity->users()->detach($user);

        return new Activities($activity);
    }

}
