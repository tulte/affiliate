@extends('layouts.admin')


@section('content')


    <div class="container content">
        <!--Reg Block-->
        <div class="reg-block">

        <form class="form-signin" method="POST" action="/admin/login">
                {!! csrf_field() !!}
                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"></span>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"></span>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <hr>


                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <button type="submit" class="btn-u btn-block">Login</button>
                    </div>
                </div>
        </form>
        </div>
        <!--End Reg Block-->
    </div><!--/container-->


@endsection
