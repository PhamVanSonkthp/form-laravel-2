<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PusherChatRequest;
use App\Models\Category;
use App\Models\CategoryNew;
use App\Models\Chat;
use App\Models\ChatGroup;
use App\Models\Formatter;
use App\Models\Helper;
use App\Models\ParticipantChat;
use App\Models\Product;
use App\Models\RestfulAPI;
use App\Models\User;
use App\Models\UserCart;
use App\Models\UserProductRecent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChatController extends Controller
{

    private $model;

    public function __construct(Chat $model)
    {
        $this->model = $model;
    }

    public function create(PusherChatRequest $request)
    {
        $request->validate([
            'contents' => 'required',
            'chat_group_id' => 'required',
            'images' => 'nullable',
            'images.*' => 'nullable|mimes:jpg,jpeg,png',
        ]);

        $chatModel = new Chat();

        $chat = $chatModel->create([
            'content' => $request->contents,
            'user_id' => auth()->id(),
            'chat_group_id' => (int)$request->chat_group_id,
        ]);

        if (is_array($request->images)){
            foreach ($request->images as $image) {

                $item = Image::create([
                    'uuid' => Helper::getUUID(),
                    'table' => $chatModel->getTableName(),
                    'image_path' => "waiting",
                    'image_name' => "waiting",
                    'relate_id' => $chat->id,
                ]);


                $dataUploadFeatureImage = StorageImageTrait::storageTraitUpload($request, $image,  'product_comments', $item->id);

                $dataUpdate = [
                    'image_path' => $dataUploadFeatureImage['file_path'],
                    'image_name' => $dataUploadFeatureImage['file_name'],
                ];

                $item->update($dataUpdate);

            }
        }

        $chat->refresh();

        return response()->json($chat);
    }

}
