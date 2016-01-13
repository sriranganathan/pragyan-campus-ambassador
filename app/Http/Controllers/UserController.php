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

    public function dashboard()
    {
        if(Session::has('admin'))
            return redirect('admin/dashboard');
        $fbid = Session::get('fbid');
        $user = User::where('facebook_user_id', $fbid)->first();
        return view('dashboard', compact('user'));
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
        if(isset($user['email']))
            $email = $user['email'];
        else
            $email = '';
        $checkUser = User::where('facebook_user_id', '=', $fbid);
        $cntUser = $checkUser->count();
        if($cntUser > 0)
        {
            if($checkUser->first()->registration == 0)
            {
                Session::put('fbid', $fbid);
                Session::put('fbname', $name);

                return redirect('register');
            }
            else
            {
                Session::put('fbid', $fbid);
                Session::put('fbname', $name);

                return redirect('dashboard');
            }
        }
        else
        {
            $UserDetails = new User();
            $UserDetails->facebook_user_id = $fbid;
            $UserDetails->full_name = $name;
            $UserDetails->email = $email;
            $UserDetails->save();

            Session::put('fbid', $fbid);
            Session::put('fbname', $name);

            return redirect('register');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Session::has('fbid'))
        {
            $fbid = Session::get('fbid');
            $fbname = Session::get('fbname');
            $checkUser = User::where('facebook_user_id', '=', $fbid);

            if($checkUser->first()->registration != 0)
            {
                return redirect('dashboard');
            }
            return view('registration', array('fbname'=>$fbname));
        }
        else
            return redirect('/');

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
        if(!Session::has('fbid'))
            return redirect('/');

        $college = $request->get('college');
        $city = $request->get('city');
        $dept = $request->get('dept');
        $year = $request->get('year');
        $mobile = $request->get('mobile');
        $email = $request->get('email');
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
                        "email" => $email,
                        "question" => $question,
                        "registration" => 1
                    ));

        return redirect('dashboard')->with('message', 'Successfully registered!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $users = User::orderBy("updated_at", "desc")->paginate(10);
	$users->setPath('users');
        return view('showall', compact('users'));

    }
    public function showNew()
    {
        //
        $users = User::where('approved', 0)->orderBy("updated_at", "desc")->paginate(10);
	$users->setPath('new');
        return view('showall', compact('users'));

    }
    public function showApproved()
    {
        //
        $users = User::where('approved', 1)->orderBy("updated_at", "desc")->paginate(10);
	$users->setPath('approved');
        return view('showall', compact('users'));

    }

    public function showRejected()
    {
        //
        $users = User::where('approved', 2)->orderBy("updated_at", "desc")->paginate(10);
	$users->setPath('rejected');
        return view('showall', compact('users'));

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        //
        User::where('id', $id)
            ->update(array(
                    "approved"=>1
                ));
        return redirect('users');
    }

    public function reject($id)
    {
        User::where('id', $id)
            ->update(array(
                    "approved"=>2
                ));

        return redirect('users');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function admin()
    {
        if(Session::has('admin'))
            return redirect('admin/dashboard');
        return view('admin/login');
    }

    public function adminCheck(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        if($username == env('ADMIN_USERNAME') && $password == env('ADMIN_PASSWORD'))
        {
            Session::put('admin', $username);
            return redirect('/admin/dashboard');
        }
        else
            return redirect('/admin')->with('message', 'Incorrect username or password');
    }

    public function adminDash()
    {
        return view('admin/dashboard');
    }
    public function logout()
    {
        Session::flush();
        return redirect('/')->with('message', 'Successfully logged out');
    }
    public function update(Request $request, $id)
    {
        //
    }


    public function generate()
    {
        $users = User::where('referral_code', '=', '')->get();
        $list = [];
        $codes = [];
        foreach($users as $user)
        {
            $flag = 1;
            while ($flag == 1)
            {
                $random = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
                $code = md5(uniqid($user->facebook_user_id.$random, true));
                $ref_code = substr($code, 0, 8);
                $flag = User::checkUnique($ref_code);
            }
            $user->referral_code = $ref_code;

            $user->save();
            array_push($list, $user->full_name);
            array_push($codes, $user->referral_code);

        }
        return view('admin/generate', array("users"=>$list, "codes"=>$codes));

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
