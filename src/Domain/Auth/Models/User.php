<?php

namespace Domain\Auth\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const SUPER_ADMIN_ROLE_ID = 1;
}
