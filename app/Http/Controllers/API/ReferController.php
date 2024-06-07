<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryNew;
use App\Models\Chat;
use App\Models\ChatGroup;
use App\Models\Formatter;
use App\Models\Helper;
use App\Models\ParticipantChat;
use App\Models\Product;
use App\Models\RestfulAPI;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserFlight;
use App\Models\UserHotel;
use App\Models\UserPoint;
use App\Models\UserProductRecent;
use App\Models\UserReceipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class ReferController extends Controller
{

    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create(Request $request)
    {
        $request->validate([
            'referral_id' => 'required',
        ]);

        if (!empty(auth()->user()->referral_id)) return response()->json(Helper::errorAPI(400,[],"Bạn đã nhập mã giới thiệu"), 400);

        $userRefer = User::where('id', $request->referral_id)->orWhere('referral_id', $request->referral_id)->first();

        if (!empty($userRefer)) return response()->json(Helper::errorAPI("400",[],"Mã giới thiệu không đúng"), 400);

        auth()->user()->update([
            'referral_id' => $request->referral_id
        ]);

        return response()->json(Helper::successAPI(200,[],"Đã nhập mã giới thiệu"));
    }

    public function list(Request $request)
    {
        $refers = auth()->user()->referrals;

        return response()->json($refers);
    }


}
