<?php

namespace Majdi\SecureLoginSystem\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Majdi\SecureLoginSystem\Models\User;

class SecurityService
{
    /**
     * Authenticate user.
     */
    public function authenticate($credentials)
    {
        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return true;
        }

        return false;
    }

    // Other security-related functions.
}
