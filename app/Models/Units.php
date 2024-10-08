<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tenant()
    {
        return $this->hasOne(Tenants::class,'unit','id');
    }
}
