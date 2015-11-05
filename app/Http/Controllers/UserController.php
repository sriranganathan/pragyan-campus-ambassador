<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk as Facebook;

use App\User as User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Facebook $fb)
    {
        //
        $login_url = $fb->getLoginUrl(['email']);

        return view('index', array('login_url' => $login_url));

        echo '<a href="' . $login_url . '">Login with Facebook</a>';

    }

    public function fbcallback(Facebook $fb)
    {
        try {
        $token = $fb
            ->getRedirectLoginHelper()
            ->getAccessToken();
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // Failed to obtain access token
            dd($e->getMessage());
        }

        if (! $token) {
            // User denied the request
        }
        try {
      // Returns a `Facebook\FacebookResponse` object
          $response = $fb->get('/me?fields=id,name,email', $token);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }

        $user = $response->getGraphUser();
        $fbid = $user['id'];
        $name = $user['name'];
        $email = $user['email'];

        $UserDetails = new User();
        $UserDetails->facebook_user_id = $fbid;
        $UserDetails->full_name = $name;
        $UserDetails->email = $email;
        $UserDetails->save();

        Session::put('fbid', $fbid);
        Session::put('fbname', $name);

        return redirect('register');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $fbid = Session::get('fbid');
        $fbname = Session::get('fbname');

        return view('registration', array('fbname'=>$fbname));

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
        $college = $request->get('college');
        $city = $request->get('city');
        $dept = $request->get('dept');
        $year = $request->get('year');
        $mobile = $request->get('mobile');
        $por = $request->get('por');
        $question = $request->get('question');

        $fbid = Session::get('fbid');

        User::where('facebook_user_id', $fbid)
                ->update(array(
                        "college" => $college,
                        "city" => $city,
                        "dept" => $dept,
                        "year" => $year,
                        "mobile" => $mobile,
                        "por" => $por,
                        "question" => $question
                    ));

        return 'Successfully registered';
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
