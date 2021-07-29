<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Photo;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.posts.create',[
            'categories' => $categories,
        ]);
    }

    public function store(Request $request){
        $input = $request->validate([
                'title' => 'required',
                'body' => 'required',
                // 'photo_id' => 'required',
                'category_id' => 'required'
        ]);

        $user = Auth::user();

        if ($file = $request->file('photo_id')) {
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('media'), $name);
            $photo = Photo::create([
                'file' => $name
            ]);

            $input['photo_id'] = $photo->id;
        }
        $user->posts()->create($input);
        return redirect()->route('post');
    }
}
