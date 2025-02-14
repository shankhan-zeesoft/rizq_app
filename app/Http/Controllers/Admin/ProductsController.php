<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\ProductRequest;
use App\Repositories\Admin\ProductRepository;

class ProductsController extends Controller
{
    public $url;
    public function __construct(private ProductRepository $repository)
    {
        $this->middleware('auth');
        $this->url = request()->path();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return Carbon::now()->addDays(2);
        $lang = app()->getLocale();
        if ($request->ajax()) {
            $data = $this->repository->query()->with(['categories'])
                ->when($request->filled('min_price') && $request->filled('max_price'), function ($query) use ($request) {
                    $query->whereBetween('price', [$request->min_price, $request->max_price]);
                })
                ->when($request->filled('category_id') && $request->category_id > 0, function ($query) use ($request) {
                    $query->whereHas('categories', function ($q) use ($request) {
                        $q->where('categories_id', $request->category_id);
                    });
                })
                ->when($request->filled('in_stock'), function ($query) use ($request) {
                    $query->whereHas('variants', function ($q) use ($request) {
                        $q->when($request->in_stock == '1', function ($q) {
                            $q->where('stock', '>', 0);
                        })->when($request->in_stock == '0', function ($q) {
                            $q->where('stock', '=', 0);
                        });
                    });
                });
            return DataTables::of($data)
                // ->filter(function ($query) use ($request) { // we can also use filters here.
                //     if ($request->filled('search')) {

                //     }
                // })
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
                ->addColumn('description', function ($row) {
                    return $row->description ?? "-";
                })
                ->addColumn('categories', function ($row) {
                    // return $row->categories?->name ?? "";
                    return $row->categories->pluck('name')->implode(', ');
                })
                ->addColumn('price', function ($row) {
                    return $row->price ?? 0;
                })
                ->addColumn('in_stock', function ($row) {
                    return $row->variants->sum('stock') ?? 0;
                })
                ->addColumn('status', function ($row) {
                    $swtich = '
                            <div class="form-check form-switch form-switch-custom form-switch-success">
                                <input class="form-check-input" type="checkbox" role="switch" id="checkbox' . $row->id . '" onClick="status(' . $row->id . ')" ' . (($row->status == 1) ? 'checked' : '') . '>
                            </div>
                        ';
                    return $swtich;
                })
                ->rawColumns(['status'])
                ->make(true);
        }
        // dd($data);
        return view('admin/products.index');
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
        return view('admin/products.form', compact('data', 'language'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        // return $request->all();
        $this->beginTransactions();
        try {
            if ($request->validated()) {
            }
        } catch (\Throwable $th) {
            $this->rollBack();
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
        $msg = $this->repository->delete($request->id);
        if ($msg) {
            return ['text' => trans('backend.Delete successfully'), 'cls' => 'success'];
        }
        return ['text' => trans('backend.Somthing went wrong'), 'cls' => 'error'];
    }
}
