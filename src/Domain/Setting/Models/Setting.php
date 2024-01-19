<?php

namespace Domain\Setting\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    protected $primaryKey = 'key';
    protected $keyType = 'string';
    public $timestamps = false;

}
