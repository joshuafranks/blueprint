<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Interfaces\FileEloquentInterface;
use Illuminate\Http\RedirectResponse;

class FilesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = $this->files->paginate('created_at', ['project']);

        return view('files.index', compact('files'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = $this->files->find($id);
        return response()->download(storage_path('app/' . $file->path), $file->name);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param FileRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(FileRequest $request, $id)
    {
        app()->abort(404, 'Not implemented');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        app()->abort(404, 'Not implemented');
    }
}
