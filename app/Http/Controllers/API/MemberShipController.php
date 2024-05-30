<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryNew;
use App\Models\Chat;
use App\Models\ChatGroup;
use App\Models\Formatter;
use App\Models\Membership;
use App\Models\ParticipantChat;
use App\Models\Product;
use App\Models\RestfulAPI;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberShipController extends Controller
{

    private $model;

    public function __construct(Membership $model)
    {
        $this->model = $model;
    }

    public function list(Request $request)
    {
        $users = User::latest()->get();

        foreach ($users as $user){
            $user['commission'] = $user->commission();
            $user['invited'] = $user->numberInvited();
        }

        $size = count($users) - 1;
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size - $i; $j++) {
                $k = $j + 1;
                if ($users[$k]['invited'] > $users[$j]['invited']) {
                    // Swap elements at indices: $j, $k
                    list($users[$j], $users[$k]) = array($users[$k], $users[$j]);
                }
            }
        }

        $position = 0;

        foreach ($users as $index => $user){
            if ($user->id == auth()->id()) $position = $index + 1;
        }

        $data = [
            'your' => [
                'invited' => auth()->user()->numberInvited(),
                'position' => $position,
                'commission' => auth()->user()->commission(),
            ],
            'data' => []
        ];

        foreach ($users as $index => $user){

            if ($index == 10) break;
            $data['data'][] = [
                'user' => $user,
                'invited' => $user['invited'],
                'commission' => $user['commission'],
            ];
        }

        return response()->json($data);
    }



}
