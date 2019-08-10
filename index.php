<!DOCTYPE html>
<html>
<head>
	<title>quick post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/gallery.css">
<link rel="stylesheet" href="css/pagination.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

    <style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>
</head>

<body>
    <div class = "container">

<!--a href="login.php">Login</a>/ <a href="registration.php">Registration</a--> 
<html>
     <head>
      <title>quickpost</title>
      <link rel="stylesheet" type="text/css" href="quickpost.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
     </head>

     <body>
      
      <div class="div1">
        <div class="row">
          <a href="registration.php">Registration</a>/<a href="login.php">Login</a><br><br>
          <a href="forgotpass.html">Forgot Password</a> 
      </div> 
      </div>
        <br>
        <br>

       
        <div class="div2">
              <div class="row">
              
                 <div class="col-md-4">
                      <div class="gallery">
                        <img src="pavna.jpeg">
                        <br>
                        <br>
                        <p>Pavana Lake is essentially an artificial lake brought into existence due to the Pavana dam. A picturesque sight, the Pavana Lake, along with the Pavana Dam.<a href="img1.php">Read More...</a></p>
                      </div>
                 </div>

                 <div class="col-md-4">
                      <div class="gallery">
                        <img src="mansarovrdam.jpg">
                        <br>
                        <br>
                        <p>Mansarovar dam Bhakra Dam Aug 15 2008.JPG The Bhakra Dam
                            Bhakra Dam is located in IndiaBhakra Dam Bhakra Dam in Bilaspur, Himachal Pradesh
                            <a href="img2.php">Read More...</a></p>
                      </div>
                 </div>
              
              <div class="col-md-4">
                      <div class="gallery">
                        <img src="khandawla.jpg">
                        <br>
                        <br>
                        <p>Khadakwasla Dam is a dam on the Mutha River 21 km (13 mi) from the centre of the city of Pune in Maharashtra, India. The dam created a reservoir known as Khadakwasla Lake..
                          <a href="img3.php">Read More...</a></p>
                      </div>
             </div>
            </div>
            <br>
            <br>
            
              <div class="row">
                    <div class="col-md-4">
                      <div class="gallery">
                        <img src="koyana.jpg">
                        <br>
                        <br>
                        <p>The Koyna Dam is one of the largest dams in Maharashtra, India. It is a rubble-concrete dam constructed on Koyna River which rises in Mahabaleshwar..<a href="img4.php">Read More...</a></p>
                      </div>
                    </div>
              
                    <div class="col-md-4">
                      <div class="gallery">
                        <img src="">
                        <br>
                        <br>
                        <p>The Mutha River is a river in western Maharashtra, India. It arises in the Western Ghats and flows eastward until it merges with the Mula River in the city of Pune..<a href="img5.php">Read More...</a></p>
                      </div>
                    </div>
              
                    <div class="col-md-4">
                      <div class="gallery">
                        <img src="mulamutha.JPG">
                        <br>
                        <br>
                        <p>Possibly the world's first soil dam. Work was started in 1976. Used for agricultural purposes only although a small electricity generation plant also runs besides...
                          <a href="img6.php">Read More...</a></p>
                        <br>
                        <br>
                      </div>
                    </div>
              
               </div>
        </div>
<br>
<?php
    $conn=mysqli_connect('localhost','root','','quickpost');
	if(!$conn){
		echo "connection failed";
	}

//select all

	$perpage = 6;
          if(isset($_GET["page"])){
          $page = intval($_GET["page"]);
          }else {
          $page = 1;
          }
          $calc = $perpage * $page;
          $start = $calc - $perpage;
          $result = mysqli_query($conn, "SELECT * FROM user ORDER BY id DESC  Limit $start, $perpage");
          $rows = mysqli_num_rows($result);

          if($rows){
          $i = 0;
        while($your_post = mysqli_fetch_assoc($result)) {
    	$id=$your_post['id'];
    	$title=$your_post['title'];
    	$image=$your_post['image'];
    	$content=$your_post['content'];
    	$content = substr($content,0,30).'...';
    	$link="article.php?id=".$id;

    echo' <div class="gallery">';
    echo' <div class="desc"><h3>'.$title.'</h3></div>';
   echo "<img src= data:image/jpg;base64,$image width='5%' height='5%'>";
 echo' <div class="desc">'.$content.'</div>';
 echo"<br>";
 echo'<a href="'.$link.'">Read More</a>';
echo '</div>';
    }


   

    
 
      }else{
              echo "<center>";
              echo "<font color = 'red'>";
              echo "NO POST YET !";
              echo "</font>";
              echo "</center>";
          }
	?>
    <br><br>
    

</div>
<center>
<?php
//page number footer
    if(isset($page)){
    $result = mysqli_query($conn,"select Count(*) As Total from user");
    $rows = mysqli_num_rows($result);
    if($rows){
    $rs = mysqli_fetch_assoc($result);
    $total = $rs["Total"];
    }
    $totalPages = ceil($total / $perpage);
    if($page <=1 ){
    //echo "<span id='page_links' style='font-weight: bold;'>&laquo;</span>";
    }else{
    $j = $page - 1;
    echo "<a href='index.php?page=$j'>&laquo;</a>";
    }
    for($i=1; $i <= $totalPages; $i++){
    if($i<>$page){
      echo "<a href='index.php?page=$i'>$i</a>";
    }
    else
    {
      echo "<a href='index.php?page=$i' class='active'>$i</a>";
    }
  }
  if($page == $totalPages )
  {
//echo "<span id='page_links' style='font-weight: bold;'>&raquo;</span>";
  }else{
    $j = $page + 1;
    echo "<a href='index.php?page=$j'>&raquo;</a>";
    }
    }
    ?>
  </center>
</body>
</html>