<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class File extends BaseModel
{
    protected $fillable = [
    	'project_id',
    	'name', 
    	'path',
    ];

    public function project() {
    	return $this->belongsTo(Project::class);
    }

    public function size() {
    	return human_filesize(Storage::size($this->path));
    }

    public function mimeType() {
    	return Storage::mimeType($this->path);
    }

    public function lastModified() {
    	return Carbon::createFromTimeStamp(Storage::lastModified($this->path));
    }
}
