<?php

namespace App\Http\Controllers;

use App\Models\customers as ModelsCustomers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class customers extends Controller
{
    public function index(Request $re)
    {
        if ($re->search == '') {
            return view('pages.home')->with('data', ModelsCustomers::getAll());
        } else {
            $data = ModelsCustomers::search($re);
            return view('pages.home')->with('data', $data);
        }
    }



    public function create()
    {
        return view('pages.create');
    }
    public function createCus(Request $req)
    {
        $rs = ModelsCustomers::createCus($req);
        return $rs ? redirect('/customers')->with('mess', 'Thêm mới thành công.') : view('pages.create')->with('mess', Session::get('err'));
    }
}
