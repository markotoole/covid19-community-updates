<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function list(Request $request)
    {
        return view(
            'blog',
            [
                'posts' => Post::query()
                               ->where('active', '=', true)
                               ->get(),
            ]
        );
    }

    public function index(Request $request, $id)
    {
        return view(
            'post',
            [
                'post' => Post::findOrFail($id),
            ]
        );
    }
}
