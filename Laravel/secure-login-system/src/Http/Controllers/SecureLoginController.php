<?php

namespace Majdi\SecureLoginSystem\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Majdi\SecureLoginSystem\Http\Requests\SecureLoginRequest;
use Majdi\SecureLoginSystem\Services\SecurityService;

class SecureLoginController extends Controller
{
    protected $securityService;

    public function __construct(SecurityService $securityService)
    {
        $this->securityService = $securityService;
    }

    /**
     * Show the secure login form.
     */
    public function showLoginForm()
    {
        return view('secure-login::secure-login');
    }

    /**
     * Handle secure login request.
     */
    public function login(SecureLoginRequest $request)
    {
        $validated = $request->validated();

        // Process login
        if ($this->securityService->authenticate($validated)) {
            // Login successful
            return redirect()->intended('dashboard');
        }

        // Login failed
        return redirect()->back()->withErrors(['login' => 'Invalid credentials.']);
    }
}
