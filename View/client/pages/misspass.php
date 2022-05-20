<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<style type="text/css">
    .container{
        padding-bottom: 100px;
        padding-top: 100px;
    }
    form{
        padding-bottom: 30px;
        padding-top: 30px;
    }
    .group{
        padding-top: 5px;
        padding-bottom: 10px;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-9">
                <h1>Forgot password</h1>
                <form method="POST">
                    <div class="group">
                        <label>Enter your email address</label>
                        <input type="email" name="email" id="email">
                        <a href="javascript:sendcode();" class="btn btn-primary" name="sendcode">Send code</a> <br>
                    </div>
                    <div class="group">
                        <label style="padding-right: 40px;">Code from your mail</label>
                        <input type="text" name="code" maxlength="6">
                    </div>
                    <div id="message" style="color: red">
                        <?=$message;?>
                    </div>
                    <div class="group" style="margin-left: 200px;">
                        <button type="submit" class="btn btn-primary" name="post">POST</button> <br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="Public/client/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
    function sendcode() {
        var email = $('#email').val();
        $.post("Ajax/index.php?controller=sendcode", {email:email}, function(result){
            $('#message').text(result);
        });
    }
</script>
</html>