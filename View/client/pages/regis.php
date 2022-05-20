
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="Public/client/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="Public/client/css/style1.css">
</head>
<body>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" name="regis" onsubmit="return checkRegis()">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" maxlength="20" id="name" placeholder="User Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group">
                                <label for="eror" class="label-agree-term" style="color: red"><?php  echo $message; ?></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image"> 
                        <figure><img src="Public/client/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="?controller=signin" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        function checkRegis(){
            var x = document.forms["regis"]['name'].value;
            var y1 = document.forms["regis"]['pass'].value;
            var y2 = document.forms["regis"]['re_pass'].value;
            var z = document.forms["regis"]['email'].value;
            if (x == "") {
                alert("Bạn chưa nhập tên đăng nhập");
                return false;
            }
            else if (z == "") {
                alert("Bạn chưa nhập email");
                return false;
            }
            else if (y1 == "") {
                alert("Bạn chưa nhập mật khẩu");
                return false;
            }
            else if (y1 != y2) {
                alert("Mật khẩu nhập lại không khớp");
                return false;
            }
        }
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
    
</html>
