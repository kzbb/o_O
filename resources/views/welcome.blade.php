@extends('layouts.app2')

@section('content')
<div class="container pt-3">
    <div class="row">
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
                                    <?php
                                        $pattern = '(https?://[-_.!~*\'()a-zA-Z0-9;/?:@&=+$,%#]+)';
                                        $replacement = '<a href="\1" target="_blank">\1</a>';
                                    ?>
                                    {!! mb_ereg_replace($pattern, $replacement, nl2br(e(trans($post->content)))) !!}
                                </div>
                                <div class="text-right" style="height: 2rem;">
                                    @if(Auth::id() == $post->user_id)
                                    <form method="GET" action="posteditor">
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <button class="btn btn-outline-success btn-sm">Edit</button>
                                    </form>
                                    @endif
                                </div>
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
