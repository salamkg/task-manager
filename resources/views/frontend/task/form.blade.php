@extends('frontend.layouts.master')
@section('content')
<div class="row">
    <div class="col"></div>
    <div class="col-6" style="margin-top: 100px">
        <h2 style="margin-bottom: -70px">Create New Task</h2>
        <form action="{{route('frontend.task.create')}}" method="post" style="margin-top: 100px" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="theme" class="form-label">Task Title</label>
                <input type="text" name="theme" class="form-control">
            </div>
            @if ($errors->has('theme'))
                <div class="alert alert-danger">
                    {{ $errors->first('theme') }}
                </div>
            @endif
            <div class="mb-3">
                <label for="theme" class="form-label">Task Description</label>
                <textarea rows="5" name="description" class="form-control"></textarea>
            </div>
            @if ($errors->has('description'))
                <div class="alert alert-danger">
                    {{ $errors->first('description') }}
                </div>
            @endif
            <div class="mb-3 form-check">
                <label class="form-label">Attachements</label>
                <input class="form-control" name="attachements" type="file" multiple />
            </div>
            @if ($errors->has('attachements'))
                <div class="alert alert-danger">
                    {{ $errors->first('attachements') }}
                </div>
            @endif
            <div class="mb-3">
                <label for="start_time" class="form-label">Start Time</label>
                <input type="text" name="start_time" placeholder="Example: 09:00" class="form-control">
            </div>
            @if ($errors->has('start_time'))
                <div class="alert alert-danger">
                    {{ $errors->first('start_time') }}
                </div>
            @endif
            <div class="mb-3">
                <label for="end_time" class="form-label">End Time</label>
                <input type="text" name="end_time" placeholder="Example: 13:00" class="form-control">
            </div>
            @if ($errors->has('end_time'))
                <div class="alert alert-danger">
                    {{ $errors->first('end_time') }}
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col"></div>
</div>
@endsection
