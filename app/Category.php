<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'matter_category';
    protected $primaryKey = 'code';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $hidden = ['creator', 'created_at', 'updated_at', 'updater'];
    protected $guarded = ['created_at', 'updated_at'];

    public function matter() {
        return $this->hasMany('App\Matter');
    }

    public function displayWithInfo() {
        return $this->belongsTo('App\Category', 'display_with', 'code');
    }
}
