<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankCashIn;
use App\Models\Category;
use App\Models\CategoryNew;
use App\Models\Chat;
use App\Models\ChatGroup;
use App\Models\Formatter;
use App\Models\Helper;
use App\Models\Hotel;
use App\Models\HotelRoom;
use App\Models\ParticipantChat;
use App\Models\Product;
use App\Models\RestfulAPI;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserHotel;
use App\Models\UserHotelRoom;
use App\Models\UserProductRecent;
use App\Models\UserTransection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PaymentController extends Controller
{

    private $model;

    public function __construct(BankCashIn $model)
    {
        $this->model = $model;
    }

    public function getInforPayment(Request $request)
    {
        $item = $this->model->where('is_default', 1)->first();

        //$item->bank_name
        $itemFilt = [
            'beneficiary' => $item->name,
            'bank_name' => $item->bank_name,
            'bank_number' => $item->bank_number,
            'bank_image' => $item->bank_image ?? "https://cdn.haitrieu.com/wp-content/uploads/2021/11/Logo-TCB-H.png",
            'content' => "NAPTIEN " . auth()->id() . " " . $request->amount,
            "image_qr" => "https://img.vietqr.io/image/970416-".$item->bank_number."-zNYSjXk.jpg?accountName=".$item->name."&addInfo=NAPTIEN%20" . auth()->id() . "%20".$request->amount."&amount=" . $request->amount
        ];

        return response()->json($itemFilt);
    }
}
