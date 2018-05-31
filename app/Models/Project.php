<?php

namespace App\Models;

class Project extends BaseModel
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function files() {
    	return $this->hasMany(File::class);
    }
}
