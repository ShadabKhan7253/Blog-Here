@extends('frontend.layout.app')

@section('content')
    <header class="pt100 pb100 parallax-window-2" data-parallax="scroll" data-speed="0.5"
        data-image-src="{{ asset('frontend/assets/img/bg/img-bg-17.jpg') }}" data-positiony="1000">
        <div class="intro-body text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt50">
                        <h1 class="brand-heading font-montserrat text-uppercase color-light" data-in-effect="fadeInDown">
                            Blog-Here
                            <small class="color-light alpha7">Heaven for Bloggers!</small>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Blog Area -->
    <section id="blog" class="pt75 pb50">
        <div class="container">

            <div class="row">
                <div class="col-md-9">

                    <div class="blog-three-mini">
                        <h2 class="color-dark">
                            <a href="#">{{ $blog->title }}</a>
                        </h2>
                        <div class="blog-three-attrib">
                            <div><i class="fa fa-calendar"></i>{{ $blog->published_at->diffForHumans() }}</div> |
                            <div><i class="fa fa-pencil"></i><a href="#">{{ $blog->author->name }}</a></div> |
                            <div><i class="fa fa-comment-o"></i><a
                                    href="{{ route('frontend.category', $blog->category_id) }}">{{ $blog->category->name }}</a>
                            </div> |
                            <div><a href="#"><i class="fa fa-thumbs-o-up"></i></a>150 Likes</div> |
                            <div>
                                Share: <a href="#"><i class="fa fa-facebook-official"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>

                        <img src="{{ asset($blog->image_path) }}" alt="Blog Image" class="img-responsive mb15">
                        {!! $blog->body !!}


                        <div class="blog-post-read-tag mt50">
                            <i class="fa fa-tags"></i> Tags:
                            @foreach ($blogTags as $tag)
                                <a href="{{ route('frontend.tag', $tag->id) }}"> {{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    @include('frontend.blogs.comment')
                    {{-- <div id="disqus_thread"></div>
                    <script>
                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                        /*
                        var disqus_config = function () {
                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        */
                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document,
                                s = d.createElement('script');
                            s.src = 'https://blog-website-10.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                            powered by Disqus.</a></noscript> --}}
                </div>
                <!-- Blog Sidebar
                                                                                                                                                ===================================== -->
                <div id="sidebar" class="col-md-3 mt50 animated" data-animation="fadeInRight" data-animation-delay="250">


                    <!-- Search
                                                                                                                                        ===================================== -->
                    <div class="pr25 pl25 clearfix">
                        <form action="#">
                            <div class="blog-sidebar-form-search">
                                <input type="text" name="search" class="" placeholder="e.g. Javascript">
                                <button type="submit" name="submit" class="pull-right"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </form>

                    </div>


                    <!-- Categories -->
                    <div class="mt25 pr25 pl25 clearfix">
                        <h5 class="mt25">
                            Categories
                            <span class="heading-divider mt10"></span>
                        </h5>
                        <ul class="blog-sidebar pl25">
                            <li><a href="#">Programmig<span class="badge badge-pasific pull-right">14</span></a>
                            </li>
                            <li><a href="#">Java<span class="badge badge-pasific pull-right">125</span></a></li>
                            <li><a href="#">C#<span class="badge badge-pasific pull-right">350</span></a></li>
                            <li><a href="#">Web Developement<span
                                        class="badge badge-pasific pull-right">520</span></a></li>
                            <li><a href="#">Laravel<span class="badge badge-pasific pull-right">1,290</span></a>
                            </li>
                            <li><a href="#">PHP<span class="badge badge-pasific pull-right">7</span></a></li>
                        </ul>

                    </div>


                    <!-- Tag -->
                    <div class="pr25 pl25 clearfix">
                        <h5 class="mt25">
                            Popular Tags
                            <span class="heading-divider mt10"></span>
                        </h5>
                        <ul class="tag">
                            <li><a href="#">CS</a></li>
                            <li><a href="#">Education</a></li>
                            <li><a href="#">Coding</a></li>
                            <li><a href="#">Engineering</a></li>
                            <li><a href="#">Computers</a></li>
                            <li><a href="#">Softwares</a></li>
                            <li><a href="#">Programming</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
