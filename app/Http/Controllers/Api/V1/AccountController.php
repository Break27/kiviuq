<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    /**
     * PATCH api/v1/accounts/update_credentials
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCredentials(Request $request) {
        $profile = AccountService::updateProfile($request);
        // todo
        return response()->json();
    }
}
