<?php

namespace Majdi\SecureLoginSystem\Traits;

use Illuminate\Support\Facades\Cache;

trait ThrottleLogins
{
    protected function hasTooManyLoginAttempts($request)
    {
        // Custom logic for throttling logins
    }

    protected function incrementLoginAttempts($request)
    {
        // Custom logic to increment login attempts
    }
}
