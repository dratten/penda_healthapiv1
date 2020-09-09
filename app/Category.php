<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function notification()
    {
        return $this->belongsTo(Notifications);
    }
}
