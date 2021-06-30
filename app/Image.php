<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    public $timestamps = false;
    
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
