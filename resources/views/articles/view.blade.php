@extends('layouts/main')
@section('chart')
    <div class="panel-header panel-header-sm"></div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-flex justify-content-between align-item-center">
                        <div>
                            <h4>{{ $data->name }}</h4>
                            <span>Published {{ $data->post_date }}</span>
                        </div>
                        <a href="/cms/articles/update/{{ $data->id }}" class="btn btn-primary h-50 mt-4">Update</a>
                    </div>
                </div>
                <div class="card-body">
                    <img src="data:image/jpeg;base64, {{ $data->image }}" alt="{{ $data->name }}"
                        class="img-fluid rounded h-50 mb-4">
                    {!! $data->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
