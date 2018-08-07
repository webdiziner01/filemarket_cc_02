<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;


    protected $fillable = ['title', 'overview_short', 'overview', 'price', 'live', 'approved','finished'];


    public function getRouteKeyName(){
        return 'identifier';
    }

// this is like model observers, alex has course on it.
    protected static function boot(){
        parent::boot();

        static::creating(function($file){

            $file->identifier = uniqid(true);
        });

    }


    public function user(){

        return $this->belongsTo(User::class);

    }



}
