@extends('layouts/main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Create Portfolio</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/cms/portfolios/create" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Client</label>
                            <input type="text" name="client" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Date</label>
                            <input type="date" name="project_date" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Url (If Availabler)</label>
                            <input type="text" name="project_url" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="portfolio_category_id" class="form-control">
                                @foreach ($data as $i)
                                    <option value="{{ $i->id }}">{{ $i->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Detail / Description</label>
                            <textarea name="detail" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <input type="submit" value="Add" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
