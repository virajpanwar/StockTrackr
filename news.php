<!DOCTYPE html>  
<html>
<head>
<title>The Latest Stock News | StatsStockMarket</title>
<meta name="description" content="Read on the latest news & events going on in the stock market world. Stay upto date on various exchanges and coins like Bitcoin, Ethereum, Ripple, Cardano & more.">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/scrollingText.css">
  <link rel="stylesheet" type="text/css" href="css/graphmod.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/sort-table.css" title="">
  <link rel="stylesheet" type="text/css" href="css/nv.d3.css">
  <link rel="stylesheet" type="text/css" href="css/newsc.css">
   <script type="text/javascript" src="js/framework/d3.v3.min.js"></script>
   <script type="text/javascript" src="js/framework/nv.d3.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
  <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
	//sort table if not mobile or tablet view
	if ($(window).width() > 970) {
		document.write('<\/script type="text/javascript" src="js/sort-table.js"><\/script>');
	}
   </script>
</head>

<body>  
<!-- Return to Top -->
<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
<a href="javascript:" id="return-to-bottom"><i class="fa fa-chevron-down"></i></a>

<?php
// Function which saves the data if you didn't do a request in the past 60 seconds
function cache()
{	
    return json_decode(file_get_contents('./json/stocklist.json'), true);
}

// Function to get the data and use it whenever you need it
function getData ()
{
    return cache();
}


	

$data = getData();
$totalpages = 1;

$message = "";


?>

<div class="sticky">
  <div id="txtitle" style="background-color:#0b1116; padding: 4px;" >
		<a href="market"><img  src="img/banner.png" width="280" height="45"></a>
	 <div id="seachboxy" class="navbar-form navbar-right" style="margin-top: 5px !important;">
            <div class="input-group">
                <input id="getinput" type="text" class="form-control" placeholder="Search">
                <span class="input-group-btn">
                    <button id="" type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
  </div>

<ul class="nav nav-tabs nav-justified" id="myTab" style="border-bottom:0px">
			  <li ><a href="market.php"><span class="glyphicon glyphicon glyphicon glyphicon-stats carty" aria-hidden="true"></span> Market</i></a></li>
			  <li class="active"><a href="news"  ><span class="glyphicon glyphicon glyphicon-globe carty" aria-hidden="true"></span> News</a></li>
			  <li><a href="about.php"><span class="glyphicon glyphicon glyphicon glyphicon-question-sign carty" aria-hidden="true"></span> About</a></li>
			</ul>
	

	
</div>
	

	<div id="fillertop">
	</div>
	
<?php


echo "<div class=\"wrapper\">";
$max_10 = 1;

	foreach($data['data'] as $value) {
			if($max_10 < 10){
				$rank = $max_10; 
				$name = $value["quote"]["symbol"]; 
				$usdpricetop = $value["quote"]["latestPrice"]; 
				$percentchangetop = $value["quote"]["changePercent"]; 
				
				$logo = $value["quote"]["symbol"]; 
				$str = strtolower($logo);
					if((float)$percentchangetop > 0){
						$message =  $message . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . "<img class=\"ico_img\" src=\"logos/" . $str . ".png\" class=\"logo-sprite\" style=\"width:20px; height:16px;\">" . $rank . "." . $name . " <span class='positive_growth4'>$" . number_format($usdpricetop,2) . "<i class='glyphicon glyphicon-chevron-up' ></i></span> ";
					}
					else{
						$message =  $message . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . "<img class=\"ico_img\" src=\"logos/" . $str . ".png\" class=\"logo-sprite\" style=\"width:20px; height:16px;\">" . $rank . "." . $name . " <span class='negative_growth4'>$" . number_format($usdpricetop,2) . "<i class='glyphicon glyphicon-chevron-down' ></i></span> ";
					}
				
				$max_10 = $max_10 + 1;
			}
			else{
				break;
			}
	}

	echo "<p>" . $message . "</p>";
echo "</div>";


// Function which saves the data if you didn't do a request in the past 60 seconds
function cacheGetStockIntraday()
{
    return json_decode(file_get_contents('./json/intradaystats.json'), true);
}

// Function to get the data and use it whenever you need it
function getGetStockIntraday ()
{
    return cacheGetStockIntraday();
}


