<?php
$con=mysqli_connect("localhost","root","","place4u");
$result=mysqli_query($con,"select * from restaurants");
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurants</title>
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


        .col-md-3 img{
            width: 100%;
        }

        .col-md-3 ul li {
            color: #007bff;
        }
        .fa-star-o:hover{
            color: yellow;
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
                    <a href="Restaurants.php" class="nav-link text-white"><span class="fa fa-glass"></span> Restaurants</a>
                </li>
                <li class="nav-item pt-2 pb-2">
                    <a href="Hotels.php" class="nav-link"><span class="fa fa-home"></span> Hotels</a>
                </li>
                <li class="nav-item pt-2 pb-2">
                    <a href="Coffee%20Bars.php" class="nav-link"><span class="fa fa-coffee"></span> Coffee bars</a>
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
                <h3 class="text-danger text-center align-items-center" style="font-family: Calibri">Restaurants</h3>
            </div>
        </div>
<?php
		while($rows=mysqli_fetch_assoc($result))
		{
		?>
        <div class="row">
            <div class="col-4">
                <img class="img-fluid rounded" src=<?php echo $rows['photo']; ?>>
            </div>
            <div class="col-8">
                <h3><?php echo $rows['name']; ?></h3>
                <h4><?php echo $rows['information']; ?></h4>
                <h4><?php echo $rows['contact']; ?></h4>
                <div class="row">
                    <div class="col-10">
                        <h4>Review this Place!</h4>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                        <div class="card">
                            <h5 class="card-header">Leave a Comment:</h5>
                            <div class="card-body">
                                <form action="code2.php" method="POST">
                                    <div class="form-group">
                                        <textarea name="comment" class="form-control" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit" value=<?php echo $rows['photo']; ?>>Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
<?php
		}
		?>
        <br>
        <hr class="hr-border">
        <br>
        <div class="container pt-3">
            <div class="row">
                <div class="col-md-12">
                    <h5>Contact: </h5>
                    <p>Have a question or feedback? Contact me!</p>
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