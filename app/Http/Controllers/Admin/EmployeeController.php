<?php

namespace App\Http\Controllers\Admin;

use App\Exports\EmployeeExport;
use App\Exports\ModelExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\Audit;
use App\Models\Role;
use App\Models\User;
use App\Traits\BaseControllerTrait;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use function view;

class EmployeeController extends Controller
{
    use BaseControllerTrait;

    public function __construct(User $model)
    {
        $roles = Role::all();
        $this->initBaseModel($model);
        $this->isSingleImage = true;
        $this->isMultipleImages = false;
        $this->prefixView = 'employees';
        $this->shareBaseModel($model);
        View::share('roles', $roles);
    }

    public function index(Request $request)
    {
        $items = $this->model->searchByQuery($request, ['is_admin' => 1]);
        return view('administrator.'.$this->prefixView.'.index', compact('items'));
    }

    public function get(Request $request, $id)
    {
        return $this->model->findById($id);
    }

    public function create()
    {
        return view('administrator.'.$this->prefixView.'.add');
    }

    public function store(Request $request)
    {
        $item = $this->model->storeByQuery($request);
        return redirect()->route('administrator.'.$this->prefixView.'.index');
    }

    public function edit($id)
    {
        $item = $this->model->findById($id);
        $rolesOfUser = $item->roles;
        return view('administrator.'.$this->prefixView.'.edit', compact('item','rolesOfUser'));
    }

    public function update($id, Request $request)
    {
        $item = $this->model->updateByQuery($request, $id);
        return back();
    }

    public function delete($id)
    {
        return $this->model->deleteModelTrait($id, $this->model);
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
        $items = $auditModel->searchByQuery($request, ['auditable_id' => $id, 'auditable_type' => 'App\Models\User'], null, null, true);

        $items = $items->latest()->get();
        $content = [
            'message' => 'success',
            'code' => 200,
            'html' => View::make('administrator.components.modal_audit', compact('items'))->render(),
        ];

        return response()->json($content);
    }
}
