<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hasil;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $pengguna = User::when($request->cari, function ($query) use ($request) {
            $query->where('name', 'LIKE', "%{$request->cari}%");
        })->paginate(25);

        $pengguna->appends($request->only('cari'));
        return view('admin/user', compact('pengguna'));
    }

    public function destroy($id)
    {
        Hasil::where('id_user', $id)->delete();
        return redirect()->route('pengguna');
    }
}
