@extends('layouts.app2')

@section('content')
<div class="container pt-3">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <div class="row">
        <div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
            <div class="card my-2" style="box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);">
                <div class="card-body px-2 py-2">

                    <form id="updatePost" method="POST" action="updatepost">
                        {{ csrf_field() }}
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                    </form>
                    <form id="deletePost" method="POST" action="deletepost">
                        {{ csrf_field() }}
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                    </form>

                    <div class="text-right pb-2">
                        <label>Schedule Post</label>
                        <select class="custom-select form-control-sm" form="updatePost" name="post_schedule" class="mx-2">
                            <option class="form-control" value="now">Now</option>
                            <option value="1h">1 hour later</option>
                            <option value="3h">3 hours later</option>
                            <option value="6h">6 hours later</option>
                            <option value="12h">12 hours later</option>
                            <option value="1d">1 day later</option>
                            <option value="3d">3 days later</option>
                            <option value="1w">1 week later</option>
                        </select>
                    </div>

                    <div>
                        <textarea form="updatePost" name="content" class="form-control" rows="19">{{ $post->content }}</textarea>
                    </div>

                    <div class="row pt-2">
                        <div class="col">
                            <button form="deletePost" class="btn btn-outline-danger btn-sm">Delete</button>
                        </div>
                        <div class="col text-right">
                            <button form="updatePost" class="btn btn-success btn-sm">Update</button>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
