<?php

namespace App\Http\Controllers;

use App\Models\Printproduksi;
use App\Models\Produksi;
use App\Models\Gudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

//use App\Models\Printproduksi;

class ProduksiController extends Controller
{
    public function index()
    {
        if(!LoginController::is_login_produksi())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        $produksis = produksi::oldest()->get();
        return view("produksi.index", compact("produksis"))
            ->with("i", (request()->input("page", 1) - 1) * 5);
    }

    public function create(Gudang $gudang_var)
    {
        if(!LoginController::is_login_produksi())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        $gudangs = Gudang::oldest()->get();
        $arrayNamaBarang = array();
        foreach ($gudangs as $ga){
            array_push($arrayNamaBarang, $ga->namabarang);
        }
        $arrayNamaBarang = array_unique($arrayNamaBarang);
        return view("produksi.create", compact("gudangs","arrayNamaBarang"));
    }

    public function store(Request $request)
    {
        if(!LoginController::is_login_produksi())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        $request->validate([
            "namabarang" => "required",
            "spesifikasi" => "required",
            "quantity" => "required",
            "untukmesin" => "required",
            "keterangan" => "required",
            "tanggalpengajuan" => "required",
            "status" => "required",
        ]);

        produksi::create($request->all());

        return redirect()->route("produksi.index")
            ->with("success", "Produksi created successfully");
    }

    public function show(Produksi $produksi)
    {
        if(!LoginController::is_login_produksi())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        return redirect()->route("produksi.index")
            ->with("success", "Send successfully");

//        return view("produksi.show", compact("produksi"))
//            ->with("success", "Send successfully");
    }

    public function edit(Produksi $produksi)
    {
        if(!LoginController::is_login_produksi())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        return view("produksi.edit", compact("produksi"));
    }

    public function update(Request $request, Produksi $produksi)
    {
        if(!LoginController::is_login_produksi())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        $request->validate([
        ]);

        $produksi->update($request->all());
        return redirect()->route("produksi.index")
            ->with("success", "Produksi updated successfully");
    }

    public function destroy(Produksi $produksi)
    {
        if(!LoginController::is_login_produksi())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        $produksi->delete();
        return redirect()->route("produksi.index")
            ->with("success", "Produksi deleted successfully");
    }
    public function login(Login $login)
    {
        if(!LoginController::is_login_produksi())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        return view("login.index");
    }
    public function Printproduksi(Produksi $produksi)
    {
        if(!LoginController::is_login_produksi())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        $produksi = Printproduksi::oldest()->get();
        return view("produksi.Printproduksi", compact("produksi"));
    }
}
