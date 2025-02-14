<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Admin\CategoryRepository;

class CategoryController extends Controller
{
    public $url;
    public function __construct(private CategoryRepository $repository)
    {
        $this->middleware('auth');
        $this->url = request()->path();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->repository->query();
            return DataTables::of($data)
                ->filter(function ($query) use ($request) { // we can also use filters here.
                    if ($request->filled('filter_status')) {
                        $query->where('status', $request->filter_status);
                    }
                })
                ->addIndexColumn()
                ->setRowId(function ($row) {
                    return $row->id;
                })
                ->addColumn('id', function ($row) {
                    return $row->id;
                })
                ->addColumn('name', function ($row) {
                    return $row->name ?? "-";
                })
                ->addColumn('status', function ($row) {
                    $swtich = '
                            <div class="form-check form-switch form-switch-custom form-switch-success">
                                <input class="form-check-input" type="checkbox" role="switch" id="checkbox' . $row->id . '" onClick="status(' . $row->id . ')" ' . (($row->status == 1) ? 'checked' : '') . '>
                            </div>
                        ';
                    return $swtich;
                })
                ->addColumn('action', function ($row) {
                    $editBtn = $deleteBtn = '';
                    $editBtn = '
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" onclick="edit(' . $row->id . ')"><i class="ri-pencil-fill me-2 align-middle text-info"></i>' . trans('company.Edit') . '</a>
                            </li>
                        ';
                    $deleteBtn = '
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" onClick="destroy(' . $row->id . ')"><i class="ri-delete-bin-5-line me-2 align-middle text-danger"></i>' . trans('company.Delete') . '</a>
                            </li>
                        ';

                    $btn = '
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="true">
                                <i class="ri-equalizer-fill"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink1" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 23px);">
                                ' . $editBtn . '
                                ' . $deleteBtn . '
                            </ul>
                        </div>
                    ';
                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        // dd($data);
        return view('admin/category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $id = Crypt::decrypt($id);
        $language = getLang();
        $data['post'] = [];
        if ($request->has('action') && $request->action == 'edit') {
            $data['post'] = $this->repository->findOrFail($request->id);
        }
        // return $data['post'];
        return view('admin/category.form', compact('data', 'language'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        // return $request->all();
        try {
            if ($request->validated()) {
                if ($request->has('id')) {
                    $post = $this->repository->updateByRequest($request);
                } else {
                    $post = $this->repository->storeByRequest($request);
                }
                return ['text' => trans('backend.Save successfully'), 'cls' => 'success'];
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function status(Request $request)
    {
        $post = $this->repository->find($request->id);
        $post->status = ($post->status == 1) ? 0 : 1;
        $msg = $post->save();
        if ($msg) {
            return ['text' => trans('backend.Changed successfully'), 'cls' => 'success'];
        } else {
            return ['text' => trans('backend.Somthing went wrong'), 'cls' => 'error'];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $msg = $this->repository->find($request->id)->delete();
        if ($msg) {
            return ['text' => trans('backend.Delete successfully'), 'cls' => 'success'];
        }
        return ['text' => trans('backend.Somthing went wrong'), 'cls' => 'error'];
    }
}
