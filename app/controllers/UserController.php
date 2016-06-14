<?php

class UserController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct()
    {
        $this->beforeFilter(function() {
            // Auth Check
        });
    }

    public function showMissing()
    {
        return View::make('errors.missing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::check()) {
            return View::make('users.create');
        } else {
            return $this->showMissing();
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $user = User::validateAndCreate(Request::instance());

        return Redirect::action('HomeController@showDashboard', $project->id)->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $usder = User::find($id);
            return View::make('users.edit')->with('user', $user);
        } else {
            return $this->showMissing();
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $user = User::find($id);

        $user = User::validateAndUpdate($project, Request::instance(), User::first());

        return Redirect::action('HomeController@showDashboard', $project->id)->withInput();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $user  = User::find($id);
            $user->delete();

            Session::flash('successMessage', 'User has been deleted');
            return Redirect::action('HomeController@showHome', $project->id)->withInput();
        } else {
            return $this->showMissing();
        }
    }


}