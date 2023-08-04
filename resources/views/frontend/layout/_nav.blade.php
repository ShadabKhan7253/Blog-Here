<!-- Navigation Area
===================================== -->
<nav class="navbar navbar-pasific navbar-mp megamenu navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">
                <img src="{{ asset('frontend/assets/img/logo/logo-default2.png') }}" alt="logo">
                Blog-Here
            </a>
        </div>

        <div class="navbar-collapse collapse navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.html" data-toggle="dropdown" class="dropdown-toggle color-light">Home </a>
                </li>
                <li>
                    <a href="{{ route('login') }}" class="dropdown-toggle color-light">Login </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
