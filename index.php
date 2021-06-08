<?php
session_start();
if(!isset($_SESSION['email'])) {
    header("Location: login.php");
}
else{ 
?> 


<?php
include("connection.php");
error_reporting(0);
$query = " SELECT * FROM sub4";
$data =  mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tolet/Rent,Plot,Land List | VaraHobe.com</title>
	<link rel="icon" href="photos/title_icon.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Bootstrap css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="css/show_post_grid_view.css">
</head>
<body>
	<header>
		<div class="topmargin"></div>

		<div class="logo">
			<img src="photos/logo.jpeg" height="50" width="50">
		</div>

		<div class="Navigation">
			<ul>
				<li style="background: #1abc9c;"><a href="index.php">Home</a></li>
				<li><a href="#">For Rent</a>
					<ul>
						<li><a href="family_house.php">Family House</a></li>
						<li><a href="bacholor_mess.php">Bachelor Mess</a></li>
						<li><a href="sublet.php">Sublet</a></li>
						<li><a href="garage.php">Garage</a></li>
						<li><a href="factory.php">Factory</a></li>
						<li><a href="office.php">Office</a></li>
					</ul>
				</li>
				<li><a href="submit.php">Submit Post</a></li>
				<li><a href="advertising_plot.php">Advertising of Plot</a></li> 
				<li><a href="rend_land.php">Rending of Land</a></li>
				<li><a href="wanted_post.php">Wanted Post</a></li>
			</ul>
		</div>

        <div class="login" session_start();>
            
            <a class="boxed" href="logout.php">
                        <?=$_SESSION['name'];?>
            </a>
        </div>
	</header> <br><br><br>

	<!--For Search Bar -->

    <form method="POST" action="" accept-charset="UTF-8">
                        <div class="form-row">

                        <?php
                        
                            if(isset($_POST['ad_districts']) || isset($_POST['ad_area']) || isset($_POST['ad_property_type'])){
                                $search_district = $_POST['ad_districts'];
                                $search_area = $_POST['ad_area'];
                                $search_property_type = $_POST['ad_property_type'];

                                $sql = "SELECT * FROM sub4 WHERE district = '$search_district' || area = '$search_area' || property_type = '$search_property_type'";
                            }else
                            {
                                $sql = "SELECT * FROM sub4";
                                $search_district = "";
                                $search_area = "";
                                $search_property_type = "";
                            }
                            $result = mysqli_query($conn,$sql)
                        ?>



                            <div class="form-group col-md-4">
                                <select name="ad_districts" class="districts form-control form-control-lg select2-single"
                                >
                                    <option value="">Select District</option>
                                                                            <option value="Rajshahi">Rajshahi</option>
                                                                            <option value="Dhaka">Dhaka</option>
                                                                            <option value="Khulna">Khulna</option>
                                                                            <option value="BARISAL">BARISAL</option>
                                                                            <option value="Chittagong">chittagong</option>
                                                                            <option value="BOGRA">BOGRA</option>
                                                                            <option value="Maymansing">maymansing</option>
                                                                            <option value="Sylet">Sylet</option>
                                                                            
                                                                    </select>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="selectArea">
                                    <select name="ad_area" class="areaSearch form-control form-control-lg select2-single">
                                        <option value="">Select Area Name</option>
                                        <option value="Uttara">Uttara</option>
                                        <option value="Bonani">Bonani</option>
                                        <option value="Gulshan 1">Gulshan 1</option>
                                        <option value="Gulshan 2">Gulshan 2</option>
                                        <option value="Gulshan 3">Gulshan 3</option>
                                        <option value="Uttar Badda">Uttar Badda</option>
                                        <option value="Merul Badda">Merul Badda</option>
                                        <option value="Mohakhali">Mohakhali</option>
                                        <option value="Mirpur 1">Mirpur 1</option>
                                        <option value="Mirpur 2">Mirpur 2</option>
                                        <option value="Mirpur 10">Mirpur 10</option>
                                        <option value="Shamoli">Shamoli</option>
                                        <option value="Kollanpur">Kollanpur</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group col-md-3">
                                <select  name="ad_property_type" class="form-control form-control-lg select2-single">
                                    <option value="">Select property type</option>
                                    <option value="commercial space">Commercial Space</option>
                                    <option value="office">Office</option>
                                    <option value="flat / apartment">Flat / Apartment</option>
                                    <option value="houses">Houses</option>
                                    <option value="land">Land</option>
                                    <option value="others house">Others</option>
                                </select>
                            </div>
                            <div class="form-group col-md-1">
                                <button type="submit" class="btn btn-lg btn-info">Search</button>
                            </div>
                        </div>
                        <div class="collapse" id="collapseExample">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <select name="ad_beds" class="form-control form-control-lg select2-single">
                                        <option value="">BEDS</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <select name="ad_baths" class="form-control form-control-lg select2-single">
                                        <option value="">BATHS</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                        </div>
  </form><br><br><br><br><br>

    <!--End of Search Bar -->

	<!--Slide Viewr -->
	<div class="slideshow-container">

		<div class="mySlides fade">
		  <div href="#" class="numbertext"></div>
		 <a href="family_house.php"> <img   src="001.jpg" style="width:100%; height:450px"></a>
		  <div class="text"><a href="family_house.php" class="slid_a" style="" >Family House</a></div>
		</div>

		<div class="mySlides fade">
		  <div class="numbertext"></div>
		  <a href="bacholor_mess.php"> <img   src="002.jpg" style="width:100%; height:450px"></a>
		  <div class="text"><a href="bacholor_mess.php"  class="slid_a" >Bachelor Mess</a></div>
		</div>

		<div class="mySlides fade">
		  <div class="numbertext"></div>
		  <a href="sublet.php"> <img   src="003.jpg" style="width:100%; height:450px"></a>
		  <div class="text"><a href="sublet.php" class="slid_a">Sublet</a></div>
		</div>
		<div class="mySlides fade">
		  <div class="numbertext"></div>
		  <a href="garage.php"> <img   src="004.jpg" style="width:100%; height:450px"></a>
		  <div class="text"><a href="garage.php" class="slid_a">Garage</a></div>
		</div>
		<div class="mySlides fade">
		  <div class="numbertext"></div>
		  <a href="factory.php"> <img   src="005.jpg" style="width:100%; height:450px"></a>
		  <div class="text"><a href="factory.php" class="slid_a">Factory</a></div>

		</div><div class="mySlides fade">
		  <div class="numbertext"></div>
		  <a href="office.php"> <img   src="005.jpg" style="width:100%; height:450px"></a>
		  <div class="text"><a href="office.php" class="slid_a">Office</a></div>
		</div>
		<div style="text-align:center">
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		  <span class="dot"></span>  
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		</div>
	</div>

	<!--End of Slide Viewr -->

	<!--For View Rental Post -->
    
    <div class="container">
        <div class="row">
    
            <?php 

            if($total != 0)
            { 
                while ($row = mysqli_fetch_object($result)){
                    
                    ?>

                    <!--Product -->
                    <div class="col-md-4 product-grid">
                        <div class="image">
                            <a href="details.html">

                                <?php
                                echo "<img src ='".$row->image."' height = '300' width = '350'</a>";
                                ?>
                                
                                <div class="overlay">
                                    <div class="details">View Details</div>
                                </div>
                            </a>
                        </div>

                        <h2>
                        <?php
                            echo $row->ad_title
                        ?>
                        </h2>

                        <h6>
                            <?php
                                echo $row->property_type
                            ?>
                        </h6>

                        <h5>
                            <?php
                                echo $row->area
                            ?>,
                            <?php
                                echo $row->district
                            ?>
                        </h5>

                        <h5 style="color: #bdc3c7">
                            <?php
                                echo $row->date
                            ?>  
                        </h5>

                        <h5 class="price">
                            <?php
                                echo $row->amount
                            ?>
                        </h5>

                        <h5> <a href="details.html"> Contact with Property Holder</a></h5>
                            <a href="details.html" class="btn rent">Details</a>
                    </div>
                    <!--Product -->
                    <?php

                }

            }
            else
            {
                echo "No Record Found";
            }

            ?>

        </div>
    </div>


    <!--End of Post View -->

    <!--Staring of Footer View -->

    <?php 
        include("footer.php");
     ?>
    <!--End of Footer View -->


	<!--For Slide Show -->
	<script>
		var slideIndex = 0;
		showSlides();

		function showSlides() {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("dot");
		  for (i = 0; i < slides.length; i++) {
		    slides[i].style.display = "none";  
		  }
		  slideIndex++;
		  if (slideIndex > slides.length) {slideIndex = 1}    
		  for (i = 0; i < dots.length; i++) {
		    dots[i].className = dots[i].className.replace(" active", "");
		  }
		  slides[slideIndex-1].style.display = "block";  
		  dots[slideIndex-1].className += " active";
		  setTimeout(showSlides, 2000); // Change image every 2 seconds
		}
		</script>
		<!--bootstrap JS CDN-->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
			integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
			integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
</body>
</html>

<?php
    }
?>