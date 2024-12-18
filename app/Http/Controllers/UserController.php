<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function destroy($id) {
        $pizza = User::findOrFail($id);
        $pizza->delete();

        return redirect('/users')-with('delete', 'USER SUCCESSFULLY DELETED');
    }
}
