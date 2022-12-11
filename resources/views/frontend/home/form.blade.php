@extends('frontend.layouts.master')
@section('content')

    <div class="row">
        <div class="col"></div>
        <div class="col-6">
            <form style="margin-top: 100px">
                <div class="mb-3">
                    <label for="theme" class="form-label">Task Title</label>
                    <input type="text" class="form-control">
{{--                    <div class="form-text">We'll never share your email with anyone else.</div>--}}
                </div>
                <div class="mb-3">
                    <label for="theme" class="form-label">Task Description</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3 form-check">
                    <label for="formFileMultiple" class="form-label">Attachements</label>
                    <input class="form-control" type="file" id="formFileMultiple" multiple />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
@endsection
