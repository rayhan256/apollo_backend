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
                        <div class="alert alert-success">{{ Session::get('pesan') }}</div>
                    @endif
                    <div class="card-title d-flex justify-content-between">
                        <h4>Detail</h4>
                        <button class="btn btn-primary h-50 mt-4" data-toggle="modal" data-target="#exampleModal"><i
                                class="now-ui-icons ui-1_simple-add"></i> Add Image</button>
                    </div>
                    <div class="row my-3">
                        @foreach ($data->images as $item)
                            <div class="col-md-3 gallery-wrapper">
                                <a href="/cms/portfolios/destroyImage/{{ $item->id }}"
                                    class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral btn-sm delete-btn"
                                    data-original-title="Remove" aria-disabled="true">
                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                </a>
                                <img src="data:image/jpeg;base64, {{ $item->image }}" class="img-fluid portfolio-image">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Project Name</dt>
                        <dd class="col-sm-9">{{ $data->name }}</dd>

                        <dt class="col-sm-3">Client</dt>
                        <dd class="col-sm-9">
                            <p>{{ $data->client }}</p>
                        </dd>

                        <dt class="col-sm-3">Project Date</dt>
                        <dd class="col-sm-9">{{ $data->project_date }}</dd>

                        <dt class="col-sm-3 text-truncate">Project Url</dt>
                        <dd class="col-sm-9"><a href="{{ $data->project_url }}">{{ $data->project_url }} </a></dd>

                        <dt class="col-sm-3">Details</dt>
                        <dd class="col-sm-9">
                            <p>{{ $data->detail }}</p>
                        </dd>
                    </dl>
                    <a href="/cms/portfolios/update/{{ $data->id }}" class="btn btn-primary">Update</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/cms/portfolios/addImage" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label for="image" class="btn btn-outline-primary">Add Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <img src="#" alt="name" id="img" width="200" height="200" class="ml-3">
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
@section('js')
    <script>
        image.onchange = val => {
            const [file] = image.files;
            if (file) {
                document.querySelector('#img').src = URL.createObjectURL(file);
            }
        }
    </script>
@endsection
