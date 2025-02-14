<?php

namespace App\Helpers;


class AdminHelper
{
    public static $loggedUser;
    public static $lang;

    // Static method to initialize static properties
    public static function initialize()
    {
        self::$loggedUser = \Illuminate\Support\Facades\Auth::user();
        self::$lang = getLang();
    }

    public static function checkInit()
    {
        if (!self::$loggedUser || !self::$lang) {
            self::initialize();
        }
    }

    public static function categoryDD($id = 0)
    {
        self::checkInit();
        $data = \App\Models\Categories::where(['status' => 1])->get();
        $option = '<option value="0"> ---- ' . trans('Choose...') . ' ---- </option>';
        foreach ($data as $key => $row) {
            $selected = ($id == $row->id) ? 'selected' : '';
            $option .= '<option ' . $selected . ' value="' . $row->id . '">
                ' . ($row->name ?? '') . '
            </option>';
        }
        return $option;
    }
}
