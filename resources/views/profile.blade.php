@extends('layouts/main')
@section('chart')
    <div class="panel-header panel-header-sm"></div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Edit Profile</h5>
                </div>
                <div class="card-body">
                    <form action="/cms/profiles/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fullname</label>
                                    <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email (disabled)</label>
                                    <input type="text" name="email" class="form-control" value="{{ $data->email }}"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Link Instagram</label>
                                    <input type="text" class="form-control" name="instagram"
                                        value="{{ $data->instagram }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Link Twitter</label>
                                    <input type="text" class="form-control" name="twitter" value="{{ $data->twitter }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Link Facebook</label>
                                    <input type="text" class="form-control" name="facebook" value="{{ $data->facebook }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Link Linkedin</label>
                                    <input type="text" class="form-control" name="linkedin" value="{{ $data->linkedin }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-grup">
                            <label for="">Link Github</label>
                            <input type="text" class="form-control" name="github" value="{{ $data->github }}">
                        </div>
                        <div class="form-group">
                            <label for="">Bio</label>
                            <textarea name="bio" id="" cols="30" rows="10"
                                class="form-control">{{ $data->bio }}</textarea>
                        </div>
                        <input type="submit" value="Update Profile" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <img src="../assets/img/bg5.jpg" alt="...">
                </div>
                <div class="card-body">
                    <div class="author">
                        <form action="/cms/profiles/update" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="pic" style="cursor: pointer !important;"><img class="avatar border-gray"
                                        src="{{ $data->image == null ? '../assets/img/mike.jpg' : 'data:image/jpeg;base64, ' . $data->image }}"
                                        id="img" alt="..."></label>
                                <h5 class="title">{{ $data->name }}</h5>
                                <input type="file" name="image" id="pic" class="form-control-file">
                            </div>
                            <input type="submit" value="Submit Picture" class="btn btn-outline-primary btn-sm">
                        </form>
                        <p class="description">
                            {{ $data->email }}
                        </p>
                    </div>
                    <p class="description text-center">
                        {{ $data->bio }}
                    </p>
                </div>
                <hr>
                <div class="button-container">
                    <button href="{{ $data->facebook }}" class="btn btn-neutral btn-icon btn-round btn-lg">
                        <i class="fab fa-facebook-f"></i>
                    </button>
                    <button href="{{ $data->twitter }}" class="btn btn-neutral btn-icon btn-round btn-lg">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button href="{{ $data->instagram }}" class="btn btn-neutral btn-icon btn-round btn-lg">
                        <i class="fab fa-instagram"></i>
                    </button>
                    <button href="{{ $data->linkedin }}" class="btn btn-neutral btn-icon btn-round btn-lg">
                        <i class="fab fa-linkedin"></i>
                    </button>
                    <button href="{{ $data->github }}" class="btn btn-neutral btn-icon btn-round btn-lg">
                        <i class="fab fa-github"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        pic.onchange = e => {
            const [file] = pic.files
            if (file) {
                document.querySelector('#img').src = URL.createObjectURL(file);
            }
        }
    </script>
@endsection
