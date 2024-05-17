<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $postsCount = Post::count();
        $commentsCount = Comment::count();

        //nombre utilisateurs par mois
        $data_posts_by_month = DB::table('Posts')
            ->select(DB::raw('count(*) as user_count, MONTHNAME(created_at) as month'))
            ->groupBy('month')
            ->get();

        return view('dashboard', [
            'usersCount' => $usersCount,
            'postsCount' => $postsCount,
            'commentsCount' => $commentsCount,
            'data_posts_by_month' => $data_posts_by_month
        ]);
    }
}
