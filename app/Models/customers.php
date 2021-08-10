<?php

namespace App\Models;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class customers extends Model
{
    use HasFactory;
    public static function getAll()
    {
        return  DB::table('customers')->get();
    }
    public static function createCus(Request $req)
    {
        if (!empty($req->avatar)) {
            $file = $req->avatar;
            $filename = time() . "." . $file->getClientOriginalExtension();
            $file->storeAs('public', $filename);
            $path = "storage/" . $filename;
        } else {
            $path = '';
        }

        try {
            DB::insert('insert into customers (id, name, phoneNum, email, gender, img) values (?, ?, ?, ?, ?, ?)', [null, $req->name, $req->phoneNum, $req->email, $req->gender, $path]);
        } catch (Exception $err) {
            Session::put('err', $err->getMessage());
            return false;
        }
        return true;
    }

    public static function search(Request $req)
    {
        return DB::table('customers')->where('name', 'LIKE', '%' . $req->search . '%')->orWhere('phoneNum', 'LIKE', '%' . $req->search . '%')->get();
    }
}
