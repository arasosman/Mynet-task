<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AccessLogs extends Controller
{
    public function index(){
        $log =

        $log = Cache::remember('users', 60, function () {
            return Log::paginate(20);
        });

        return response()->json($log);
    }
}
