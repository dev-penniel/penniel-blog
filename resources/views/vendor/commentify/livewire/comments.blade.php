<div>

    <section class="bg-white rounded-2xl shadow p-6 mt-6 dark:bg-gray-900">
        <div class="max-w-2xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">{{ __('Comments') }}
                    ({{$comments->total()}})</h2>
            </div>
            @auth
                @include('commentify::livewire.partials.comment-form',[
                    'method'=>'postComment',
                    'state'=>'newCommentState',
                    'inputId'=> 'comment',
                    'inputLabel'=> __('commentify::commentify.comments.your_comment'),
                    'button'=> __('commentify::commentify.comments.post_comment')
                ])
            @else
                <a class="mt-2 text-sm" href="{{ route('login', ['redirect' => request()->url()]) }}">{{ __('commentify::commentify.comments.login_to_comment') }}</a>
            @endauth
            @if($comments->count())
                @foreach($comments as $comment)
                    <livewire:comment :$comment :key="$comment->id"/>
                @endforeach
                {{$comments->links()}}
            @else
                <p>{{ __('commentify::commentify.comments.no_comments') }}</p>
            @endif
        </div>
    </section>
</div>
