
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Bootstrap 4 and CCS3 Product Cards with Transition - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Open+Sans');
@import url('https://fonts.googleapis.com/css?family=Montserrat');

body {
    font-family: 'Montserrat', sans-serif;

}

/* Category Ads */

#ads {
    margin: 30px 0 30px 0;
   
}

#ads .card-notify-badge {
        position: absolute;
        left: -10px;
        top: -20px;
        background: #f2d900;
        text-align: center;
        border-radius: 30px 30px 30px 30px; 
        color: #000;
        padding: 5px 10px;
        font-size: 14px;

    }

#ads .card-notify-year {
        position: absolute;
        right: -10px;
        top: -20px;
        background: #ff4444;
        border-radius: 50%;
        text-align: center;
        color: #fff;      
        font-size: 14px;      
        width: 50px;
        height: 50px;    
        padding: 15px 0 0 0;
}


#ads .card-detail-badge {      
        background: #f2d900;
        text-align: center;
        border-radius: 30px 30px 30px 30px;
        color: #000;
        padding: 5px 10px;
        font-size: 14px;        
    }

   

#ads .card:hover {
            background: #fff;
            box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);
            border-radius: 4px;
            transition: all 0.3s ease;
        }

#ads .card-image-overlay {
        font-size: 20px;
        
    }


#ads .card-image-overlay span {
            display: inline-block;              
        }


#ads .ad-btn {
        text-transform: uppercase;
        width: 150px;
        height: 40px;
        border-radius: 80px;
        font-size: 16px;
        line-height: 35px;
        text-align: center;
        border: 3px solid #e6de08;
        display: block;
        text-decoration: none;
        margin: 20px auto 1px auto;
        color: #000;
        overflow: hidden;        
        position: relative;
        background-color: #e6de08;
    }

#ads .ad-btn:hover {
            background-color: #e6de08;
            color: #1e1717;
            border: 2px solid #e6de08;
            background: transparent;
            transition: all 0.3s ease;
            box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);
        }

#ads .ad-title h5 {
        text-transform: uppercase;
        font-size: 18px;
    }    </style>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
    </script>
</head>
<body>
    <div class="container">
    <br>
    <h4>Bootstrap 4 and CCS3 Product Cards with Transition - Techhowdy(demonguru18) - Lyoid Lopes</h2>
	<br>
	<div class="row" id="ads">
    <!-- Category Card -->
<?php
$server = "localhost";
$user = "root";
$pswd = "";
$db = "cardb";

$conn = new mysqli($server, $user, $pswd, $db);

if ($conn->connect_error)
        die("Connection fail!".$conn->connect_error);

$sql = "SELECT * from car";
$result = $conn->query($sql);
$totalNumData = $result->num_rows;
$resultPerPage = 3;
$totalNumPage = ceil($totalNumData/$resultPerPage);

if (!isset($_GET['page']))
    $page = 1;
else
    $page = $_GET['page'];

$start = ($page-1)*$resultPerPage;
$q = "SELECT * FROM car LIMIT ".$start.",".$resultPerPage;
$result = $conn->query($q);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        print'
    <div class="col-md-4">
        <div class="card rounded">
            <div class="card-image">
                <span class="card-notify-badge">'.$row['ID'].'</span>
                <span class="card-notify-year">'.$row['Year'].'</span>
                <img src="data:image/jpg;base64,'.base64_encode($row['Picture']).'" class="img-fluid">
            </div>
            <div class="card-image-overlay m-auto">
                <span class="card-detail-badge">'.$row['Condition'].'</span>
                <span class="card-detail-badge">$'.$row['Price'].'</span>
                <span class="card-detail-badge">'.$row['KMS'].' Kms</span>
            </div>
            <div class="card-body text-center">
                <div class="ad-title m-auto">
                    <h5>'.$row['Brand'].'</h5>
                </div>
                <a class="ad-btn" href="#">View</a>
            </div>
        </div>

    </div>';
    }
}

?>
</div>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
  <?php
  print '
    <li class="page-item">
      <a class="page-link" href="index.php?';
        if ($page > 1) 
            echo "page=".$page-1;
        print '" tabindex="-1">Previous</a>
    </li>';
    for ($page=1; $page<=$totalNumPage; $page++) {
        print '<li class="page-item"><a class="page-link" href="index.php?page='.$page.'">'.$page.'</a>
        </li>';
    }
    print '
    <li class="page-item">
      <a class="page-link" href="index.php?';
      if ($page < $totalNumPage) 
            echo "page=".$page+1;
    print '">Next</a></li>';
    ?>
  </ul>
</nav>
</div>	<script type="text/javascript">
		</script>
</body>
</html>
