@extends('layouts.app2')

@section('content')
<div class="container pt-3">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card my-2" style="box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);">
                <div class="card-body px-3 py-2">
                    <div class="card-title">{{ Auth::user()->name }}'s New Post</div>
                    <form id="newPost" method="POST" action="newpost">
                            {{ csrf_field() }}
                    </form>

                    <div class="text-right pb-2">
                        <label>Schedule Post</label>
                        <select class="custom-select form-control-sm" form="newPost" name="post_schedule" class="mx-2">
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
                        <textarea form="newPost" name="content" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="text-right pt-2">
                        <button form="newPost" class="btn btn-primary btn-sm">Post</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mx-auto">
            @foreach($posts as $post)

                <div class="row">
                    <div class="col mx-auto">
                        <div class="card my-2" style="box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);">
                            <div class="card-body px-3 py-2">
                                <div class="text-muted text-right">
                                    <p class="my-0 py-0" style="font-size: 9pt;">
                                        <?php 
                                            $t = new DateTime($post->post_datetime);
                                            $t->setTimeZone( new DateTimeZone($post->user_timezone)); echo $t->format('Y-m-d H:i:s (e)');
                                        ?>
                                    </p>
                                    <a href="{{ $post->user_url }}">
                                        {{ $post->user_name }}
                                    </a>
                                </div>
                                <div>
                                    {!! nl2br(e(trans($post->content))) !!}
                                </div>
                                @if(Auth::id() == $post->user_id)
                                <div class="text-right">
                                    <form method="GET" action="posteditor">
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <button class="btn btn-outline-success btn-sm">Edit</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-auto mx-auto my-3">
            {{ $posts->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
