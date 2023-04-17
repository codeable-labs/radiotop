<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    public function artist(){
        return $this->belongsTo(Artist::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function banners(){
        return $this->hasMany(Banner::class);
    }
}
