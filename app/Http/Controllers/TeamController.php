<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\User;
use App\Repositories\UserRepository;
use App\Repositories\PostRepository;
use Carbon\Carbon;

class TeamController extends Controller
{
    /**
     * The user repository instance.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * The post repository instance.
     * @var PostRepository
     */
    protected $posts;

    /**
     * Create a new controller instance.
     * @param  UserRepository  $tasks
     * @return void
     */
    public function __construct(UserRepository $users, PostRepository $posts)
    {
        $this->middleware('auth');
        $this->users = $users;
        $this->posts = $posts;
    }

    /**
     * Show the team page.
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('team', [
            'users' => $this->users->getUsers()
        ]);
    }


    /**
     * Show the team page.
     * @return \Illuminate\Http\Response
     */
    public function postsByUser(Request $request, $userId)
    {
        $selectedUser = User::find($userId);
        return view('team', [
            'selectedUser' => $selectedUser,
            'users' => $this->users->getUsers(),
            'posts' => $this->posts->forUser($selectedUser),
        ]);
    }
}
