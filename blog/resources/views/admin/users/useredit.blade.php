@extends('layouts.admin')
@section('content')
    <link href="{{ asset('css/style1.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

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
                        <li class="tab active"><a href="{{route('admin.index')}}"><- GO BACK</a></li>
                        <li class="tab"><a href="{{ route('admin.user.delete',[$user->id])}}">DELETE</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="signup">
                            <h1>EDICIÓN DE USUARIO</h1>

                            <form action="{{ route('admin.user.update',[$user->id]) }}" enctype="multipart/form-data" method="post" role="form">
                                {{ csrf_field() }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="top-row">
                                    <div class="field-wrap">
                                        <label>
                                            Nombre<span class="req"></span>
                                        </label>
                                        <input type="text" class="form-control" id="titulo" name="name" value="{!!$user->name !!}">
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            Apellidos<span class="req"></span>
                                        </label>
                                        <input type="text" class="form-control" id="titulo" name="lastname" value="{!!$user->lastname !!}">
                                    </div>
                                </div>
                                <div class="top-row">
                                    <div class="field-wrap">
                                        <label>
                                            Email<span class="req"></span>
                                        </label>
                                        <input type="text" class="form-control" id="titulo" name="email" value="{!!$user->email !!}">
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            Password<span class="req">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="titulo" name="password" value="{!!$user->password !!}">
                                    </div>
                                </div>
                                <div class="top-row">
                                    <div class="field-wrap">
                                        <label>
                                            Telefono<span></span>
                                        </label><input type="hidden" class="form-control" id="" name="id" value="{!!$user->id !!}">
                                        <input type="text" class="form-control" id="titulo" name="telephone" value="{!!$user->telephone !!}">
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            Rol<span class="req">*</span>
                                        </label>

                                        <select name="role_id" class="input-matric-redmdi input-text-standard input_text text-size  form-control" style="border-bottom-color:  #40c1ac;">
                                            <option >Seleccione rol</option>
                                            @foreach(\App\Models\UserRoles::where('id','>',0)->get() as $rol )
                                                <option value="{{$rol->id}}" class="form-control" id="chiscat" name="role_id" selected >{{$rol->name}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>







                                <button type="submit" class="button button-block"/>Update User</button>



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