$getintradaystats = getGetStockIntraday();
$notionalval = $getintradaystats["data"]["notional"]["value"];
$mkvol = $getintradaystats["data"]["volume"]["value"];
$marketShare = $getintradaystats["data"]["marketShare"]["value"];
$routedvol = $getintradaystats["data"]["routedVolume"]["value"];
$tottradedstocks = $getintradaystats["data"]["symbolsTraded"]["value"];
?>




<div id="cryptinflun">
	<div id="innercrypt">
		<div id="marg">
			<p style="display:inline; color:#b7b7b7;">Stocks: <strong><a class="infcolor"><?php echo number_format($tottradedstocks) ?></a></strong></p>
			<p style="display:inline;  color:#b7b7b7;">/ Routed Volume: <strong><a class="infcolor"><?php echo number_format($routedvol) ?></a></strong></p>
			<p style="display:inline;  color:#b7b7b7;">Notional: <strong><a class="infcolor"><?php echo '' . number_format($notionalval) ?></a></strong></p>
			<p style="display:inline;  color:#b7b7b7;"> / 24h Vol: <strong><a class="infcolor"><?php echo '' . number_format($mkvol) ?></a></strong> / Market Share: <strong><a class="infcolor"><?php echo number_format($marketShare,4) . '%' ?></a></strong></p>
		</div>
	</div>
</div>




 <?php
 $getpage = 0;
 
 	if(!isset($_GET['page'])){
		$getpage = 0;
	}
	else{
		if(is_numeric($_GET['page'])){
			$getpage = htmlspecialchars($_GET['page']);
		}
		else{
			$getpage = 0;
		}
	}
 

 $page = $getpage*10;

/* =============================== GRAB NEWS =================================================  */

// Function which saves the data if you didn't do a request in the past 60 seconds
function cacheGetStockNews()
{
    return json_decode(file_get_contents('./json/stocknews.json'), true);
}

// Function to get the data and use it whenever you need it
function getGetStockNews()
{
    return cacheGetStockNews();
}

/* =============================== GRAB NEWS ================================================= */
 
$rss = getGetStockNews();
$results = array();
$num = 0;
$x = $page;
//echo '<h4>'. $rss->channel->title . '</h4>';

foreach ($rss['data'] as $value) {
   $results[$num]["titlelink"] =  $value["url"];
   $results[$num]["title"] = $value["headline"];
   $content = preg_replace("/<img[^>]+\>/i", "", $value["summary"]); 
   $results[$num]["description"] = $content;

   
   //get image
   $results[$num]["img"] =  $value["image"];
   
   
   $num = $num + 1;
} 

if($x < $num-1){$x = $page;} else{$x = 0;} 


$newspages = round($num/10);


?>

<!-- ============================== Heading ================================ -->

<div class="tptextbody">
	 <div class="npx">
		<div class="newstitle">
			<h4 class="tphead" style="color: white;">News</h4>
		</div>
	</div>
</div>

 <div id="gads" style="margin: 10px auto 0px auto; display: flex; justify-content: center; align-items: center; text-align:center; background-color: #161d24; width: 100%; height: 0;">
	
 </div>
