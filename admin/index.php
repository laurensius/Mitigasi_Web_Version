<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="SMS AndezNet Gateway">

    <title>Login Halaman Mitigasi</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

  </head>



      <div id="login-page">
        <div class="container">
               
                
                <div class="login-wrap">
                
                <form name="form" id="loginF" method="post" action="" class="form-login">
                 <h2 class="form-login-heading">Mitigasi Tanggap Bencana</h2>
                 <div id="loading" style="text-align: center"></div>
                    <br>
                    <div class="form-group">
                        <div class="col-sm-12">
                    <input type="text"  id="username" name="username" class="form-control" placeholder="Username" autofocus>
                            </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <div class="col-sm-12">
                    <input type="password" id="passlogin" name="passlogin" class="form-control" placeholder="Password">
                            </div>
                    </div>

                   
                    <div class="form-group">
                        <div class="col-sm-12">
                    <button class="btn  btn-block"><i class="fa fa-lock"></i> LOGIN</button>
                            </div>
                    </div>



                    <div class="registration">

                        <br>Silahkan Anda Login<br/>
                        
                    </div>

                    <footer class="site-footer">
                        <div class="text-center">
                            2017 Didin-Uniku
                        </div>
                    </footer>
                 </form>     
                </div>
        
                  <!-- Modal -->

                  <!-- modal -->

        
        </div>
      </div>
    
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.2.1.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("", {speed: 500});
    </script>

    <script type="text/javascript">
    
    jQuery(function($) {

        $.validator.setDefaults({
            submitHandler: function () {
                login();

            }

        });

        $().ready(function () {

            // validate the comment form when it is submitted
            $("#loginF").validate({
                errorElement: 'div',
                errorClass: 'help-block',
                focusInvalid: true,
                rules: {


                    username: {
                        required: true
                    },

                    passlogin: {
                        required: true
                    }


                },

                messages: {

                    username: "Mohon isi Username anda",
                    passlogin: "Mohon isi Password anda"

                },


                highlight: function (e) {
                    $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
                },

                success: function (e) {
                    $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
                    $(e).remove();
                }

            })
        });


        function login() {
            $("#loading").html('<div class="alert alert-warning alert-success">Mohon Tunggu....</div>');

            $.post('cek_login.php', $("form").serialize(), function (hasil) {
                $('form input[type="text"],form input[type="password"]').val('');
                $("#loading").html(hasil);
            });
        }

    });


</script>

  </body>
</html>
