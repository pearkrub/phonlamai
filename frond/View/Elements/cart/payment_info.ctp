<div class="row">
    <div class="col-md-6">
        <h5 class="thin subtitle">Choose a Payment Method</h5>
        <div class="panel-group accordion style2" id="accordionPayment" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingPayment1">
                    <h4 class="panel-title">
                        <a class="" data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment1" aria-expanded="true" aria-controls="collapsePayment1">
                            <i class="fa fa-credit-card mr-10"></i>Credit or Debit Card
                        </a>
                    </h4><!-- end panel-title -->
                </div><!-- end panel-heading -->
                <div id="collapsePayment1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingPayment1">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-4">Cardholder Name <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control required" name="cardholder" placeholder="">
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end form-group -->
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-4">Card Number <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control required" name="cardnumber" placeholder="">
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end form-group -->
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-4">Payment Types <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <ul class="list list-inline">
                                        <li><i class="fa fa-cc-visa fa-2x"></i></li>
                                        <li><i class="fa fa-cc-paypal fa-2x"></i></li>
                                        <li class="text-primary"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                                        <li><i class="fa fa-cc-discover fa-2x"></i></li>
                                    </ul>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end form-group -->
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-4">Expiration Date <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" name="mm" placeholder="MM" class="form-control required">
                                        </div><!-- end col -->
                                        <div class="col-sm-6">
                                            <input type="text" name="yy" placeholder="YY" class="form-control required">
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end form-group -->
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-4">CSC <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="number" placeholder="" class="form-control mb-10 required">
                                    <a href="javascript:void(0);">What's this?</a>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end form-group -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <div class="checkbox-input checkbox-primary mb-10">
                                        <input id="save-my-card" class="styled" type="checkbox">
                                        <label for="save-my-card">
                                            Save my Card information?
                                        </label>
                                    </div><!-- end checkbox-input -->
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end form-group -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-8 text-right">
                                    <a href="order-confirmation.html" class="btn btn-default btn-md round">Order <i class="fa fa-arrow-circle-right ml-5"></i></a>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end form-group -->
                    </div><!-- end panel-body -->
                </div><!-- end collapse -->
            </div><!-- end panel -->

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingPayment2">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment2" aria-expanded="false" aria-controls="collapsePayment2">
                            <i class="fa fa-paypal mr-10"></i>Pay with PayPal
                        </a>
                    </h4>
                </div><!-- end panel-heading -->
                <div id="collapsePayment2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPayment2">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="checkbox-input checkbox-primary mb-10">
                                <input id="pay-with-paypal" class="styled" type="checkbox">
                                <label for="pay-with-paypal">
                                    <i class="fa fa-cc-paypal mr-5"></i>Checkout with paypal
                                </label>
                            </div><!-- end checkbox-input -->
                        </div><!-- end form-group -->
                        <div class="form-group">
                            <a href="order-confirmation.html" class="btn btn-default btn-md round">Order <i class="fa fa-arrow-circle-right ml-5"></i></a>
                        </div><!-- end form-group -->
                    </div><!-- end panel-body -->
                </div><!-- end collapse -->
            </div><!-- end panel -->
        </div><!-- end panel-group -->
    </div><!-- end col -->
    <div class="col-md-6">
        <h5 class="thin subtitle">Frequently asked questions</h5>
        <div class="panel-group accordion style1" id="question" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="questionOne">
                    <h4 class="panel-title">
                        <a class="" data-toggle="collapse" data-parent="#question" href="#collapseQuestionOne" aria-expanded="true" aria-controls="collapseOne">
                            What payments methods can I use?
                        </a>
                    </h4>
                </div><!-- end panel-heading -->
                <div id="collapseQuestionOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="questionOne">
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                    </div><!-- end panel-body -->
                </div><!-- end collapse -->
            </div><!-- end panel -->

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="questionTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Can I use gift card to pay for my purchase?
                        </a>
                    </h4>
                </div><!-- end panel-heading -->
                <div id="collapseQuestionTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionTwo">
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                    </div><!-- end panel-body -->
                </div><!-- end collapse -->
            </div><!-- end panel -->

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="questionThree">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionThree" aria-expanded="false" aria-controls="collapseThree">
                            How long will it take to get my order?
                        </a>
                    </h4>
                </div><!-- end panel-heading -->
                <div id="collapseQuestionThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionThree">
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                    </div><!-- end panel-body -->
                </div><!-- end collapse -->
            </div><!-- end panel -->
        </div><!-- end panel-group -->
    </div><!-- end col -->
</div><!-- end row -->