<!-- ============================== slideshow news ================================ -->
<div class="newsslide">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
      
        <div class="item active">
          <img src="<?php echo $results[$x]["img"] ?>" style="width:828px;height:452px;">
           <div class="carousel-caption">
            <h4><a href="<?php echo $results[$x]["titlelink"]; ?>"><?php echo $results[$x]["title"]; ?></a></h4>
            <p><?php echo $results[$x]["description"]; if($x < $num-1){$x = $x+1;} else{$x = 0;} ?></p>
          </div>
        </div><!-- End Item -->
 
         <div class="item">
          <img src="<?php echo $results[$x]["img"] ?>" style="width:828px;height:452px;">
           <div class="carousel-caption">
            <h4><a href="<?php echo $results[$x]["titlelink"]; ?>"><?php echo $results[$x]["title"]; ?></a></h4>
            <p><?php echo $results[$x]["description"]; if($x < $num-1){$x = $x+1;} else{$x = 0;} ?></p>
			</div>
        </div><!-- End Item -->
        
        <div class="item">
           <img src="<?php echo $results[$x]["img"] ?>" style="width:828px;height:452px;">
           <div class="carousel-caption">
           <h4><a href="<?php echo $results[$x]["titlelink"]; ?>"><?php echo $results[$x]["title"]; ?></a></h4>
            <p><?php echo $results[$x]["description"]; if($x < $num-1){$x = $x+1;} else{$x = 0;} ?></p>
			</div>
        </div><!-- End Item -->
        
        <div class="item">
           <img src="<?php echo $results[$x]["img"] ?>" style="width:828px;height:452px;">
           <div class="carousel-caption">
           <h4><a href="<?php echo $results[$x]["titlelink"]; ?>"><?php echo $results[$x]["title"]; ?></a></h4>
            <p><?php echo $results[$x]["description"]; if($x < $num-1){$x = $x+1;} else{$x = 0;} ?></p>
			</div>
        </div><!-- End Item -->

        <div class="item">
           <img src="<?php echo $results[$x]["img"] ?>" style="width:828px;height:452px;">
           <div class="carousel-caption">
            <h4><a href="<?php echo $results[$x]["titlelink"]; ?>"><?php echo $results[$x]["title"]; ?></a></h4>
            <p><?php echo $results[$x]["description"];  if($x > 3){$x=$x-4;} else{$x = 30;} ?></p>
			</div>
        </div><!-- End Item -->
                
      </div><!-- End Carousel Inner -->


    <ul class="list-group col-sm-4" style="height: 100%;">
      <li data-target="#myCarousel" style="height: 20%;" data-slide-to="0" class="list-group-item active"><h4><a href="<?php echo $results[$x]["titlelink"]; ?>"><?php echo $results[$x]["title"]; if($x < $num-1){$x = $x+1;} else{$x = 0;} ?></a></h4></li>
      <li data-target="#myCarousel" style="height: 20%;" data-slide-to="1" class="list-group-item"><h4><a href="<?php echo $results[$x]["titlelink"]; ?>"><?php echo $results[$x]["title"]; if($x < $num-1){$x = $x+1;} else{$x = 0;} ?></a></h4></li>
      <li data-target="#myCarousel" style="height: 20%;" data-slide-to="2" class="list-group-item"><h4><a href="<?php echo $results[$x]["titlelink"]; ?>"><?php echo $results[$x]["title"]; if($x < $num-1){$x = $x+1;} else{$x = 0;} ?></a></h4></li>
      <li data-target="#myCarousel" style="height: 20%;" data-slide-to="3" class="list-group-item"><h4><a href="<?php echo $results[$x]["titlelink"]; ?>"><?php echo $results[$x]["title"]; if($x < $num-1){$x = $x+1;} else{$x = 0;} ?></a></h4></li>
      <li data-target="#myCarousel" style="height: 20%;" data-slide-to="4" class="list-group-item"><h4><a href="<?php echo $results[$x]["titlelink"]; ?>"><?php echo $results[$x]["title"]; if($x < $num-1){$x = $x+1;} else{$x = 0;} ?></a></h4></li>
    </ul>

      <!-- Controls -->
      <div class="carousel-controls">
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
      </div>

    </div><!-- End Carousel -->
</div>

 <div id="gads2" style="margin: 10px auto 0px auto; text-align:center;  display: flex; justify-content: center; align-items: center; background-color: #161d24; width: 100%; height: 0;">

 </div>
<!-- ============================== triple article ================================ -->
<div class="newsart">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="#" class="MakaleYazariAdi"> </a>
           
        </div>
        <div class="panel-body">
            <div class="media">
                <div class="media-left">
                        <img class="media-object" height="173" width="260" src="<?php echo $results[$x]["img"] ?>" alt="">
                </div>
                <div class="media-body">
                <h4 class="media-heading"><a href="<?php echo $results[$x]["titlelink"]; ?>"><?php echo $results[$x]["title"]; ?></a></h4>
               <?php echo $results[$x]["description"]; ?> 
			   By cointelegraph
				<div class="clearfix"></div>
                <div class="btn-group" role="group" id="BegeniButonlari">
                    <button type="button" onclick="location.href='<?php echo $results[$x]["titlelink"]; if($x < $num-1){$x = $x+1;} else{$x = 0;}?>'" class="btn btn-default2">Read More</button>
                </div>                 
               </div>
            </div>
        </div>
    </div>
</div>

