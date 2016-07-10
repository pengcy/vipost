<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Post;
use App\Repositories\PostRepository;
use Carbon\Carbon;

class HomeController extends Controller
{

    /**
     * The post repository instance.
     * @var PostRepository
     */
    protected $posts;

    /**
     * Create a new controller instance.
     * @param  PostRepository  $posts
     * @return void
     */
    public function __construct(PostRepository $posts)
    {
        $this->middleware('auth');

        $this->posts = $posts;
    }

    /**
     * Show the login home page.
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('home', [
            'posts' => $this->posts->forUser($request->user()),
        ]);
    }

    /**
     * Create a new post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'whats_done' => 'required|min:2',
        ]);
        
        $this->validate($request, [
            'will_do' => 'required|min:2',
        ]);

        $this->validate($request, [
            'blockers' => 'required|min:2',
        ]);

        Post::create([
            'user_id' => $request->user()->id,
            'date' => Carbon::now(),
            'whats_done' => $request->whats_done,
            'will_do' => $request->will_do,
            'blockers' => $request->blockers,
        ]);
        return redirect('/home');
    }

    /**
     * Destroy the given post.
     *
     * @param  Request  $request
     * @param  Post  $post
     * @return Response
     */
    public function destroy(Request $request, Post $post)
    {
        $this->authorize('destroy', $post);

        $post->delete();

        return redirect('/home');
    }
}
