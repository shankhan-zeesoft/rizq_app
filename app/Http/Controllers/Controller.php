<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseJson($success = true, $data = [], $message = "", $statusCode = 200, array $headers = [], $options = 0)
    {
        // $locale = auth('sanctum')->user()->locale ?? app()->getLocale();
        $content = [
            'success' => $success,
            // 'message' => $this->getTranslation($message, $locale),
            'message' => $message,
        ];
        if (!empty($data)) {
            $content['data'] = $data;
        }
        return response()->json($content, $statusCode, $headers, $options);
    }
}
