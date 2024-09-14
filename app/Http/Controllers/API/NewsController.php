<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\RestfulAPI;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $modelNew;

    public function __construct(News $new)
    {
        $this->modelNew = $new;
    }

    public function list(Request $request)
    {

        $results = RestfulAPI::response($this->modelNew, $request);

        foreach ($results as $item) {
            $item['content'] = str_replace("src=\"/storage", "src=\"" . env('APP_URL') . "/storage", $item['content']);

            $item['content'] = str_replace("<img", "<img style=\"border-radius: 12px;border: 1px solid #dee2e6 !important;\"", $item['content']);
        }

        return response()->json($results);
    }

    public function get(Request $request, $id)
    {
        $item = $this->modelNew->findOrFail($id);

        $item['content'] = str_replace("src=\"/storage", "src=\"" . env('APP_URL') . "/storage", $item['content']);

        $item['content'] = str_replace("<img", "<img style=\"border-radius: 12px;border: 1px solid #dee2e6 !important;\"", $item['content']);

        return response()->json($item);
    }
}
