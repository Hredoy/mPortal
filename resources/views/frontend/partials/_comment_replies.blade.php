@foreach ($comments as $reply)
    <!-- reply comment -->
    <div class="cl-comment-reply" id="reply{{ $comment->id }}}">
        <div class="cl-avatar"><a href="#"><img style=" height: 62;width: 70px;" src="{{ asset($reply->image) }}"></a>
        </div>
        <div class="cl-comment-text">
            <div class="cl-name-date"><a href="#">{{ $reply->user->name }}</a> .
                {{ $reply->created_at->diffForHumans() }}</div>
            <div class="cl-text">{{ $reply->body }}</div>
            <div class="cl-meta">
            </div>
        </div>
        @if ($reply->user->id == Auth::id())
            <span class="btn btn-sm pull-right comment-del" id="{{ $comment->id }}"><i
                    class="fa fa-minus-circle text-danger" style="font-size: 1.2em"></i></span>
        @endif
        @include('frontend.partials._comment_replies', [
            'comments' => $reply->replies,
        ])

        <div class="clearfix"></div>
    </div>
    <!-- END reply comment -->
@endforeach
