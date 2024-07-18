<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class review extends Model
{
    use HasFactory;
    protected $fillable=['rating','review','user_id'];
    public function book(){
        return $this->belongsTo(book::class);
    }
    public function user(){
        return $this->belongsTo(user::class);
    }
    
}
