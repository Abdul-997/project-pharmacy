@extends('layouts.app')

@section('content')
    <body class="login">
    <div class="login_wrapper">
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <center><img src="{{ asset('build/images/logo.png') }}"
                                     alt="..." width="200"></center>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" placeholder="Username">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" placeholder="*************">
                                    <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12">
                                    <center>
                                        <a href="{{ route('home') }}"
                                           class="btn"
                                           style="background-color: rgb(22, 104, 122);
                                       color: rgb(192, 202, 211);">
                                            Login as Admin
                                        </a>
                                        <a href="{{ route('register') }}"  class="btn" style="background-color: rgb(121,146,168);color: rgb(11, 52, 61);">Login as Cashier</a>
                                    </center>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

@endsection

