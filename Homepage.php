<?php
$con=mysqli_connect("localhost","root","","place4u");
$result=mysqli_query($con,"select * from hotels");
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Place4U</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="fonts/css/font-awesome.min.css"/>

    <style>
        .container{
            max-width: 1400px;
        }

        .hr-border{
            border: 0.5px solid black;
            opacity: 0.1;
            width: 100%;
        }

        .form-control-custom{
            width: 85%;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        .btn-search{
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        .jumbotron{
            padding: 1rem;
        }

        .col-md-3 img{
            width: 100%;
        }

        .col-md-3 ul li {
            color: #007bff;
        }


        .border-fa{
            border: 2px solid #007bff;
            border-radius: 5px;
            padding: 5px;
        }
        .img-fluid{
            height: 270px;
            width: 250px;
        }
        .card-body{
            padding: 0;
        }
    </style>

</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <div class="container">
            <a href="Homepage.php" class="navbar-brand pt-2 pb-2">Place4U</a>
            <ul class="navbar-nav">
                <li class="nav-item pt-2 pb-2">
                    <a href="Restaurants.php" class="nav-link"><span class="fa fa-glass"></span> Restaurants</a>
                </li>
                <li class="nav-item pt-2 pb-2">
                    <a href="Hotels.php" class="nav-link"><span class="fa fa-home"></span> Hotels</a>
                </li>
                <li class="nav-item pt-2 pb-2">
                    <a href="Coffee Bars.php" class="nav-link"><span class="fa fa-coffee"></span> Coffee bars</a>
                </li>
                <li class="nav-item pt-2 pb-2">
                    <a href="Login.html" class="nav-link btn btn-dark">Log In</a>
                </li>
                <li class="nav-item pt-2 pb-2">
                    <a href="Register.html" class="nav-link btn btn-dark border-white">Sign Up</a>
                </li>
            </ul>
        </div>
    </nav>
    <br><br>
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h3 class="text-danger text-center align-items-center" style="font-family: Calibri">Find the best place for you</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                    <div class="row mb-5">
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="https://praetschli.ch/wp-content/uploads/4.2011-31-700x550.jpg" class="card-img-top">
                            <div class="card-footer text-center">
                                <a href="Restaurants.php" class="btn text-muted align-items-center" style="font-size: 1.3rem" ">Restaurants</a>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-4">
                            <div class="card h-100">
                                <img src="https://supellia.eu/wp-content/uploads/2019/06/4-700x550.jpg" class="card-img-top">
                                <div class="card-footer text-center">
                                    <a href="Hotels.php" class="btn text-muted align-items-center" style="font-size: 1.3rem" ">Hotels</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100">
                                <img src="http://thebrewerydistrict.ca/wp-content/uploads/2020/08/118360269_191570312361396_115585176585849745_n-700x550.jpg" class="card-img-top">
                                <div class="card-footer text-center">
                                    <a href="Coffee Bars.php" class="btn text-muted align-items-center" style="font-size: 1.3rem" ">Coffee Bars</a>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center align-items-center text-danger">Best reviewed places</h3>
                    </div>
                </div>
                <div class="card border-top custom_outline mt-1">
                    <div class="row">
                        <div class="col-auto">
                            <img src="restaurant.png" class="img-fluid m-1" alt="">
                        </div>
                        <div class="col custom_paragraph">
                            <div class="card-block px-2">
                                <h3 class="card-title">Restaurant</h4>
                                    <p>Informacii za mestoto i uslugite sto se nudat</p>
                                    <h5 class="card-title">Location</h5>
                                    <p class="card-text">Info za lokacija</p>
                                    <h5 class="card-title">Contact</h5>
                                    <p class="card-text">Info za kontakt</p>
                                    <a href="#" class="btn btn-primary mb-1">View "name" <span class="fa fa-chevron-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-top custom_outline mt-1">
                    <div class="row">
                        <div class="col-auto">
                            <img src="restaurant.png" class="img-fluid m-1" alt="">
                        </div>
                        <div class="col custom_paragraph">
                            <div class="card-block px-2">
                                <h3 class="card-title">Hotel</h4>
                                    <p>Informacii za mestoto i uslugite sto se nudat</p>
                                    <h5 class="card-title">Location</h5>
                                    <p class="card-text">Info za lokacija</p>
                                    <h5 class="card-title">Contact</h5>
                                    <p class="card-text">Info za kontakt</p>
                                    <a href="#" class="btn btn-primary mb-1">View "name" <span class="fa fa-chevron-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-top custom_outline mt-1">
                    <div class="row">
                        <div class="col-auto">
                            <img src="restaurant.png" class="img-fluid m-1" alt="">
                        </div>
                        <div class="col custom_paragraph">
                            <div class="card-block px-2">
                                <h3 class="card-title">Coffee bar</h4>
                                    <p>Informacii za mestoto i uslugite sto se nudat</p>
                                    <h5 class="card-title">Location</h5>
                                    <p class="card-text">Info za lokacija</p>
                                    <h5 class="card-title">Contact</h5>
                                    <p class="card-text">Info za kontakt</p>
                                    <a href="#" class="btn btn-primary mb-1">View "name" <span class="fa fa-chevron-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="jumbotron">
			<form action="code4.php" method="POST">
                    <h3><span class="fa fa-search"></span>Search...</h3>
                    <p><input type="text" name="comment" class="form-control-custom"><button type="submit" name="submit" class="btn-search"><span class="fa fa-search"></span></button></p>
                	 </form>
			</div>

                <div class="jumbotron">
                    <h5><span class="fa fa-thumbs-o-up"></span> Follow Us!</h5>
                    <ul class="nav justify-content-center align-items-center d-flex">
                        <li class="m-1">
                            <a href="#"><span class="fa fa-twitter border-fa text-primary"></span></a>
                        </li>
                        <li class="m-1">
                            <a href="#"><span class="fa fa-facebook border-fa text-primary"></span></a>
                        </li>
                        <li class="m-1">
                            <a href="#"><span class="fa fa-linkedin border-fa text-primary"></span></a>
                        </li>
                        <li class="m-1">
                            <a href="#"><span class="fa fa-github border-fa text-primary"></span></a>
                        </li>
                        <li class="m-1">
                            <a href="#"><span class="fa fa-google border-fa text-primary"></span></a>
                        </li>
                        <li class="m-1">
                            <a href="#"><span class="fa fa-instagram border-fa text-primary"></span></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <br>
        <hr class="hr-border">
        <br>
        <div class="container pt-3">
            <div class="row">
                <div class="col-md-12">
                    <h5>Contact: </h5>
                    <p>Have a question or feedback? Contact us!</p>
                    <p class="text-primary"><span class="fa fa-envelope"></span> Contact</p>
                    </div>
            </div>
            <hr class="hr-border">
            <br>
        </div>
        <p><span class="font-weight-light">Copyright &copy; Place4U </span>| <a href="#" class="text-primary">Privacy Policy</a> | <a href="#" class="text-primary">Terms of Use</a></p>
    </div>


</div>


</body>
</html>