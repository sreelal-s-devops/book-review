<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $fillable=['name','author' ];
    public function review(){
        return $this->hasMany(review::class);
    }
    public function scopeMostReviewed(Builder $query): Builder | QueryBuilder {
        return $query->withcount('review')->withavg('review','rating')->having('review_avg_rating','>','3.0')->orderbyDesc('review_count')->orderByDesc('review_avg_rating')->limit(5);
    }
    public function scopeHighestRated( Builder $query):Builder |QueryBuilder{
        return $query->withavg('review','rating')->withcount('review')->having('review_count','>=','5')->orderByDesc('review_avg_rating')->limit(5);
    }
    public function scoperating(Builder $query):Builder{
        return $query->withavg('review','rating')->withCount('review');
    }
    public function scopeTitle(Builder $query, string $title):Builder{
        return $query->where('name','LIKE', '%'.$title.'%');
    }
    public function scopeMostCommented(Builder $query ):Builder{
        return $query->withCount('review')->orderByDesc('review_count');
    }
    public function scopeLatest(Builder $query):Builder{
        return $query->orderBydesc('created_at');
    }
  public function user(){
    return $this->hasManyThrough(user::class,review::class);
  }
}
