<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Formatter;
use App\Models\Helper;
use App\Models\ParticipantChat;
use App\Models\Product;
use App\Models\RegisterCity;
use App\Models\RestfulAPI;
use App\Models\User;
use App\Models\UserCart;
use App\Models\UserProductRecent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterCityController extends Controller
{

    private $model;

    public function __construct(RegisterCity $model)
    {
        $this->model = $model;
    }

    public function list(Request $request)
    {
        $results = RestfulAPI::response($this->model, $request, null, null, null, true);

        if ($request->order_id == 1) {
            $results = $results->orderBy('name');
        } else if ($request->order_id == 2 || $request->order_id == 3) {
            $results = $results->whereIn('id', [1, 2, 15, 8, 3, 12, 16, 20, 118, 7, 144, 11, 18]);
        }

        $results = $results->paginate(Formatter::getLimitRequest($request->limit))->appends(request()->query());

        return response()->json($results);
    }

}
