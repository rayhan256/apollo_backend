<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>
@extends('layouts/main')
@section('chart')
    <div class="panel-header panel-header-lg">
        <canvas id="bigDashboardChart"></canvas>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-tasks">
                <div class="card-header ">
                    @if (Session::has('pesan'))
                        <div class="alert alert-success fade show">{{ Session::get('pesan') }}</div>
                    @endif
                    <h5 class="card-category">Near Todo</h5>
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Tasks</h4>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
                                class="now-ui-icons ui-1_simple-add"></i> Add Task</button>
                    </div>
                </div>
                <div class="card-body ">
                    @if ($tasks->count() <= 0)
                        <center>
                            No Tasks Available
                        </center>
                    @else
                        <div class="table-full-width table-responsive">
                            <table class="table">
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>
                                                <span
                                                    class="badge {{ $task->user->name == $user->name ? 'badge-primary' : 'badge-warning' }} p-2">{{ $task->user->name }}</span>
                                            </td>
                                            <td class="text-left">{{ $task->name }}</td>
                                            <td class="text-left"><span
                                                    class="{{ $task->status == true ? 'text-success' : 'text-warning' }}">
                                                    {{ $task->status == true ? 'Finished' : 'Progress' }}</span></td>
                                            <td class="td-actions text-right">
                                                <form action="/cms/updateTask/{{ $task->id }}" method="post">
                                                    @csrf
                                                    <button type="submit" rel="tooltip" title=""
                                                        class="btn btn-primary btn-round btn-icon btn-icon-mini btn-neutral"
                                                        data-original-title="Update"
                                                        {{ $task->user->name != $user->name ? 'disabled' : '' }}>
                                                        <i class="now-ui-icons ui-1_check"></i>
                                                    </button>
                                                </form>
                                                @if ($task->user->name != $user->name)
                                                    <div></div>
                                                @else
                                                    <a href="/cms/deleteTask/{{ $task->id }}"
                                                        class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral"
                                                        data-original-title="Remove" aria-disabled="true">
                                                        <i class="now-ui-icons ui-1_simple-remove"></i>
                                                    </a>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="now-ui-icons loader_refresh spin"></i> List Todo
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Todo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('createTask') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Task</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
