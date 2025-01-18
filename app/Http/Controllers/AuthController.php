<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Modules\Home\HomeService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginView() : View|RedirectResponse
    {
    
        return view('login', [
            "title" => "Login"
        ]);
    }
}