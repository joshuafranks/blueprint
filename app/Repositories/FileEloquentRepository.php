<?php namespace App\Repositories;

use App\Interfaces\FileEloquentInterface;
use App\Models\File;

class FileEloquentRepository extends BaseEloquentRepository implements FileEloquentInterface
{
    protected $modelName = File::class;
}
