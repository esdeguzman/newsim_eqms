<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function cpars() {
        return $this->hasMany(CPAR::class);
    }
}
