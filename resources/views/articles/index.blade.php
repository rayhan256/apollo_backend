@extends('layouts/main')
@section('chart')
    <div class="panel-header panel-header-sm"></div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if (Session::has('pesan'))
                        <div class="alert alert-success mt-2">{{ Session::get('pesan') }}</div>
                    @endif
                    <div class="card-title">
                        <h4>Article</h4>
                        <a href="{{ route('createView') }}" class="btn btn-primary">Add Article</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Published Date</th>
                                    <th>Post By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($data as $article)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $article->name }}</td>
                                        <td>{{ $article->post_date }}</td>
                                        <td>{{ $article->user->name }}</td>
                                        <td>
                                            <a href="/cms/articles/{{ $article->id }}" class="btn btn-primary">View</a>
                                            <a href="/cms/articles/delete/{{ $article->id }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
