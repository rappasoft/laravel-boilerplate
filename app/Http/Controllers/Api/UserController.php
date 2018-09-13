<?php
/**
 * Created by PhpStorm.
 * User: ignacio
 * Date: 12/09/18
 * Time: 08:19 PM
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user()
    {
        return response()->json(['user' => Auth::user()]);
    }
}
