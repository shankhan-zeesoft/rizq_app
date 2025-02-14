<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\API\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {
            // return $request->all();
            if ($request->validated()):
                $credentials = $request->only('password');
                if ($request->has('email') && !empty($request->email)):
                    $credentials['email'] = $request->email;
                else:
                    $credentials['mobile'] = $request->mobile;
                endif;

                if (Auth::attempt($credentials, $request->boolean('remember_me', true))) {
                    $user = User::find(auth('sanctum')->user()->id);
                    $data['token'] = $user->createToken('api-token')->plainTextToken;

                    // Update device IDs only if present
                    $user->fill($request->only(['ios_device_id', 'android_device_id']))->save();

                    $data['user'] = $user->toArray();
                    return $this->responseJson(success: true, message: 'login_success', data: $data);
                }
                return $this->responseJson(success: false, message: 'credentials_invalid');
            endif;
        } catch (\Throwable $th) {
            return $this->responseJson(success: false, message: $th->getMessage() . ' in ' . $th->getFile() . ' on line ' . $th->getLine(), statusCode: 500);
        }
    }

    public function logout()
    {
        try {
            // User::find(auth('sanctum')->user()->id)->tokens()->delete();
            auth('sanctum')->logout();
            return $this->responseJson(success: true, message: 'logout_success');
        } catch (\Throwable $th) {
            return $this->responseJson(success: false, message: $th->getMessage() . ' in ' . $th->getFile() . ' on line ' . $th->getLine(), statusCode: 500);
        }
    }
}
