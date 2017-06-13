<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = ['title','description','url_video','tags'];

    public function tags() {
        return $this->belongsToMany('App\Tag','tag_training');
    }

    public static function getList()
    {
        return static::lists('name', 'id');
    }
}
