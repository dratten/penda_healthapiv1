<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    public function category()
    {
        return $this->hasOne(Category);
    }
}
