@include('layouts-site/header-site')
@include('layouts-site/nav')
@include('layouts-site/top')

<div class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            @yield('content')

        </div><!-- /.blog-main -->

    </div><!-- /.row -->

</div><!-- /.container -->
<br>
<br>
<br>
@include('layouts-site/footer')