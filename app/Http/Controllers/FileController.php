<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $files = File::orderBy('id', 'DESC')->get();

        return view('file.index',[
            'files' => $files,
        ]);
    }

    public function select()
    {
        $category_select = Category::find( request('category_id') );

        return view('file.select', [
            'category_select' => $category_select,
        ]);
    }

    public function create(Request $request)
    {
        $category_select = Category::find( request('category_id') );

        $request->validate([
            'name' => 'required',
            'mobile' => 'required|min:10|max:14',
        ]);

        $user = User::firstOrCreate(
            ['mobile' => $request['mobile']],
            [
                'user_id' => auth()->id(),
                'name' => $request['name'],
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ]
        );

        return view('file.create', [
            'category_select' => $category_select,
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {
        File::create($request->all());
        return to_route('file.index');
    }

    public function show(File $file)
    {
        return view('file.show',[
            'file' => $file
        ]);
    }

    public function edit(File $file)
    {
        return view('file.edit',[
            'file' => $file
        ]);
    }

    public function update(Request $request, File $file)
    {
//        File::find($file->id)->update($request->all());
        $input = $request->all();
        $file->fill($input)->save();
        return view('file.show',[
            'file' => $file
        ]);
    }

    public function destroy(File $file)
    {
        $file->delete();
        return to_route('file.index');
    }

    public function like(File $file)
    {
        if ($file->like == 0){
            $file->like = 1;
        } else {
            $file->like = 0;
        }
        $file->save();
        return back();
    }

    public function shekar(File $file)
    {
        if ($file->shekar == 0){
            $file->shekar = 1;
        } else {
            $file->shekar = 0;
        }
        $file->save();
        return back();
    }
}
