<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class AdminController extends Controller
{
    public function updateInfo(Request $request)
    {
        $key = $request->input('key');
        $value = $request->input('value');
        $type = $request->input('type');
        $info = Info::where('key', $key)->where('type', $type)->first();
        if ($info) {
            $info->value = $value;
            $info->save();
        } else {
            Info::create([
                'key' => $key,
                'value' => $value,
                'type' => $type
            ]);
        }
        return 1;
    }

    public function createSubmitted(Request $request)
    {
        $gname = $request->input('gname');
        $gsubmit = $request->input('gsubmit');
        $gmessage = $request->input('gmessage');
        $goriginname = $request->input('goriginname');
        $submitted = Submited::create([
            'gname' => $gname,
            'gsubmit' => $gsubmit,
            'gmessage' => $gmessage,
            'goriginname' => $goriginname
        ]);
        return ['success' => true];
    }
}
