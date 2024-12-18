<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ModelExport;
use App\Http\Controllers\Controller;
use App\Models\Audit;
use App\Models\Helper;
use App\Models\Setting;
use App\Traits\BaseControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use function redirect;
use function view;

class SettingController extends Controller
{
    use BaseControllerTrait;

    public function __construct(Setting $model)
    {
        $this->initBaseModel($model);
        $this->shareBaseModel($model);
    }

    public function index(Request $request)
    {
        $items = $this->model->searchByQuery($request);
        return view('administrator.'.$this->prefixView.'.index', compact('items'));
    }

    public function get(Request $request, $id)
    {
        return $this->model->findById($id);
    }

    public function create(Request $request)
    {
        return view('administrator.'.$this->prefixView.'.add');
    }

    public function store(Request $request)
    {
        $item = $this->model->storeByQuery($request);
        return redirect()->route('administrator.'.$this->prefixView.'.edit', ["id" => $item->id]);
    }

    public function edit(Request $request, $id)
    {
        $item = $this->model->findOrFail($id);

        return view('administrator.'.$this->prefixView.'.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $this->model->updateByQuery($request, $id);
        return back();
    }

    public function delete(Request $request, $id)
    {
        return $this->model->deleteByQuery($request, $id);
    }

    public function deleteManyByIds(Request $request)
    {
        return $this->model->deleteManyByIds($request, $this->forceDelete);
    }

    public function export(Request $request)
    {
        return Excel::download(new ModelExport($this->model, $request), $this->prefixView . '.xlsx');
    }

    public function audit(Request $request, $id)
    {
        $auditModel = new Audit();
        $items = $auditModel->searchByQuery($request, ['auditable_id' => $id, 'auditable_type' => 'App\Models\Setting'], null, null, true);

        $items = $items->latest()->get();
        $content = [
            'message' => 'success',
            'code' => 200,
            'html' => View::make('administrator.components.modal_audit', compact('items'))->render(),
        ];

        return response()->json($content);
    }

    public function sort(Request $request)
    {

        Helper::sortTwoModel($this->model, $request->old_id, $request->new_id);

        return response()->json([
            'message' => 'sorted'
        ]);
    }
}
