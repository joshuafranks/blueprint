@extends('common.template')

@section('heading')
    Viewing Project: {{ $project->name }}
@stop

@section('content')
	<div class="box box-primary">
        <div class="box-body no-padding">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Uploaded</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($project->files as $file)
                        <tr>
                            <td>{{ $file->name }}</td>
                            <td>{{ $file->created_at }}</td>
                            <td>
                                <a href="{{ route('files.show', [$file->id]) }}">Download</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {!! Form::open(array('route' => array('projectfiles.store', $project->id), 'files' => true)) !!}
    @include('files.partials.form')
@stop
