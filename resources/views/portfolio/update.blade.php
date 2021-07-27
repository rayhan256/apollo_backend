@extends('layouts/main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Update Portfolio</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/cms/portfolios/update" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Client</label>
                            <input type="text" name="client" class="form-control" value="{{ $data->client }}">
                        </div>
                        <div class="form-group">
                            <label for="">Date</label>
                            <input type="date" name="project_date" id="" class="form-control"
                                value="{{ $data->project_date }}">
                        </div>
                        <div class="form-group">
                            <label for="">Url (If Availabler)</label>
                            <input type="text" name="project_url" class="form-control" value="{{ $data->project_url }}">
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="portfolio_category_id" class="form-control">
                                <option value="{{ $data->portfolio_category_id }}">current</option>
                                @foreach ($categories as $i)
                                    <option value="{{ $i->id }}">{{ $i->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Detail / Description</label>
                            <textarea name="detail" id="" cols="30" rows="10"
                                class="form-control">{{ $data->detail }}</textarea>
                        </div>
                        <input type="submit" value="Add" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
