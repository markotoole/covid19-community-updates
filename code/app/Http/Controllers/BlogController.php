<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function list(Request $request, $type)
    {
        $types = Post::getTypes();

        if (! isset($types[$type])) {
            abort(404);
        }

        return view(
            'blog',
            [
                'title' => $types[$type],
                'posts' => Post::query()
                               ->where('active', '=', true)
                               ->where('type', '=', $type)
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
