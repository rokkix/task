<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name','training'];

    public function training() {
        return $this->belongsToMany('App\Training','tag_training');
    }

    public function setTrainingAttribute($training)
    {
        $this->training()->detach();
        if ( ! $training) return;
        if ( ! $this->exists) $this->save();
        $this->training()->attach($training);
    }
}
