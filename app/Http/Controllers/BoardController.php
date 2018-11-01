<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('board');
    }

    public function list()
    {
        $results = DB::table('posts')->where('user_id', Auth::id())->where('is_deleted', false)->orderBy('priority')->paginate(8);

        return view('list', ['results' => $results]);
    }

    public function write()
    {
        return view('write');
    }

    public function taskSave(Request $request)
    {
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => Auth::id(),
            'priority' => $request->input('priority')
        ]);

        return redirect()->route('list');
    }

    public function get(array $data)
    {
        $post = DB::table('posts')->where(['id', $data['id']])->first();
        if(is_null($post)) abort(404);

        return view('detail', $post);
    }

    public function edit($id)
    {
        $post = DB::table('posts')->where('id', $id)->where('is_deleted', false)->first();
        if(is_null($post)) abort(404);

        return view('edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $post = DB::table('posts')->where('id', $id)->where('is_deleted', false)->first();
        if(is_null($post)) abort(404);

        $post->content = $request->input('content');
        $post->title = $request->input('title');
        $post->priority = $request->input('priority');

        DB::table('posts')->where('id', $id)->update([
            'content' => $request->input('content'),
            'title' => $request->input('title'),
            'priority' => $request->input('priority'),
        ]);

        return redirect()->route('list');
    }

    public function delete($id)
    {
        DB::table('posts')->where('id', $id)->update([
            'is_deleted' => true
        ]);

        return redirect()->route('list');
    }
}
