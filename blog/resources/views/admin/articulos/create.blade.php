@extends('layouts.admin')
@section('content')
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

                            <form action="{{ route('admin.articulo.store') }}" enctype="multipart/form-data" method="post" role="form">
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
                                            Categpría<span class="req">*</span>
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
                    @import "compass/css3";
                    *, *:before, *:after {
                        box-sizing: border-box;
                    }
                    html {
                        overflow-y: scroll;
                    }
                    body {
                        background: #c1bdba;
                        font-family: 'Titillium Web', sans-serif;
                    }
                    #chiscat{
                        display: block;
                        width: 100%;
                        height: calc(1.6em + 0.75rem + 2px);
                        padding: 0.375rem 0.75rem;
                        font-size: 0.9rem;
                        font-weight: 400;
                        line-height: 1.6;
                        color: #495057;
                        background-color: #fff;
                        background-clip: padding-box;
                        border: 1px solid #ced4da;
                        border-radius: 0.25rem;
                        -webkit-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;




                    }
                    a {
                        text-decoration: none;
                        color: #1ab188;
                        transition: 0.5s ease;
                    }
                    a:hover {
                        color: #179b77;
                    }
                    .form {
                        background: rgba(19, 35, 47, .9);
                        padding: 40px;
                        max-width: 600px;
                        margin: 40px auto;
                        border-radius: 4px;
                        box-shadow: 0 4px 10px 4px rgba(19, 35, 47, .3);
                    }
                    .tab-group {
                        list-style: none;
                        padding: 0;
                        margin: 0 0 40px 0;
                    }
                    .tab-group:after {
                        content: "";
                        display: table;
                        clear: both;
                    }
                    .tab-group li a {
                        display: block;
                        text-decoration: none;
                        padding: 15px;
                        background: rgba(160, 179, 176, .25);
                        color: #a0b3b0;
                        font-size: 20px;
                        float: left;
                        width: 50%;
                        text-align: center;
                        cursor: pointer;
                        transition: 0.5s ease;
                    }
                    .tab-group li a:hover {
                        background: #179b77;
                        color: #fff;
                    }
                    .tab-group .active a {
                        background: #1ab188;
                        color: #fff;
                    }
                    .tab-content > div:last-child {
                        display: none;
                    }
                    h1 {
                        text-align: center;
                        color: #fff;
                        font-weight: 300;
                        margin: 0 0 40px;
                    }
                    label {

                        transform: translateY(6px);
                        left: 13px;
                        color: rgba(255, 255, 255, .5);
                        transition: all 0.25s ease;
                        -webkit-backface-visibility: hidden;
                        pointer-events: none;
                        font-size: 22px;
                    }
                    label .req {
                        margin: 2px;
                        color: #1ab188;
                    }
                    label.active {
                        transform: translateY(50px);
                        left: 2px;
                        font-size: 14px;
                    }
                    label.active .req {
                        opacity: 0;
                    }
                    label.highlight {
                        color: #fff;
                    }
                    input, textarea {
                        font-size: 22px;
                        display: block;
                        width: 100%;
                        height: 100%;
                        padding: 5px 10px;
                        background: none;
                        background-image: none;
                        border: 1px solid #a0b3b0;
                        color: #fff;
                        border-radius: 0;
                        transition: border-color 0.25s ease, box-shadow 0.25s ease;
                    }
                    input:focus, textarea:focus {
                        outline: 0;
                        border-color: #1ab188;
                    }
                    textarea {
                        border: 2px solid #a0b3b0;
                        resize: vertical;
                    }
                    .field-wrap {
                        position: relative;
                        margin-bottom: 40px;
                    }
                    .top-row:after {
                        content: "";
                        display: table;
                        clear: both;
                    }
                    .top-row > div {
                        float: left;
                        width: 48%;
                        margin-right: 4%;
                    }
                    .top-row > div:last-child {
                        margin: 0;
                    }
                    .button {
                        border: 0;
                        outline: none;
                        border-radius: 0;
                        padding: 15px 0;
                        font-size: 2rem;
                        font-weight: 600;
                        text-transform: uppercase;
                        letter-spacing: 0.1em;
                        background: #1ab188;
                        color: #fff;
                        transition: all 0.5s ease;
                        -webkit-appearance: none;
                    }
                    .button:hover, .button:focus {
                        background: #179b77;
                    }
                    .button-block {
                        display: block;
                        width: 100%;
                    }
                    .forgot {
                        margin-top: -20px;
                        text-align: right;
                    }



                </style>
                <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>
@endsection
