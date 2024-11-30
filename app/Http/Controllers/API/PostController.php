<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Formatter;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\RestfulAPI;
use App\Models\Setting;
use App\Models\UserPoint;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function get(Request $request, $id)
    {
        $result = $this->model->findOrFail($id);
        return response()->json($result);
    }

    public function list(Request $request)
    {
        $results = RestfulAPI::response($this->model, $request);
        return response()->json($results);
    }

    public function listByUser(Request $request)
    {
        $results = RestfulAPI::response($this->model, $request, ['user_id' => auth()->id()]);
        return response()->json($results);
    }

    public function getComment(Request $request, $id)
    {
        $results = RestfulAPI::response(new PostComment(), $request, ['post_id' => $id]);
        return response()->json($results);
    }

    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $item = $this->model->create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        $item->refresh();

        return response()->json($item);
    }

    public function createComment(Request $request)
    {

        $request->validate([
            'post_id' => 'required',
            'description' => 'required',
        ]);

        $post = $this->model->findOrFail($request->post_id);

        $item = PostComment::create([
            'post_id' => $post->id,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        $item->refresh();

        return response()->json($item);
    }
}
