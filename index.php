<?php
include 'header.php';
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="homecss.css">
</head> 
  <body>
  	<h1 id = "head1" class = "heading" > Is Life Giving You A Lemon??</h1>
  	<h2 id = "head2" class = "heading" > Have a Coffee With Us !!</h2>
    <div id = "container">
      <div id = "main">
  	<div class="upper">
  		<h1 id = "upperhead"> <!-- <img id= "imgupper" src="page1.jpg" alt="Supportgroup">--> About We Help Us</h1>
  		<p id = upperpara>  
  			Sometimes people don't understand what you are going through. If you have lost a loved one, if you are going through something others don't understand, we are here for you.</br> </br>This support group is to share our sorrows, our struggles, our defeats, our wins.</br> </br> We are you. We are the survivors of cancer, we are the ones who are defeated by cancer, we are the ones who nobody ever understood, we are you. We might be stangers at first, but you will soon understand we are you.
  		</p>
    </div>
    <div class="middle">
    	<!--<h1 id = "middlehead"> Today's Inspirational Story</h1>  -->
  		<p id = middlepara>  <img id= "imgmiddle" src="page1_2.jpg" alt="Carl Sagan"> <h2> Today's quote of the day author: Carl Sagan </h2> </br>
  			Carl Edward Sagan (November 9, 1934 – December 20, 1996) was an astronomer, cosmologist, astrophysicist, astrobiologist, author, science popularizer, and science communicator in astronomy and other natural sciences.</br></br> He is best known as a science popularizer and communicator. His best known scientific contribution is research on extraterrestrial life, including experimental demonstration of the production of amino acids from basic chemicals by radiation.
  		</p>
    </div>
  </div>
</div>
  </body>
</html>

<?php

include 'footer.php';

?>

<script>
  $("active").click(function(){
      $(this).toggleClass("clicked");
    });
</script>