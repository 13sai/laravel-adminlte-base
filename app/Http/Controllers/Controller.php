<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    final public function success($data = [], $message = '', $code = 0)
    {
        if (is_null($data)) {
            $data = new \stdClass();
        }
        return response()->json([
            'code' => $code,
            'msg' => $message,
            'data' => $data,
        ], 200);
    }

    final public function failure($data = [], $message = '', $code = -1)
    {
        return response()->json([
            'code' => $code,
            'msg' => $message,
            'data' => $data,
        ], 200);
    }

    final public function errorView($message = '', $code = 404, $data = [])
    {
        return $this->view('/errors.exception', compact('data', 'message', 'code'));
    }

    public function view($view = null, $data = [], $mergeData = [])
    {
        return view($view, $data, $mergeData);
    }
}
