@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/style1.css') }}" rel="stylesheet">
    <div class="row d-flex justify-content-center " style="width: 100%;height: 100vh;">
        <section class="content " style="width: 50em;">
            <div class="col-md-8 col-md-offset-2 col-lg-12" >
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-info">
                        {{Session::get('success')}}
                    </div>
                @endif



                <div class="form" >

                    <ul class="tab-group">
                        <li class="tab active"><a href="{{route('index')}}"><- GO BACK</a></li>

                    </ul>

                    <div class="tab-content">
                        <div id="signup">
                            <h1>Zona Usuario</h1>

                            <form action="{{ route('user.validate') }}" method="post" role="form">
                                {{ csrf_field() }}

                                <div class="top-row">
                                    <div class="field-wrap">
                                        <label>
                                            Email<span class="req"></span>
                                        </label>
                                        <input type="text" class="form-control" id="titulo" name="email" value="">
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            Password<span class="req">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="titulo" name="password" value="">
                                    </div>
                                </div>

                                <button type="submit" class="button button-block"/>Login</button>



                            </form>

                        </div>

                        <div id="login">
                            <h1>Welcome Back!</h1>

                            <form action="/" method="post">

                                <div class="field-wrap">
                                    <label>
                                        Email Address<span class="req">*</span>
                                    </label>
                                    <input type="email"required autocomplete="off"/>
                                </div>

                                <div class="field-wrap">
                                    <label>
                                        Password<span class="req">*</span>
                                    </label>
                                    <input type="password"required autocomplete="off"/>
                                </div>

                                <p class="forgot"><a href="#">Forgot Password?</a></p>

                                <button class="button button-block"/>Log In</button>

                            </form>

                        </div>

                    </div><!-- tab-content -->

                </div> <!-- /form -->


                <script>
                    $('#titulo1').change(function () {
                        if (this.files && this.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {

                                $('#img-profile-old').css('display','none');

                                document.getElementById('img-profile-new')
                                    .setAttribute(
                                        'src', e.target.result
                                    );

                                $('#img-profile-new').css('display','block');
                            }

                            reader.readAsDataURL(this.files[0]);
                        }
                    });
                    $(document).ready(function() {
                        $('#summernote').summernote();
                        $('#summernote2').summernote();

                    });
                    $('.form').find('input, textarea').on('keyup blur focus', function (e) {

                        var $this = $(this),
                            label = $this.prev('label');

                        if (e.type === 'keyup') {
                            if ($this.val() === '') {
                                label.removeClass('active highlight');
                            } else {
                                label.addClass('active highlight');
                            }
                        } else if (e.type === 'blur') {
                            if( $this.val() === '' ) {
                                label.removeClass('active highlight');
                            } else {
                                label.removeClass('highlight');
                            }
                        } else if (e.type === 'focus') {

                            if( $this.val() === '' ) {
                                label.removeClass('highlight');
                            }
                            else if( $this.val() !== '' ) {
                                label.addClass('highlight');
                            }
                        }

                    });

                    $('.tab a').on('click', function (e) {

                        e.preventDefault();

                        $(this).parent().addClass('active');
                        $(this).parent().siblings().removeClass('active');

                        target = $(this).attr('href');

                        $('.tab-content > div').not(target).hide();

                        $(target).fadeIn(600);

                    });



                </script>

                <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>
@endsection
