@extends('backend.layouts.master')
@section('content')

    <div class="row">
        <div class="col" style="margin-top: 70px">
            <h3>All tasks</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Customer Email</th>
                    <th scope="col">File Link</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Start date/time</th>
                    <th scope="col">End date/time</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($tasks as $task)
                    <tr>
                        <td>{{$task->id}}</td>
                        @if($task->is_done === 1)
                            <td style="text-decoration: line-through">{{$task->theme}}</td>
                        @else
                            <td>{{$task->theme}}</td>
                        @endif
                        <td>{{$task->description}}</td>
                        <td>{{$task->customer->first_name}}</td>
                        <td>{{$task->customer->email}}</td>
                        <td>[<a href="#">{{$task->attachements}}</a>]</td>
                        <td>{{\Carbon\Carbon::parse($task->created_at)->format('d M Y')}}</td>
                        <td>{{\Carbon\Carbon::parse($task->start_time)->format('d-M H:i')}}</td>
                        <td>{{\Carbon\Carbon::parse($task->end_time)->format('d-M H:i')}}</td>
                        <td><a href="{{route('backend.task.edit', [$task->id])}}">Edit</a></td>
                    </tr>
                @empty
                    <tr>No data</tr>
                @endforelse
                </tbody>
            </table>
            <div>{{$tasks->links()}}</div>
        </div>

    </div>
@endsection
