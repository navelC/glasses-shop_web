<?php session_start();
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['limit'])){
        $default = $_POST['limit'];
        setcookie('limit',$default,time() + (365 * 24 * 60 * 60), "/");
    }
?>
<head>
    <link href="Public/client/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="Public/client/css/style6.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="Public/client/css/shop.css" type="text/css" />
    <link rel="stylesheet" href="Public/client/css/owl.carousel.css" type="text/css" media="all">
    <link rel="stylesheet" href="Public/client/css/owl.theme.css" type="text/css" media="all">
    <link href="Public/client/css/style.css" rel='stylesheet' type='text/css' />
    <link href="Public/client/css/fontawesome-all.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function favourite(stt,id){
            var  u = '';
            var iduser = <?php echo $_SESSION['user']['id']; ?>;
            var x = document.querySelectorAll("div[data-id]");
            if(x[stt].classList.contains('product-favourite-active')){
                u+='del';
            } 
            else  u+='add';
            $.post("Ajax/?controller=favourite", {id:id, type:u,iduser:iduser}, function(result){
                x[stt].classList.toggle('product-favourite-active');
            });
        }
    </script> 
    <script>
        function removeFavourite(stt,id){
            if (confirm('Are you sure you want to remove this product from favourite product?')) {
              favourite(stt,id);
              $.ajax({ 
                    type: "GET", 
                    url: '/loadfavourite', 
                    data: "id=" + id,
                    success: function(data){
                        $('#row-favourite').html(data);
                    } 
                }); 
            } 
        }
    </script>
</head>
<!-- header -->
        <header>
            <div class="row">
                <div class="col-md-3 top-info text-left mt-lg-4">
                    <h6>Need Help</h6>
                    <ul>
                        <li>
                            <i class="fas fa-phone"></i> Call</li>
                        <li class="number-phone mt-3">12345678099</li>
                    </ul>
                </div>
                <div class="col-md-6 logo-w3layouts text-center">
                    <h1 class="logo-w3layouts">
                        <a class="navbar-brand" href="./">
                            Goggles </a>
                    </h1>
                </div>

                <div class="col-md-3 top-info-cart text-right mt-lg-4">
                    <ul class="cart-inner-info">
                        <?php if(isset($_SESSION['user'])) echo '
                        <li >
                            <a href="?controller=profile" >
                               '.$_SESSION["user"]["name"].'
                            </a>
                            /
                            <a href="?controller=logout" >
                                logout
                            </a>
                        </li>
                        ';
                        else 
                            echo '
                        <li >
                            <a href="?controller=signin">
                                Login
                            </a>/
                            <a href="?controller=signup">
                                registration
                            </a>
                        </li>
                        ';
                        ?>
                        <li class="galssescart galssescart2 cart cart box_1">
                            <button class="top_googles_cart" onclick="window.location.href='?controller=cart'">
                                My Cart
                                <i class="fas fa-cart-arrow-down"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="search">
                <div class="mobile-nav-button">
                    <button id="trigger-overlay" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <!-- open/close -->
                <div class="overlay overlay-door">
                    <button type="button" class="overlay-close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                    <form action="shop.php" method="GET" class="d-flex">
                        <input class="form-control" type="search" name="search" placeholder="Search here..." required="">
                        <button type="submit" class="btn btn-primary submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>

                </div>
                <!-- open/close -->
            </div>
            <label class="top-log mx-auto"></label>
            <nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">

                <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-mega mx-auto">
                        <li class="nav-item">
                            <a class="nav-link ml-lg-0" href="./">Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <?php if (isset($_SESSION['user'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?controller=favourite">Favourite</a>
                        </li>
                        <?php } ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown" href="?controller=product" >
                                Shop
                            </a>
                            <ul class="dropdown-menu content-menu ">
                                <li>
                                    <div class="row">
                                        <?php 
                                            $conn = mysqli_connect("localhost","root","","bankinh");
                                            $sql = "select * from category";
                                            $result = mysqli_query($conn, $sql);
                                            while ( $row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <div class="col-md-6 media-list span4 text-left">
                                            <h5 class="tittle-w3layouts-sub"> <?php echo $row['name']; ?> </h5>
                                            <ul>
                                                <?php 
                                                    $sql = "select * from sub_category where idcategory =".$row['id'];;
                                                    $result1 = mysqli_query($conn, $sql);
                                                    while ( $row1 = mysqli_fetch_assoc($result1)) {
                                                ?>
                                                <li class="media-mini mt-3">
                                                    <?php echo '<a href="?controller=product&id='.$row1['id'].'">'.$row1['name'].'</a>';   
                                                    ?>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <?php } ?>  
                                    </div>
                                </li>
                            </ul>


                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <?php 
                            if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin') {
                        ?>    
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="View/admin" class="nav-link">
                                Admin
                            </a>
                        </li>
                        <?php } ?>
                    </ul>

                </div>
            </nav>
        </header>
<script type="text/javascript">
    function addcart(id) {
        $.post('Ajax/addcart.php', {id:id});
        alert('Thêm sản phẩm vào giỏ hàng thành công');
    }
</script>