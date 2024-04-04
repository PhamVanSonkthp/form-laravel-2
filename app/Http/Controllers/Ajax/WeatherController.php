<?php

namespace App\Http\Controllers\Ajax;

use App\Exports\ModelExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Formatter;
use App\Models\Helper;
use App\Models\Image;
use App\Models\Product;
use App\Models\Weather;
use App\Traits\BaseControllerTrait;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use function redirect;
use function view;

class WeatherController extends Controller
{
    use BaseControllerTrait;

    public function __construct(Product $model)
    {
        $this->initBaseModel($model);
        $this->shareBaseModel($model);
    }

    public function get(Request $request){

        $weather = Weather::where('created_at', '>' , Carbon::now()->subMinutes(15)->toDateTimeString())->first();

        if (!empty($weather)){
            return response()->json(json_decode($weather->content, true));
        }

        $item = Helper::callGetHTTP("https://api.weatherapi.com/v1/current.json", [
            'q' => "20.868208,106.649940",
            'key' => "f9fbc79a42ac4317b7520646241603",
        ]);

        Weather::create([
            'lat' => $request->lat,
            'lng' => $request->lng,
            'content' => json_encode($item),
        ]);

        return response()->json($item);
    }

}
