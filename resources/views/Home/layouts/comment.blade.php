<!-- Comments Form -->
@if(auth()->check())
    <div class="well">
        <h4>ثبت نظر :</h4>
        @include('Home.layouts.errors')
        <form role="form" action="/comment" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="parent_id" value="0">
            <input type="hidden" name="commentable_id" value="{{ $subject->id }}">
            <input type="hidden" name="commentable_type" value="{{ get_class($subject) }}">
            <div class="form-group">
                <textarea name="comment" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">ارسال</button>
        </form>
    </div>
@else
    <div class="alert alert-danger"><a href="{{ route('login') }}">
        شما برای ارسال نظر باید وارد سایت شوید
        </a>
    </div>
@endif

<hr>

<!-- Posted Comments -->

@foreach($comments as $comment)
    <div class="media">
        <a class="pull-right" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{ $comment->user->name }}
                <small>{{ $comment->created_at }}</small>
                <button class="pull-left btn btn-xs btn-success" data-toggle="modal" data-target="#sendCommentModal" data-parent="{{ $comment->id }}">پاسخ</button>
            </h4>
            <h5 style="color: #1d75b3">
                {!! $comment->comment !!}

            </h5>
        <!-- Nested Comment -->
            @if(count($comment->comments))
                @foreach($comment->comments as $childComment)
                    <div class="media-middle">
                        <a class="pull-right" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body"  >
                            <h5 class="media-heading " style=" ">{{ $childComment->user->name }}
                                <small>{{ $childComment->created_at }}</small>
                            </h5 >

                            <h5 style="color: #4cae4c">     {!! $childComment->comment !!} </h5>
                        </div>
                    </div>
            @endforeach
        @endif
        <!-- End Nested Comment -->
        </div>
    </div>
@endforeach
<!-- Comment -->

<div class="modal fade" id="sendCommentModal" tabindex="-1" role="dialog" aria-labelledby="sendCommentModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">ارسال پاسخ</h4>
            </div>
            <div class="modal-body">
                <form action="/comment" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="parent_id" value="0">
                    <input type="hidden" name="commentable_id" value="{{ $subject->id }}">
                    <input type="hidden" name="commentable_type" value="{{ get_class($subject) }}">

                    <div class="form-group">
                        <label for="message-text" class="control-label">متن پاسخ:</label>
                        <textarea class="form-control" id="message-text" name="comment"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">ارسال</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
