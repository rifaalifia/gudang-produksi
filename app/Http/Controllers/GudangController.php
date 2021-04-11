<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Printgudang;
use App\Models\Printbahan;
use Illuminate\Http\Request;
use App\Models\Produksi;

//use App\Models\ListBahanBaku;


class GudangController extends Controller
{
    public function index()
    {
        if(!LoginController::is_login_gudang())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        $gudangs = Gudang::oldest()->get();
        return view("gudang.index", compact("gudangs"))
            ->with("i", (request()->input("page", 1) - 1) * 5);
    }

    public function create()
    {
        if(!LoginController::is_login_gudang())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        return view("gudang.create");
    }

    public function listbahanbaku(Produksi $produksi)
    {
        if(!LoginController::is_login_gudang())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
//        $listbahanbakus = Produksi::oldest()->get();
        $listbahanbakus = Produksi::oldest()->get();
        return view("gudang.listbahanbaku", compact("listbahanbakus"))
            ->with("i", (request()->input("page", 1) - 1) * 5);
    }

    public function changestatus(Request $request, Produksi $produksi)
    {
        if(!LoginController::is_login_gudang())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        $prod = Produksi::find($request->get('id'));
        $matchThese = [
            'namabarang' => $prod->namabarang,
            'spesifikasi' => $prod->spesifikasi,
        ];
        $guds = Gudang::where($matchThese)->get();
        // 1. Kondisi dimana klik tombol submit Approve
        if ($request->get('status') == "approve") {
            foreach ($guds as $gud) {
                // 1.1 Kondisi dimana Stock di gudang mencukupi
                if ((int)$gud->jumlah >= (int)$prod->quantity) {
                    $gud->jumlah = (int)$gud->jumlah - (int)$prod->quantity;
                    $gud->jumlah = (string)$gud->jumlah;
                    $gud->save();
                    $prod->status = $request->get('status');
                    $prod->save();
                    return redirect()->route("gudang.listbahanbaku")
                        ->with("success", "List Bahan Baku Change Status successfully");
                }
                // 1.2 Kondisi dimana Stock di gudang tidak mencukupi
                else {
                    return redirect()->route("gudang.listbahanbaku")
                        ->with("unsuccess", "List Bahan Baku Change Status Unsuccessfully");
                }
            }
        }
        // 2. Kondisi dimana klik tombol submit Unapprove (salah klik))
        else{
            foreach ($guds as $gud) {
                $gud->jumlah = (int)$gud->jumlah + (int)$prod->quantity;
                $gud->jumlah = (string)$gud->jumlah;
                $gud->save();
            }
            $prod->status = $request->get('status');
            $prod->save();
            return redirect()->route("gudang.listbahanbaku")
                ->with("unsuccess", "List Bahan Baku Change Status Unsuccessfully");
        }
    }

    public function store(Request $request)
    {
        if(!LoginController::is_login_gudang())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        $request->validate([
            "namabarang" => "required",
            "spesifikasi" => "required",
            "jumlah" => "required",
            "satuan" => "required",
            "tanggalmasuk" => "required",
            "tanggalkeluar" => "required",
        ]);

        Gudang::create($request->all());

        return redirect()->route("gudang.index")
            ->with("success", "Gudang created successfully");
    }

    public function show(Gudang $gudang)
    {
//        if(!LoginController::is_login_gudang())
//            return redirect()->route("Login.index")
//                ->with("unlogin", "Please login!");
//        return view("gudang.show", compact("gudang"));
    }

    public function edit(Gudang $gudang)
    {
        if(!LoginController::is_login_gudang())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        return view("gudang.edit", compact("gudang"));
    }

    public function update(Request $request, Gudang $gudang)
    {
        if(!LoginController::is_login_gudang())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        $request->validate([]);

        $gudang->update($request->all());

        return redirect()->route("gudang.index")
            ->with("success", "Gudang updated successfully");
    }

    public function destroy(Gudang $Gudang)
    {
        if(!LoginController::is_login_gudang())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        $Gudang->delete();
        return redirect()->route("gudang.index")
            ->with("success", "Gudang deleted successfully");
    }

    public function Printgudang(Gudang $gudang)
    {
        if(!LoginController::is_login_gudang())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        $gudang = Printgudang::oldest()->get();
        return view("gudang.Printgudang", compact("gudang"));
    }

    public function Printbahan(Printbahan $printbahan)
    {
        if(!LoginController::is_login_gudang())
            return redirect()->route("Login.index")
                ->with("unlogin", "Please login!");
        $bahanbaku = Printbahan::oldest()->get();
        return view("gudang.Printbahan", compact("bahanbaku"));
    }


}
