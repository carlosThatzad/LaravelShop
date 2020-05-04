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

                    </ul>

                    <div class="tab-content">
                        <div id="signup">
                            <h1>Create Product</h1>

                            <form action="{{ route('articulo.store') }}" enctype="multipart/form-data" method="post" role="form">
                                {{ csrf_field() }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="top-row">
                                    <div class="field-wrap">
                                        <label>
                                            Name<span class="req"></span>
                                        </label>
                                        <input type="text" class="form-control" id="titulo" name="nombre" value="">
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            Price<span class="req"></span>
                                        </label>
                                        <input type="text" class="form-control" id="titulo" name="precio" value="">
                                    </div>
                                </div>
                                <div class="top-row">
                                    <div class="field-wrap">
                                        <label>
                                            Meters(m2):<span class="req"></span>
                                        </label>
                                        <input type="text" class="form-control" id="titulo" name="metros" value="">
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            Status<span class="req">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="titulo" name="activo" value="">
                                    </div>
                                </div>
                                <div class="top-row">
                                    <div class="field-wrap">
                                        <label>
                                            Contacto<span></span>
                                        </label>
                                        <input type="text" class="form-control" id="titulo" name="contacto" value="">
                                    </div>


                                </div>
                                <div class="top-row">
                                    <div class="field-wrap">
                                        <label>
                                            Imágen:<span ></span>
                                        </label>
                                        <input type="file" name="image" id="titulo1" class="inputfile form-control " />
                                        <br>

                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            Categoría<span class="req">*</span>
                                        </label>

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
                                    <input type="text" class="form-control" id="titulo" name="descripcion" value="">
                                </div>





                                <button type="submit" class="button button-block"/>ADD</button>



                            </form>

                        </div>



                        <script>

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


                            Resources
                        </script>
                        <style>



                        </style>
                        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>
@endsection
