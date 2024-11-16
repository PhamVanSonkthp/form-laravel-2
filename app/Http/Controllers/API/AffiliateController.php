<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Formatter;
use App\Models\Hotel;
use App\Models\HotelRoom;
use App\Models\RestfulAPI;
use App\Models\User;
use App\Models\UserHotel;
use App\Models\UserHotelRoom;
use App\Models\UserTransaction;
use App\Models\UserTransection;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{

    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function list(Request $request)
    {
        $queries = ['referral_id' => auth()->id()];
        $results = RestfulAPI::response($this->model, $request, $queries);
        return response()->json($results);
    }
}
