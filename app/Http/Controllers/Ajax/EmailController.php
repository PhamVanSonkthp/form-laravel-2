<?php

namespace App\Http\Controllers\Ajax;

use App\Exports\ModelExport;
use App\Http\Controllers\Controller;
use App\Models\Audit;
use App\Models\Helper;
use App\Models\ProductComment;
use App\Models\User;
use App\Notifications\Notifications;
use App\Traits\BaseControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use function redirect;
use function view;

class EmailController extends Controller
{
    use BaseControllerTrait;

    public function __construct(ProductComment $model)
    {
        $this->initBaseModel($model);
        $this->shareBaseModel($model);
    }

    public function sendTestEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->email;

        $user = (new User([
            'email' => $email,
            'name' => substr($email, 0, strpos($email, '@')), // here we take the name form email (string before "@")
        ]));

        $user->notify(new Notifications("Great!", "Email sent successful"));

        return response()->json([
            'code' => 200,
            'message' => "Đã gửi email",
        ]);
    }

}
