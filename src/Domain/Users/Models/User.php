<?php

namespace Domain\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function fullname()
    {
        return "{$this->firstname} {$this->lastname}";
    }
}