<div class="newsart">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="#" class="MakaleYazariAdi"> </a>
           
        </div>
        <div class="panel-body">
            <div class="media">
                <div class="media-left">
                        <img class="media-object" height="173" width="260" src="<?php echo $results[$x]["img"] ?>" alt="">
                </div>
                <div class="media-body">
                <h4 class="media-heading"><a href="<?php echo $results[$x]["titlelink"]; ?>"><?php echo $results[$x]["title"]; ?></a></h4>
               <?php echo $results[$x]["description"]; ?> 
			   By cointelegraph
			   <div class="clearfix"></div>
                <div class="btn-group" role="group" id="BegeniButonlari">
                    <button type="button" onclick="location.href='<?php echo $results[$x]["titlelink"]; if($x < $num-1){$x = $x+1;} else{$x = 0;}?>'" class="btn btn-default2">Read More</button>
                </div>                 
               </div>
            </div>
        </div>
    </div>
</div>

<div class="newsart">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="#" class="MakaleYazariAdi"> </a>
           
        </div>
        <div class="panel-body">
            <div class="media">
                <div class="media-left">
                       <img class="media-object" height="173" width="260" src="<?php echo $results[$x]["img"] ?>" alt="">
                </div>
                <div class="media-body">
               <h4 class="media-heading"><a href="<?php echo $results[$x]["titlelink"]; ?>"><?php echo $results[$x]["title"]; ?></a></h4>
               <?php echo $results[$x]["description"]; ?> 
			   By cointelegraph
			   <div class="clearfix"></div>
                <div class="btn-group" role="group" id="BegeniButonlari">
                    <button type="button" onclick="location.href='<?php echo $results[$x]["titlelink"]; if($x < $num-1){$x = $x+1;} else{$x = 0;}?>'" class="btn btn-default2">Read More</button>
                </div>                 
               </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================== triple article END================================ -->
<!-- ============================== group articles ================================ -->
<div class="blog-section paddingTB60 ">
<div class="container">
	<div class="row">
		<div class="site-heading text-center">
						<div class="border"></div>
					</div>
	</div>
	<div class="row text-center">
	       <div class="col-sm-6 col-md-4">
							<div class="blog-box">
								<div class="blog-box-image">
									<img src="<?php echo $results[$x]["img"] ?>" class="img-responsive" alt="">
								</div>
								<div class="blog-box-content">
									<h4 class="media-heading"><a href="<?php echo $results[$x]["titlelink"]; ?>"><?php echo $results[$x]["title"]; ?></a></h4>
			   By cointelegraph      
									<p> <?php echo $results[$x]["description"]; ?> </p>
									<a href="<?php echo $results[$x]["titlelink"]; if($x < $num-1){$x = $x+1;} else{$x = 0;}?>" class="btn tbtn btn-default2 site-btn">Read More</a>
								</div>
							</div>
						</div> <!-- End Col -->	
	 <div class="col-sm-6 col-md-4">
								<div class="blog-box">
									<div class="blog-box-image">
										<img src="<?php echo $results[$x]["img"] ?>" class="img-responsive" alt="">
									</div>
									<div class="blog-box-content">
										<h4 class="media-heading"><a href="<?php echo $results[$x]["titlelink"]; ?>"><?php echo $results[$x]["title"]; ?></a></h4> 
			   By cointelegraph     
									<p> <?php echo $results[$x]["description"]; ?> </p>
										<a href="<?php echo $results[$x]["titlelink"]; if($x < $num-1){$x = $x+1;} else{$x = 0;} ?>" class="btn  tbtn btn-default2 site-btn">Read More</a>
									</div>
								</div>
							</div> <!-- End Col -->						
			<div class="col-sm-6 col-md-4">
							<div class="blog-box">
								<div class="blog-box-image">
									<img src="<?php echo $results[$x]["img"] ?>" class="img-responsive" alt="">
								</div>
								<div class="blog-box-content">
									<h4 class="media-heading"><a href="<?php echo $results[$x]["titlelink"]; ?>"><?php echo $results[$x]["title"]; ?></a></h4> 
			   By cointelegraph     
									<p> <?php echo $results[$x]["description"]; ?> </p>
									<a href="<?php echo $results[$x]["titlelink"]; if($x < $num-1){$x = $x+1;} else{$x = 0;}?>" class="btn tbtn btn-default2 site-btn">Read More</a>
								</div>
							</div>
						</div> <!-- End Col -->				
			<div id="lastarticle" class="col-sm-6 col-md-4">
							<div class="blog-box">
								<div class="blog-box-image">
									<img src="<?php echo $results[$x]["img"] ?>" class="img-responsive" alt="">
								</div>
								<div class="blog-box-content">
									<h4 class="media-heading"><a href="<?php echo $results[$x]["titlelink"]; ?>"><?php echo $results[$x]["title"]; ?></a></h4>
			   By cointelegraph      
									<p> <?php echo $results[$x]["description"]; ?> </p>
									<a href="<?php echo $results[$x]["titlelink"]; if($x < $num-1){$x = $x+1;} else{$x = 0;}?>" class="btn tbtn btn-default2 site-btn">Read More</a>
								</div>
							</div>
						</div> <!-- End Col -->
    </div>
