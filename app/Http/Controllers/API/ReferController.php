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

        $userRefer = User::where('id', $request->referral_id)->orWhere('phone', $request->referral_id)->first();

        if (empty($userRefer)) return response()->json(Helper::errorAPI("400",[],"Mã giới thiệu không đúng"), 400);

        if($userRefer->id == auth()->id()){
            return response()->json(Helper::errorAPI("400",[],"Không nhập mã của chính mình"), 400);
        }

        $setting =  Setting::first();

        $number_point_refer_success = $setting->number_point_refer_success ?? 0;
        $number_point_taken_refer_success = $setting->number_point_taken_refer_success ?? 0;

        if (!empty($number_point_refer_success)){
            $userRefer->addPoint($number_point_refer_success, "Giới thiệu thành công: " . auth()->user()->name . " #" . auth()->id(), auth()->user()->name . " - " . auth()->user()->phone,auth()->user()->avatar(),2);
        }

        if (!empty($number_point_taken_refer_success)){
            auth()->user()->addPoint($number_point_refer_success, "Nhập mã giới thiệu thành công: " . $userRefer->name . " #" . $userRefer->id);
        }

        auth()->user()->update([
            'referral_id' => $userRefer->id
        ]);

        return response()->json(Helper::successAPI(200,[],"Đã nhập mã giới thiệu"));
    }

    public function list(Request $request)
    {
        $refers = auth()->user()->referrals;

        return response()->json($refers);
    }


}
