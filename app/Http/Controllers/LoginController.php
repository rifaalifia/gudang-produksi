<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(LoginController::is_login_gudang())
            return redirect()->route("gudang.index");
        if(LoginController::is_login_produksi())
            return redirect()->route("produksi.index");
        return view("login.index");
    }

    public static function is_login_gudang()
    {
        if (!is_null(Session::get('session_login')) && is_array(Session::get('session_login')) && Session::get('session_login')['status'] && Session::get('session_login')['kategori'] == "gudang") {
            return true;
        }
        return false;
    }

    public static function is_login_produksi()
    {
        if (!is_null(Session::get('session_login')) && is_array(Session::get('session_login')) && Session::get('session_login')['status'] && Session::get('session_login')['kategori'] == "produksi") {
            return true;
        }
        return false;
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        if(LoginController::is_login_gudang())
            return redirect()->route("gudang.index");
        if(LoginController::is_login_produksi())
            return redirect()->route("produksi.index");
        $request->validate([
            "email" => "required",
            "password" => "required",
            "kategori" => "required",
        ]);
        $matchThese = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'kategori' => $request->get('kategori'),
        ];
        $user_login = User::Where($matchThese)->get();
        $is_user_valid = count($user_login) > 0;
        if ($is_user_valid) {
            $session_login = array(
                "email" => $request->get('email'),
                "password" => $request->get('password'),
                "kategori" => $request->get('kategori'),
                "status" => true,
            );
            Session::put("session_login", $session_login);
            Session::save();
            if ($request->get('kategori') == "gudang") {
                return redirect()->route("gudang.index")
                    ->with("success", "Login Successfully");
            } elseif ($request->get('kategori') == "produksi") {
                return redirect()->route("produksi.index")
                    ->with("success", "Login Successfully");
            }
        } else {
            $session_login = array(
                "email" => $request->get('email'),
                "password" => $request->get('password'),
                "kategori" => $request->get('kategori'),
                "status" => False,
            );
            Session::put("session_login", $session_login);
            Session::save();
            return redirect()->route("Login.index")
                ->with("unsuccess", "Login Unsuccessfully");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function Logout()
    {
        Session::remove('session_login');
        Session::save();
        return redirect()->route("Login.index");
    }
}
