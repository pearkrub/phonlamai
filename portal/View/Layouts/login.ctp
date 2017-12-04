<!--
 * GenesisUI - Bootstrap 4 Admin Template
 * @version v1.8.10
 * @link https://genesisui.com
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license https://genesisui.com/license.html
 -->
 <!DOCTYPE html>
 <html lang="en">
 
 <!-- Mirrored from genesisui.com/demo/clever/1.8.10/bootstrap4-static/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2017 12:22:21 GMT -->
 <head>
 
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Clever Bootstrap 4 Admin Template">
   <meta name="author" content="Lukasz Holeczek">
   <meta name="keyword" content="Clever Bootstrap 4 Admin Template">
   <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
 
   <title>Clever Bootstrap 4 Admin Template</title>
 
   <!-- Icons -->
   <link href="vendors/css/font-awesome.min.css" rel="stylesheet">
   <link href="vendors/css/simple-line-icons.min.css" rel="stylesheet">
 
   <!-- Main styles for this application -->
   <link href="css/style.css" rel="stylesheet">
 
   <!-- Styles required by this views -->

 </head>
 
 <body class="app flex-row align-items-center">
   <div class="container">
     <div class="row justify-content-center">
       <div class="col-md-8">
         <div class="card-group mb-4">
           <div class="card p-4">
             <div class="card-body">
               <h1>Phonlamai.com</h1>
               <p class="text-muted">เข้าสู่ระบบ สำหรับเกษตกร</p>
               <form action="/login/authen" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-addon"><i class="icon-user"></i></span>
                        <input required type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                        <input required type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="row">
                        <div class="col-6">
                        <button type="submit" class="btn btn-primary px-4">เข้าสู่ระบบ</button>
                        </div>
                        <div class="col-6 text-right">
                        <button type="button" class="btn btn-link px-0">ลืมรหัสผ่าน ?</button>
                        </div>
                    </div>
                </form>
             </div>
           </div>
           <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
             <div class="card-body text-center">
               <div>
                 <h2>ลงทะเบียน</h2>
                 <p>สามารถลงทะเบียนเพื่อฝากขายสินค้าเกษตกรผ่านระบบของเรา</p>
                 <button type="button" class="btn btn-primary active mt-3">สมัครสมาชิก ฟรี!</button>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 
   <!-- Bootstrap and necessary plugins -->
   <script src="vendors/js/jquery.min.js"></script>
   <script src="vendors/js/popper.min.js"></script>
   <script src="vendors/js/bootstrap.min.js"></script>
 
 </body>
 
 <!-- Mirrored from genesisui.com/demo/clever/1.8.10/bootstrap4-static/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2017 12:22:21 GMT -->
 </html>