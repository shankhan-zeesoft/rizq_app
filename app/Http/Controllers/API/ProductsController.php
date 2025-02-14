<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Resources\API\ProductResource;
use App\Models\Products;
use App\Repositories\Admin\ProductRepository;

class ProductsController extends Controller
{
    var $url;
    public function __construct(private ProductRepository $repository)
    {
        // $this->middleware('auth');
        $this->url = request()->path();
    }

    public function index(Request $request)
    {
        $page = $request->page ?? 1;
        $perPage = $request->perPage ?? 10;
        $skip = ($page * $perPage) - $perPage;
        $modelData = $this->repository->search($request->search)->with(['categories'])
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
            })
            ->orderByDesc('id');
        $result['count'] = $modelData->count();
        $result['products'] = ProductResource::collection($modelData->skip($skip)->take($perPage)->get());
        return $this->responseJson(true, $result, trans('api.productList'));
    }

    public function single(Request $request, $id)
    {
        $result['product'] = ProductResource::make($this->repository->find($id));
        return $this->responseJson(true, $result, trans('api.productList'));
    }

    public function store(ProductRequest $request)
    {
        // if (!hasPermissionToUser('insert', 'agent_seekers')):
        // abort(403, trans('admin.Permission_denied'));
        // endif;
        try {
            if ($request->validated()) {
                $this->repository->storeByRequest($request);
                return $this->responseJson(success: true, message: trans('admin.Saved_successfully'));
            }
        } catch (\Throwable $th) {
            return $this->responseJson(success: false, message: $th->getMessage());
        }
    }

    function update(Products $product, ProductRequest $request)
    {
        try {
            if ($request->validated()) {
                $this->repository->updateByRequest($product, $request);
                return $this->responseJson(success: true, message: trans('admin.Saved_successfully'));
            }
        } catch (\Throwable $th) {
            return $this->responseJson(success: false, message: $th->getMessage());
        }
    }

    function status(Products $product)
    {
        $product->update(['status' => $product->status == 1 ? 0 : 1]);
        return $this->responseJson(success: true, message: trans('admin.Status_changed'));
    }

    function destroy(Products $product)
    {
        $product->delete();
        return $this->responseJson(success: true, message: trans(key: 'admin.Deleted_successfully'));
    }
}
