<?php

namespace Majdi\SecureLoginSystem\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Additional security features for the user model.
}
