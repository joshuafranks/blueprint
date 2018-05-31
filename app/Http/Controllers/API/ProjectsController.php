<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\ProjectRequest;
use App\Interfaces\ProjectEloquentInterface;
use App\Http\Resources\ProjectResource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
	 /**
     * @var ProjectEloquentInterface
     */
    protected $projects;

    /**
     * ProjectsController constructor.
     *
     * @param ProjectEloquentInterface $projects
     */
    public function __construct(ProjectEloquentInterface $projects)
    {
        $this->projects = $projects;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function show($id) {
		$project = $this->projects->find($id, ['files']);
		return new ProjectResource($project);
	}
}
