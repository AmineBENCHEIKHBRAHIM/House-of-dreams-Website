<!DOCTYPE html>
<html lang="en">
<head>
    <title>Main</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/grid_12.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/jqtransform.css">
    <script src="js/jquery-1.7.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/cufon-yui.js"></script>
    <script src="js/vegur_400.font.js"></script>
    <script src="js/Vegur_bold_700.font.js"></script>
    <script src="js/cufon-replace.js"></script>
    <script src="js/tms-0.4.x.js"></script>
    <script src="js/jquery.jqtransform.js"></script>
    <script src="js/FF-cash.js"></script>
    <script>
		$(document).ready(function(){
			$('.form-1').jqTransform();					   	
			$('.slider')._TMS({
				show:0,
				pauseOnHover:true,
				prevBu:'.prev',
				nextBu:'.next',
				playBu:false,
				duration:1000,
				preset:'fade',
				pagination:true,
				pagNums:false,
				slideshow:7000,
				numStatus:false,
				banners:false,
				waitBannerAnimation:false,
				progressBar:false
			})		
		});
	</script>
	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
    	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
</head>
<body>
<div class="main">
<!--==============================header=================================-->
<header>
    <div>
        <h1><a href="index.html"><img src="images/logo1.jpg" alt=""></a></h1>
        <div class="social-icons">
        	<span>Follow Us:</span>
            <a href="#" class="icon-3"></a>
            <a href="https://www.facebook.com/" class="icon-2"></a>
            <a href="https://twitter.com/" class="icon-1"></a>
        </div>
        <div id="slide">		
            <div class="slider">
                <ul class="items">
                    <li><img src="images/slider-1.jpg" alt="" /></li>
                    <li><img src="images/slider-2.jpg" alt="" /></li>
                    <li><img src="images/slider-3.jpg" alt="" /></li>
                </ul>
            </div>	
            <a href="#" class="prev"></a><a href="#" class="next"></a>
        </div>
        <nav>
            <ul class="menu">
                <li class="current"><a href="index.html">Main</a></li>
                <li><a href="buying.html">Buying</a></li>
                <li><a href="selling.html">Selling</a></li>
                <li><a href="renting.html">Renting</a></li>
                <li><a href="finance.html">Finance</a></li>
                <li><a href="contacts.html">Contacts</a></li>
            </ul>
        </nav>
    </div>
</header>   
<!--==============================content================================-->
<section id="content">
    <div class="container_12">	
      <div class="grid_8">
        <h2 class="top-1 p3">These are the results of your search!</h2>
        <p class="p2">Results :</p>
        <p class="line-1">
		<?php

if(isset($_POST["select1"]) AND isset($_POST["select2"]) AND isset($_POST["select1"]) AND isset($_POST["select1"]))
{
try
{
$bdd = new PDO('mysql:host=localhost;dbname=house_of_dreams', 'root', '');
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}


$lechamp0 = $_POST["select1"] ;
$lechamp1 = $_POST["select2"] ;
$lechamp2 = $_POST["select3"];
$lechamp3 = $_POST["select4"];


$req = $bdd->prepare('SELECT id,type,location,floor,baths,name FROM home WHERE type=? AND location=? AND floor=? AND baths=?');
$req->execute(array($lechamp0,$lechamp1,$lechamp2,$lechamp3));
if(!$donnees = $req->fetch()) {echo "No home corresponding to these Criteria";echo '<br>';}//s'exécute si la requète est vide
//on refait la requète puisque le fetch a été exécuté une fois
$req = $bdd->prepare('SELECT id,type,location,floor,baths,name FROM home WHERE type=? AND location=? AND floor=? AND baths=?');
$req->execute(array($lechamp0,$lechamp1,$lechamp2,$lechamp3));

while ($donnees = $req->fetch())//s'execute lorsque la requète n'est pas vide
{
echo $donnees['name'].'<br/>';
}
}
else echo "You should mention all parameters";
echo '<a href="acc.html"> Home Page </a>';
?>

		
		
		</p>
        <h2 class="p4"></h2>
        <div class="wrap block-1">
            <div>
                
            </div>
            <div>
                
            </div>
            <div class="last">
               
            </div>
        </div>
      </div>
      <div class="grid_4">
        <div class="left-1">
            <h2 class="top-1 p3">Find your home</h2>
            <form id="form-1" class="form-1 bot-1" method="post" action="recherche.php">
                <div class="select-1">
                    <label>Home type</label>
                    <select name="select1" >
                        <option>Homes for sale</option>
						<option>house with piscine</option>
						<option>house with garden</option>
						<option>house with cellar</option>
                    </select>   
                </div>
                <div>
                    <label>Location</label>
                    <input type="text" value="City" name="select2" onBlur="if(this.value=='') this.value='City'" onFocus="if(this.value =='City' ) this.value=''"  />
                </div>
                <div class="select-2">
                    <label>Floor</label>
                    <select name="select3" >
                        <option>1</option>
						<option>2</option>
						<option>3</option>
                    </select>   
                </div>
                <div class="select-2 last">
                    <label>Baths</label>
                    <select name="select4" >
                        <option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
                    </select>   
                </div> 
                <a onClick="document.getElementById('form-1').submit()" class="button">Search</a>
                <div class="clear"></div>
            </form>
            <h2 class="p3">Find our office all over the world</h2>
            <img src="images/page1-img4.png" alt="">
            <div class="lists">
                <ul class="list-1">
                    
                </ul>
                <ul class="list-1 last">
                    
                </ul>
            </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>  
</section> 
</div>    
<!--==============================footer=================================-->
    <footer>
        <p>© 2013 house of dreams</p>
        <p>by Rihab CHIBANI </p>
    </footer>	    
<script>
	Cufon.now();
</script>
</body>
</html>
