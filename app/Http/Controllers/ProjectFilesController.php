<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Interfaces\FileEloquentInterface;
use Illuminate\Http\RedirectResponse;

class ProjectFilesController extends Controller
{
    /**
     * @var FileEloquentInterface
     */
    protected $files;

    /**
     * FilesController constructor.
     *
     * @param FileEloquentInterface $files
     */
    public function __construct(FileEloquentInterface $files)
    {
        $this->files = $files;
    }

	/**
     * Store a newly created resource in storage.
     *
     * @param  SubscriberListRequest $request
     * @return RedirectResponse
     */
    public function store(FileRequest $request, $projectId)
    {
        $path = $request->file('file')->store('files/' . $projectId);
        $this->files->store([
            'project_id' => $projectId,
            'path' => $path,
            'name' => $request->file('file')->getClientOriginalName(),
        ]);
        return redirect()->route('projects.show', ['id' => $projectId]);
    }
}
