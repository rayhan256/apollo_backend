@extends('layouts/main')
@section('chart')
    <div class="panel-header panel-header-sm"></div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">
                    @if (Session::has('pesan'))
                        <div class="alert alert-success">{{ Session::get('pesan') }}</div>
                    @endif
                    <div class="card-title">
                        <h4>Portfolios</h4>
                    </div>
                    <a href="{{ route('createPortfolio') }}" class="btn btn-primary">Add Portfolio</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Project Name</th>
                                    <th>Client</th>
                                    <th>Project Date</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($data as $portfolio)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $portfolio->name }}</td>
                                        <td>{{ $portfolio->client }}</td>
                                        <td>{{ $portfolio->project_date }}</td>
                                        <td>{{ $portfolio->category->name }}</td>
                                        <td>
                                            <a href="/cms/portfolios/{{ $portfolio->id }}"
                                                class="btn btn-primary">View</a>
                                            <a href="/cms/portfolios/destroy/{{ $portfolio->id }}"
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
