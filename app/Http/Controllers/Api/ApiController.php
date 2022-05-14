<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    protected $error = [
        'NoRecord' => [
            ['error' => 'Record not found'],
            404,
        ],
    ];

    /**
     * Create a new JSON response instance with error code.
     *
     */
    public function error(string $code) {
        return response()->json($this->error[$code][0], $this->error[$code][1]);
    }
}
