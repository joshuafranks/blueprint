@extends('common.template')

@section('heading')
    Viewing All Files
@stop

@section('content')
	<div class="box box-primary">
        <div class="box-body no-padding">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Project</th>
                        <th>Uploaded</th>
                        <th>Details</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($files as $file)
                        <tr>
                            <td>{{ $file->name }}</td>
                            <td><a href="{{ route('projects.show', ['id' => $file->project->id]) }}">{{ $file->project->name }}</a></td>
                            <td>{{ $file->created_at }}</td>
                            <td>
                                Path: {{ $file->path }}<br><br>
                                Size: {{ $file->size() }}<br>
                                Mime: {{ $file->mimeType() }}<br>
                                Last Modified: {{ $file->lastModified() }}
                            </td>
                            <td>
                                <a href="{{ route('files.show', [$file->id]) }}">Download</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
