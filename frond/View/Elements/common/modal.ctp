<section>
    <div class="container">
        <!-- Modal Product Quick View -->
        <div class="modal fade productQuickView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-header-text"></h5>
                    </div><!-- end modal-header -->
                    <div class="modal-body-product">

                    </div><!-- end modal-body -->
                </div><!-- end modal-content -->
            </div><!-- end modal-dialog -->
        </div><!-- end productRewiew -->


        <div class="modal fade addressModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h6 class="modal-header-address"></h6>
                    </div><!-- end modal-header -->
                    <div class="modal-body-address">

                    </div><!-- end modal-body -->
                    <div class="modal-footer">
                        <button id="save-address-btn" class="btn btn-primary">บันทึก</button>
                        <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                            ยกเลิก
                        </button>
                    </div>
                </div><!-- end modal-content -->
            </div><!-- end modal-dialog -->
        </div><!-- end productRewiew -->

        <!-- Modal Login -->
        <div class="modal fade account loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row display-table text-center">
                            <div class="col-sm-12 vertical-align">
                                <div class="inner-content">
                                    <h5>เข้าสู่ระบบ</h5>
                                    <p class="lead"></p>

                                    <hr class="spacer-5 no-border">
                                    <form method="post" action="/login/authen">
                                        <div class="form-group">
                                            <input required name="email" type="email" class="form-control " placeholder="Email">
                                        </div><!-- end form-group -->
                                        <div class="form-group">
                                            <input required name="password" type="password" class="form-control " placeholder="Password">
                                        </div><!-- end form-group -->
                                       
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-default btn-block round " value="Log In">
                                        </div><!-- end form-group -->
                                    </form>
                                </div><!-- inner-content -->

                            </div><!-- end col -->


                        </div><!-- end row -->
                    </div><!-- end modal-body -->
                </div><!-- end modal-content -->
            </div><!-- end modal-dialog -->
        </div><!-- end loginModal -->

        <!-- Modal Register -->
        <div class="modal fade account registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row display-table text-center">
                            <div class="col-sm-6 vertical-align">
                                <div class="inner-content">
                                    <h3>Register</h3>
                                    <p class="lead">Create an account</p>

                                    <hr class="spacer-5 no-border">

                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" placeholder="Your Name">
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <input type="email" class="form-control input-lg" placeholder="Email">
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <input type="password" class="form-control input-lg" placeholder="Password">
                                    </div><!-- end form-group -->
                                    <div class="form-group text-left">
                                        <div class="checkbox-input mb-10 pull-left">
                                            <input id="remember" class="styled" type="checkbox">
                                            <label for="remember">
                                                Remember me
                                            </label>
                                        </div><!-- end checkbox-input -->
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-default btn-block round btn-lg" value="Log In">
                                    </div><!-- end form-group -->

                                    <div class="or hidden-xs">or</div>

                                </div><!-- inner-content -->

                            </div><!-- end col -->

                            <div class="col-sm-6 vertical-align image-background layer-dark" style="background-image: url('img/bg_01.jpg');">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                <div class="inner-content">
                                    <h3 class="text-white">Sign Up</h3>
                                    <p class="lead text-white">with one of your social profiles</p>

                                    <ul class="social-icons style2">
                                        <li class="facebook"><a class="semi-circle" href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a class="semi-circle" href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                        <li class="google-plus"><a class="semi-circle" href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>

                                    <hr class="spacer-10 no-border"/>

                                    <p>Do you have an account? <a href="#" class="text-white">Log In</a></p>

                                </div><!-- end inner-content -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end modal-body -->
                </div><!-- end modal-content -->
            </div><!-- end modal-dialog -->
        </div><!-- end registerModal -->
    </div><!-- end container -->
</section>