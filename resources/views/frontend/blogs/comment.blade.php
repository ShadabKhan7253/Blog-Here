<div class="container-fluid">
    <h5><i class="fa fa-comments-o mb25 mr-2"></i> {{ $blog->comments->count() }} Comments</h5>
    {{-- <div class="card panel panel-default p20"> --}}
    @if ($blog->comments->count() > 0)
        @foreach ($blog->comments as $comment)
            <div class="container">
                <div class="row">
                    <div class="col-md-1 mb20">
                        <a href="#">
                            <img class="#" style="border-radius: 50%" height="70px" width="70px"
                                src="{{ asset($comment->image_path) }}" alt="...">
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row d-flex">
                                <div class="col-md-5">
                                    <h4 class="">{{ $comment->author->name }}</h4>
                                </div>
                                <div class="col-md-3 align-self-center">
                                    <p class=""> - {{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a href="#!" class=""><i class="fa fa-reply"></i><span class="small">
                                    reply</span></a>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Shadab Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur
                                    minus eos repellendus fuga, est et ut, deserunt harum quibusdam distinctio
                                    ducimus, dolores deleniti unde amet tempora illum atque laborum repudiandae.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <hr>
        @endforeach
    @endif

    <div class="blog-post-leave-comment @if (!auth()->check()) cursor-not-allowed relative p-10 @endif">
        @if (!auth()->check())
            <div
                class="absolute center flex transition-all top-0 right-0 left-0 bottom-0 bg-gray-300 bg-opacity-70 h4 justify-center items-center p-4 text-danger">
                <a href="{{ route('login') }}" class="link-danger">You need to be logged in to post comments.</a>
            </div>
        @endif
        <h5><i class="fa fa-comment mt25 mb25 mr-2"></i> Leave Comment</h5>

        <form action="#" method="POST" id="commentForm">
            @csrf
            <input type="hidden" name="post_id" id="post_id" value="{{ $blog->id }}">
            <div id="reply"></div>
            <textarea id="comment" name="comment" class="blog-leave-comment-textarea text-3xl" placeholder="Write here..."></textarea>
            <div class="color-pasific text-2xl">{{ session()->get('posted') }}</div>
            <button type="submit" id="submit" class="button button-pasific button-sm center-block mb25 mt-6">Post
                Comment</button>
        </form>

    </div>

    {{-- </div> --}}
</div>
