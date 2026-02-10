<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Field;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;

class HomeController extends Controller
{

    public function home()
    {
        $usersCount = User::count();
        $usersLast = User::latest()->first();
        $filesCount = File::count();
        $filesLast = File::latest()->first();
        return view('home.home',[
            'usersCount' => $usersCount,
            'usersLast' => $usersLast,
            'filesCount' => $filesCount,
            'filesLast' => $filesLast,
        ]);
    }

    public function user()
    {
        $users = User::all();
        return view('home.user',[
            'users' => $users,
        ]);
    }

    public function userUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'mobile' => ['digits:11', 'unique:users,mobile,' . auth()->id()],
        ]);
        $user = User::find(auth()->id());
        if($request->hasFile('avatar')){
            $path = $request->file('avatar')->store("users",['disk' => 'public']);
            $user->avatar = $path;
        }
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->save();

        return back();
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function post(Post $post)
    {
        return view('partnerWelcome',[
            'post' => $post,
        ]);
    }

}
