
@extends('layouts.admin')
@section('content')
    <link href="{{ asset('css/style1.css') }}" rel="stylesheet">

    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" method="POST" enctype="multipart/form-data">

                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                {!! csrf_field() !!}






        <div class="form" >

            <ul class="tab-group">
                <li class="tab active"><a href="{{route('admin.index')}}"><- GO BACK</a></li>
                <li class="tab"><a href="{{ route('admin.articulo.delete',[$publication->id])}}">DELETE</a></li>
            </ul>

            <div class="tab-content">
                <div id="signup">
                    <h1>Update Product</h1>

                    <form action="{{ route('admin.posts.update') }}" method="post">

                        <div class="top-row">
                            <div class="field-wrap">
                                <label>
                                    Name<span class="req"></span>
                                </label>
                                <input type="text" class="form-control" id="titulo" name="nombre" value="{!!$publication->nombre !!}">
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Price<span class="req"></span>
                                </label>
                                <input type="text" class="form-control" id="titulo" name="precio" value="{!!$publication->precio !!}">
                            </div>
                        </div>
                        <div class="top-row">
                        <div class="field-wrap">
                            <label>
                                Meters(m2):<span class="req"></span>
                            </label>
                            <input type="text" class="form-control" id="titulo" name="metros" value="{!!$publication->metros !!}">
                        </div>

                        <div class="field-wrap">
                            <label>
                               Status<span class="req">*</span>
                            </label>
                            <input type="text" class="form-control" id="titulo" name="activo" value="{!!$publication->activo !!}">
                        </div>
                        </div>
                        <div class="top-row">
                            <div class="field-wrap">
                                <label>
                                    Contacto<span></span>
                                </label>
                                <input type="text" class="form-control" id="titulo" name="contacto" value="{!!$publication->contacto !!}">
                            </div>


                        </div>
                        <div class="top-row">
                            <div class="field-wrap">
                                <label>
                                    Imágen:<span ></span>
                                </label>
                                <input type="file" name="image" id="titulo1" class="inputfile form-control " value="/{!!  $publication->image !!}"/>
                                <br>
                                <img id="img-profile-old" class="imgalumn"  style="width: 21%;" src="{{$publication->image}}">
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Categoría<span class="req">*</span>
                                </label>
                                <input type="hidden" class="form-control" id="" name="id" value="{!!$publication->id !!}">
                                <select name="category_id" class="input-matric-redmdi input-text-standard input_text text-size  form-control" style="border-bottom-color:  #40c1ac;">
                                <option >Seleccione programa</option>
                                @foreach(\App\Models\Categories::where('id','>',0)->get() as $categorie )
                                    <option value="{{$categorie->id}}" class="form-control" id="chiscat" name="category_id" selected >{{$categorie->title}}</option>

                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="field-wrap">
                            <label>
                                Descripción:<span ></span>
                            </label>
                            <input type="text" class="form-control" id="titulo" name="descripcion" value="{!!$publication->descripcion !!}">
                        </div>





                        <button type="submit" class="button button-block"/>UPDATE</button>
                        <button type="submit" class="ntm btn-primary  mt-5 mb-5"><a href="{{ route('admin.articulo.delete',[$publication->id])}}">DELETE</a></button>
                        <button class="ntm btn-primary mt-5 mb-5" ><a href="{{route('admin.index')}}">Cancelar</a></button>

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
