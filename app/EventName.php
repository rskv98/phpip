<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventName extends Model
{
    protected $table = 'event_name';
    protected $primaryKey = 'code';
    public $incrementing = false;
    public $timestamps = false;
    
    public function events()
    {
    	return $this->hasMany('App\Event', 'code');
    }
    
    public function tasks()
    {
    	return $this->hasMany('App\Task', 'code');
    }
}
