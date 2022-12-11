@extends('backend.layouts.master')
@section('content')
<div class="row">
    <div class="col"></div>
    <div class="col-6" style="margin-top: 100px">
        <h2 style="margin-bottom: -70px">Edit Task</h2>
        <form action="{{route('backend.task.update', $task->id)}}" enctype="multipart/form-data" method="post" style="margin-top: 100px">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="theme" class="form-label">Task Title</label>
                <input type="text" name="theme" value="{{$task->theme}}" class="form-control">
            </div>
            @if ($errors->has('theme'))
                <div class="alert alert-danger">
                    {{ $errors->first('theme') }}
                </div>
            @endif
            <div class="mb-3">
                <label for="theme" class="form-label">Task Description</label>
                <textarea rows="5" name="description" class="form-control">{{$task->description}}</textarea>
            </div>
            @if ($errors->has('description'))
                <div class="alert alert-danger">
                    {{ $errors->first('description') }}
                </div>
            @endif
            <div class="mb-3 form-check">
                <label for="formFileMultiple" class="form-label">Attachements</label>
                <input class="form-control" name="attachements" value="{{$task->attachements}}" type="file" id="formFileMultiple"/>
            </div>
            @if ($errors->has('attachements'))
                <div class="alert alert-danger">
                    {{ $errors->first('attachements') }}
                </div>
            @endif
            <div class="mb-3">
                <label for="start_time" class="form-label">Start Time</label>
                <input type="text" name="start_time" value="{{$task->start_time}}" class="form-control">
            </div>
            @if ($errors->has('start_time'))
                <div class="alert alert-danger">
                    {{ $errors->first('start_time') }}
                </div>
            @endif
            <div class="mb-3">
                <label for="end_time" class="form-label">End Time</label>
                <input type="text" name="end_time" value="{{$task->end_time}}" class="form-control">
            </div>
            @if ($errors->has('end_time'))
                <div class="alert alert-danger">
                    {{ $errors->first('end_time') }}
                </div>
            @endif
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_done" @if($task->is_done === 1) checked @endif value="{{$task->is_done}}">
                <label class="form-check-label">
                    Done
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <div class="col"></div>
</div>
@endsection
