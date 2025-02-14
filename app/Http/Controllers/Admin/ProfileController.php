<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    public function changePersonalData(Request $request)
    {
        // return Auth::user()->password;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = [
            'name' => (Auth::user()->is_master == 1) ? $request->first_name : $request->name,
            'mobile' => $request->mobile,
        ];
        $post = User::where('id', Auth::user()->id)->update($data);
        if ($post) {
            return redirect()->back()->with('success', trans('admin.Save successfuly'))->withInput();
        }
        return redirect()->back()->with('error', trans('admin.Somthing went wrong'))->withInput();
    }

    public function change_password(Request $request)
    {
        // return Auth::user()->password;
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return redirect()->back()->with('error', trans('admin.Current password not match'))->withInput();
        }
        $data = [
            'password' => Hash::make($request->password),
        ];
        $post = User::where('id', Auth::user()->id)->update($data);
        if ($post) {
            return redirect()->back()->with('success', trans('admin.Save successfuly'))->withInput();
        }
        return redirect()->back()->with('error', trans('admin.Somthing went wrong'))->withInput();
    }

    public function changeProfileImage(Request $request)
    {
        // return $request->all();
        if ($request->hasFile('photo') && !empty($request->photo)) {
            $photo = $request->file('photo');
            $new_name = 'users/' . Auth::user()->id . '/' . Str::random(5) . '_' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('users/' . Auth::user()->id . '/'), $new_name);
            $data['photo'] = $new_name;
            $post = User::where('id', Auth::user()->id)->update($data);
            if ($post) {
                return ['cls' => 'success', 'msg' => trans('admin.Save successfuly')];
            }
            return ['cls' => 'error', 'msg' => trans('admin.Somthing went wrong')];
        } else {
            return ['cls' => 'error', 'msg' => trans('admin.Choose photo')];
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
