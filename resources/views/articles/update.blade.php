@extends('layouts/main')
<style type="text/css">
    .bootstrap-tagsinput {
        width: 100%;
    }

    .label-info {
        background-color: #012b20;

    }

    .label {
        display: inline-block;
        padding: .4em .4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out,
            border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

</style>
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Update Article</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateArticle') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Date</label>
                            <input type="date" name="post_date" id="" class="form-control" value="{{ $data->post_date }}">
                        </div>
                        <div class="form-group">
                            <label for="">Tag</label>
                            <input type="text" name="tag" data-role="tagsinput" class="form-control"
                                value="{{ $data->tag }}">
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category" id="" class="form-control">
                                <option value="{{ $data->category }}">{{ $data->category }}</option>
                                <option value="Bussiness">Bussiness</option>
                                <option value="Design">Design</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Programming">Programming</option>
                            </select>
                        </div>
                        <div class="row mx-3">
                            <div class="form-group">
                                <label for="image" class="btn btn-outline-primary">Upload Image</label>
                                <input type="file" name="image" id="image" class="form-control-file">
                            </div>
                            <img src="data:image/jpeg;base64, {{ $data->image }}" id="img" alt="name"
                                class="img-fluid rounded w-50 ml-3">
                        </div>
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea name="content" id="content" class="form-control" id="" cols="30" rows="10">
                                        {{ $data->content }}
                                     </textarea>
                        </div>
                        <input type="submit" value="Update" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        CKEDITOR.replace('content')
    </script>
    <script>
        const img = document.querySelector('#img');
        image.onchange = e => {
            const [file] = image.files
            if (file) {
                img.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