</div>
</div>
<!-- ============================== group articles END ================================ -->

<script> var totalpaget = <?php echo $newspages; ?>;  var ok = <?php echo intval(isset($_GET['page'])); ?>;</script>
<script src="js/newsjs.js" type="text/javascript"></script>


<div id="navtabbtn">
			<button id="backbtn" class="navbuttontable" >Back</button>
			<span style="color:white; font-size: 15px;"> 
			<?php 
			echo "&nbsp;&nbsp;&nbsp;";
			for ($x = 1; $x <= ($num/10); $x++) {
				if($x == $getpage+1){
					echo " <span style='color:#337ab7;'>&nbsp;[$x]&nbsp;</span> ";
				}
				else{
					echo " &nbsp;$x&nbsp; ";
				}					
			}  
			echo "&nbsp;&nbsp;&nbsp;";
			?>
			</span>
			<button id="nextbtn" class="navbuttontable" >Next</button>
		</div>


<div id="slidebottommenu" class="bottomNav turnback">
<button id="" onclick="bottombarslideup()"  class="slideupmenu" ><span class="glyphicon glyphicon-triangle-top"></span></button>
  <div  style="display: table; margin: 0 auto;">
			<button  id="homebtn2" class="navbuttontable2" ><span class="glyphicon glyphicon-align-left"></span> Home </button>
			<div id="" class="navbar-form navbar-right">
            <div class="input-group">
                <input id="getinput2" type="text" class="form-control" placeholder="Search">
                <span class="input-group-btn">
                    <button id="" type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
		</div>
</div>

<footer id="feett" class="nb-footer">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="about">

	<div class="social-media">
		<ul class="list-inline">
			<li><a href="" title=""><i class="fa fa-facebook"></i></a></li>
			<li><a href="" title=""><i class="fa fa-twitter"></i></a></li>
			<li><a href="" title=""><i class="fa fa-google-plus"></i></a></li>
			<li><a href="" title=""><i class="fa fa-instagram"></i></a></li>
		</ul>
	</div>
</div>
</div>

<div class="col-md-3 col-sm-6">
<div class="footer-info-single">
	<h2 class="title">Navigation</h2>
	<ul class="list-unstyled">
		<li><a href="market" title=""><i class="fa fa-angle-double-right"></i> Market</a></li>
		<li><a href="news" title=""><i class="fa fa-angle-double-right"></i> News</a></li>
		<li><a href="about" title=""><i class="fa fa-angle-double-right"></i> About</a></li>
	</ul>
</div>
</div>

<div class="col-md-3 col-sm-6">
<div class="footer-info-single">
	<h2 class="title">Information</h2>
	<ul class="list-unstyled">
		<li><a href="contact" title=""><i class="fa fa-angle-double-right"></i> Contact</a></li>
		<li><a href="" title=""><i class="fa fa-angle-double-right"></i> App Publisher</a></li>
	</ul>
</div>
</div>

<div class="col-md-3 col-sm-6">
<div class="footer-info-single">
	<h2 class="title">Security & privacy</h2>
	<ul class="list-unstyled">
		<li><a href="privacypolicy" title=""><i class="fa fa-angle-double-right"></i> Privacy Policy</a></li>
	</ul>
</div>
</div>

<div class="col-md-3 col-sm-6">
<div class="footer-info-single">
	<h2 class="title">Downloads &amp; Tools</h2>
	
</div>
</div>
</div>
</div>

<section class="copyright">
<p>Copyright © 2023. StockTrackr. | SEM 4 Project</p>
</section>
</footer>

</body>
</html>