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
                        <!--<h5>Lorem ipsum dolar sit amet</h5>-->
                    </div><!-- end modal-header -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class='carousel slide product-slider' data-ride='carousel' data-interval="false">
                                    <div class='carousel-inner'>
                                        <div class='item active'>
                                            <figure>
                                                <img src='img/products/men_01.jpg' alt='' />
                                            </figure>
                                        </div><!-- end item -->
                                        <div class='item'>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NrmMk1Myrxc"></iframe>
                                            </div>
                                        </div><!-- end item -->
                                        <div class='item'>
                                            <figure>
                                                <img src='img/products/men_03.jpg' alt='' />
                                            </figure>
                                        </div><!-- end item -->
                                        <div class='item'>
                                            <figure>
                                                <img src='img/products/men_04.jpg' alt='' />
                                            </figure>
                                        </div><!-- end item -->
                                        <div class='item'>
                                            <figure>
                                                <img src='img/products/men_05.jpg' alt=''/>
                                            </figure>
                                        </div><!-- end item -->

                                        <!-- Arrows -->
                                        <a class='left carousel-control' href='.html' data-slide='prev'>
                                            <span class='fa fa-angle-left'></span>
                                        </a>
                                        <a class='right carousel-control' href='.html' data-slide='next'>
                                            <span class='fa fa-angle-right'></span>
                                        </a>
                                    </div><!-- end carousel-inner -->

                                    <!-- thumbs -->
                                    <ol class='carousel-indicators mCustomScrollbar meartlab'>
                                        <li data-target='.product-slider' data-slide-to='0' class='active'><img src='img/products/men_01.jpg' alt='' /></li>
                                        <li data-target='.product-slider' data-slide-to='1'><img src='img/products/men_02.jpg' alt='' /></li>
                                        <li data-target='.product-slider' data-slide-to='2'><img src='img/products/men_03.jpg' alt='' /></li>
                                        <li data-target='.product-slider' data-slide-to='3'><img src='img/products/men_04.jpg' alt='' /></li>
                                        <li data-target='.product-slider' data-slide-to='4'><img src='img/products/men_05.jpg' alt='' /></li>
                                        <li data-target='.product-slider' data-slide-to='5'><img src='img/products/men_06.jpg' alt='' /></li>
                                    </ol><!-- end carousel-indicators -->
                                </div><!-- end carousel -->
                            </div><!-- end col -->
                            <div class="col-sm-7">
                                <p class="text-gray alt-font">Product code: 1032446</p>

                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star-half-o text-warning"></i>
                                <span>(12 reviews)</span>
                                <h4 class="text-primary">$79.00</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                                <hr class="spacer-10">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <select class="form-control" name="select">
                                            <option value="" selected>Color</option>
                                            <option value="red">Red</option>
                                            <option value="green">Green</option>
                                            <option value="blue">Blue</option>
                                        </select>
                                    </div><!-- end col -->
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <select class="form-control" name="select">
                                            <option value="">Size</option>
                                            <option value="">S</option>
                                            <option value="">M</option>
                                            <option value="">L</option>
                                            <option value="">XL</option>
                                            <option value="">XXL</option>
                                        </select>
                                    </div><!-- end col -->
                                    <div class="col-md-4 col-sm-12">
                                        <select class="form-control" name="select">
                                            <option value="" selected>QTY</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                            <option value="">6</option>
                                            <option value="">7</option>
                                        </select>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                                <hr class="spacer-10">
                                <ul class="list list-inline">
                                    <li><button type="button" class="btn btn-default btn-md round"><i class="fa fa-shopping-basket mr-5"></i>Add to Cart</button></li>
                                    <li><button type="button" class="btn btn-gray btn-md round"><i class="fa fa-heart mr-5"></i>Add to Wishlist</button></li>
                                </ul>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end modal-body -->
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