<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
class File extends Model
{
    use SoftDeletes;
    const APPROVAL_PROPERTIES = [
        'title','overview_short','overview'
    ];

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


    public function scopeFinished(Builder $builder)
    {
        return $builder->where('finished',true);
    }


    public function isFree()
    {
        return $this->price == 0;
    }

    public function needsApproval(array $approvalProperties){
        if($this->currentPropertiesDifferToGiven($approvalProperties)){


            return true;

        }


        return false;
    }


    protected function currentPropertiesDifferToGiven(array $properties){

        return array_only($this->toArray(), self::APPROVAL_PROPERTIES) != $properties;
    }


    public function approvals(){
        return $this->hasMany(FileApproval::class);
    }


    public function user(){

        return $this->belongsTo(User::class);

    }



}
