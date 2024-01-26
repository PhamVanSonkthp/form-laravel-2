<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatGroup;
use App\Models\Formatter;
use App\Models\ParticipantChat;
use App\Models\Setting;
use App\Models\SingleImage;
use App\Models\User;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use NextApps\VerificationCode\VerificationCode;

class AuthController extends Controller
{

    private $plainToken;

    public function __construct()
    {
        $this->plainToken = env('PLAIN_TOKEN', 'infinity_pham_son');
    }

    public function get(Request $request)
    {
        return response()->json(auth()->user());
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string|unique:users',
            'password' => 'required|string',
            'date_of_birth' => 'date_format:Y-m-d',
            'firebase_uid' => 'required|string',
            'city_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            'address' => 'required',
        ]);

        $user = User::updateOrCreate([
            'phone' => $request->phone,
        ], [
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Formatter::hash($request->password),
            'date_of_birth' => $request->date_of_birth,
            'firebase_uid' => $request->firebase_uid,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'ward_id' => $request->ward_id,
            'address' => $request->address,
        ]);

        $user->refresh();

        $token = $user->createToken($this->plainToken)->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        $chatGoup = ChatGroup::create([
            'title' => 'First chat'
        ]);

        ParticipantChat::create(
            [
                'user_id' => $user->id,
                'chat_group_id' => $chatGoup->id,
            ]
        );

        ParticipantChat::create(
            [
                'user_id' => 1,
                'chat_group_id' => $chatGoup->id,
            ]
        );

        Chat::create([
            'content' => 'Chào mừng đến với ' . env('APP_NAME') . '!',
            'user_id' => 1,
            'chat_group_id' => $chatGoup->id,
        ]);

        return response($response);
    }

    public function signIn(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('phone', $request->phone)->first();

        if (empty($user)) {
            return response([
                'message' => "Tài khoản chưa được tạo",
                'code' => 400,
            ], 400);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response([
                'message' => "Mật khẩu không đúng",
                'code' => 400,
            ], 400);
        }
        if ($user->user_status_id == 2) {
            return response()->json(['error' => 'Tài khoản của bạn đã bị khóa'], 405);
        }

        if (optional(Setting::first())->is_login_only_one_device){
            $user->logoutAllDevices();
        }

        $token = $user->createToken($this->plainToken)->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response()->json($response);

    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'success',
            'code' => 200,
        ]);
    }

    public function checkExist(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
        ]);

        if (!empty(User::where('phone', $request->phone)->first())) {
            return response()->json([
                'message' => $request->phone . " is exist",
                'code' => 200,
            ]);
        } else {
            return response()->json([
                'message' => $request->phone . " is not exist",
                'code' => 400,
            ], 400);
        }

    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'firebase_uid' => 'required',
            'password' => 'required',
        ]);

        $user = User::where(['firebase_uid'=> $request->firebase_uid, 'phone'=> $request->phone])->first();

        if (empty($user)) {
            return response()->json([
                'message' => "phone or firebase_uid is not exist",
                'code' => 400,
            ], 400);
        }
        $user->update([
            'password' => Formatter::hash($request->new_password)
        ]);

        return response($user, 200);
    }

    public function update(Request $request)
    {
        $request->validate([
            'date_of_birth' => 'date_format:Y-m-d',
            'image' => 'nullable|mimes:jpg,jpeg,png',
        ]);

        $dataUpdate = [];

        if (!empty($request->name)) {
            $dataUpdate['name'] = $request->name;
        }

        if (!empty($request->date_of_birth)) {
            $dataUpdate['date_of_birth'] = $request->date_of_birth;
        }

        if (!empty($request->address)) {
            $dataUpdate['address'] = $request->address;
        }

        if (!empty($request->password)) {
            $dataUpdate['password'] = Formatter::hash($request->password);
        }

        auth()->user()->update($dataUpdate);

        if ($request->hasFile('image')){
            $item = SingleImage::firstOrCreate([
                'relate_id' => auth()->id(),
                'table' => auth()->user()->getTableName(),
            ],[
                'relate_id' => auth()->id(),
                'table' => auth()->user()->getTableName(),
                'image_path' => 'waiting_update',
                'image_name' => 'waiting_update',
            ]);

            $dataUploadFeatureImage = StorageImageTrait::storageTraitUpload($request, 'image', 'single', $item->id);

            $item->update([
                'image_path' => $dataUploadFeatureImage['file_path'],
                'image_name' => $dataUploadFeatureImage['file_name'],
            ]);
            $item->refresh();

        }

        return auth()->user();
    }


    public function delete()
    {
        auth()->user()->forcedelete();
        return response()->json([
            'message' => 'deleted!',
            'code' => 200,
        ]);
    }
}
