@extends('frontend.layout.app')

@section('content')

    <!-- Blog Area
                                                ===================================== -->
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

                        <img src="{{ asset($blog->image_path) }}" alt="Blog Image" class="img-responsive">
                        {!! $blog->body !!}


                        <div class="blog-post-read-tag mt50">
                            <i class="fa fa-tags"></i> Tags:
                            @foreach ($blogTags as $tag)
                                <a href="{{ route('frontend.tag', $tag->id) }}"> {{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    {{-- <div class="blog-post-author mb50 pt30 bt-solid-1">
                        <img src="assets/img/other/photo-1.jpg" class="img-circle" alt="image">
                        <span class="blog-post-author-name">John Boo</span> <a href="https://twitter.com/booisme"><i
                                class="fa fa-twitter"></i></a>
                        <p>
                            Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi
                            ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate
                            velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla
                            pariatur.
                        </p>
                    </div> --}}


                    <div class="blog-post-comment-container">
                        <h5><i class="fa fa-comments-o mb25"></i> 20 Comments</h5>

                        <div class="blog-post-comment">
                            <img src="assets/img/other/photo-2.jpg" class="img-circle" alt="image">
                            <span class="blog-post-comment-name">John Boo</span> Jan. 20 2016, 10:00 PM
                            <a href="#" class="pull-right text-gray"><i class="fa fa-comment"></i> Reply</a>
                            <p>
                                Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                                consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
                            </p>
                        </div>

                        <div class="blog-post-comment">
                            <img src="assets/img/other/photo-4.jpg" class="img-circle" alt="image">
                            <span class="blog-post-comment-name">John Boo</span> Jan. 20 2016, 10:00 PM
                            <a href="#" class="pull-right text-gray"><i class="fa fa-comment"></i> Reply</a>
                            <p>
                                Adipisci velit sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam.
                            </p>

                            <div class="blog-post-comment-reply">
                                <img src="assets/img/other/photo-2.jpg" class="img-circle" alt="image">
                                <span class="blog-post-comment-name">John Boo</span> Jan. 20 2016, 10:00 PM
                                <a href="#" class="pull-right text-gray"><i class="fa fa-comment"></i> Reply</a>
                                <p>
                                    Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil
                                    molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
                                </p>
                            </div>

                        </div>

                        <div class="blog-post-comment">
                            <img src="assets/img/other/photo-1.jpg" class="img-circle" alt="image">
                            <span class="blog-post-comment-name">John Boo</span> Jan. 20 2016, 10:00 PM
                            <a href="#" class="pull-right text-gray"><i class="fa fa-comment"></i> Reply</a>
                            <p>
                                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consectetur adipisci velit.
                            </p>
                        </div>

                        <button class="button button-default button-sm center-block button-block mt25 mb25">Load More
                            Comments</button>


                    </div>

                    <div class="blog-post-leave-comment">
                        <h5><i class="fa fa-comment mt25 mb25"></i> Leave Comment</h5>

                        <form>
                            <input type="text" name="name" class="blog-leave-comment-input" placeholder="name"
                                required>
                            <input type="email" name="name" class="blog-leave-comment-input" placeholder="email"
                                required>
                            <input type="url" name="name" class="blog-leave-comment-input" placeholder="website">
                            <textarea name="message" class="blog-leave-comment-textarea"></textarea>
                            <button class="button button-pasific button-sm center-block mb25">Leave Comment</button>
                        </form>

                    </div>

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


                    <!-- Categories
                                                                ===================================== -->
                    <div class="mt25 pr25 pl25 clearfix">
                        <h5 class="mt25">
                            Categories
                            <span class="heading-divider mt10"></span>
                        </h5>
                        <ul class="blog-sidebar pl25">
                            <li class="active"><a href="#">Programmig<span
                                        class="badge badge-pasific pull-right">14</span></a>
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


                    <!-- Tags
                                                                ===================================== -->
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

            <div class="row mt35 animated" data-animation="fadeInUp" data-animation-delay="800">
                <div class="col-md-6">
                    <a href="#" class="button button-dark button-sm pull-right">Prev</a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="button button-dark button-sm pull-left">Next</a>
                </div>
            </div>

        </div>
    </section>
