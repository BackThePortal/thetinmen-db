<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group Auth management
 */
class UserController extends Controller
{
    /**
     * Get user information
     *
     *
     * @authenticated
     */
    public function __invoke(Request $request)
    {
        return $request->user();
    }
}
