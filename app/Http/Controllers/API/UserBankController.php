<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\RestfulAPI;
use App\Models\Slider;
use App\Models\UserBank;
use Illuminate\Http\Request;

class UserBankController extends Controller
{

    private $model;

    public function __construct(UserBank $model)
    {
        $this->model = $model;
    }

    public function get(Request $request, $id)
    {
        $result = $this->model->findOrFail($id);

        if ($result->user_id != auth()->id()) return abort(404);

        return response()->json($result);
    }

    public function list(Request $request)
    {
        $results = RestfulAPI::response($this->model, $request, ['user_id' => auth()->id()]);
        return response()->json($results);
    }

    public function create(Request $request)
    {

        $request->validate([
            'bank_id' => 'required|exists:banks,id',
            'account_name' => 'required',
            'account_number' => 'required',
        ]);

        if ($request->is_default == 1){
            $this->model->where('user_id' , auth()->id())->update([
                'is_default' => 0
            ]);
        }

        $item = $this->model->create([
            'bank_id' => $request->bank_id,
            'user_id' => auth()->id(),
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'is_default' => $request->is_default ?? 0,
        ]);

        $item->refresh();

        return response()->json($item);
    }
}
