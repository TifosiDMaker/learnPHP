<!DOCTYPE html>
<head>
  <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <?php
    error_reporting(E_ALL);
    ini_set('display_error', 1);
  ?>
  <style>
    #Wapper {
             margin:10px 5px 10px 5px;
	    }

    #Main {
	     margin:50px 50px 20px 50px;
	     padding: 50px 300px 50px 300px;
	     background-color:gray;
	     color:white;
	    }
    #noteZone {
	     color: black; 
	     padding: 15px 20px 1px 20px;
	    }
    .secondary {
	font-size: small;
	color: gray;
      }
    .rightAlign {
	float: right;
		}
    .whiteB {
        background-color: white;
	    }
  </style>
</head>
<body>
  <div id="Wapper">
    <div id="Main">
    <?php
      include("conn.php");
      $i = 1;
      $result = mysql_query("select Username, textfiled, noteTime from Notepad order by noteTime desc", $con);
      if (!$result) {
      	die(mysql_error());
	}
      while($i < 11 && $rows = mysql_fetch_array($result)) {
      		if ($i % 2 == 0): ?>
      <div id="noteZone" class="whiteB">
	<p><?php echo $rows['textfiled'] ?><br><br></p>
	<p class="secondary"><small><?php echo $rows['Username'] ?><span class="rightAlign"><?php echo $rows['noteTime'] ?></span></small></p>
      </div>
      <?php else: ?>
      <div id="noteZone" class="bg-info">
        <p><?php echo $rows['textfiled'] ?><br><br></p>
	<p class="secondary"><small><?php echo $rows['Username'] ?><span class="rightAlign"><?php echo $rows['noteTime'] ?></span></small></p>
      </div>
      <?php
      endif;
      $i += 1;
      }
      ?>
      <div id="writeZone">
        <form method="post">
	  <div class="form-group">
	    <label for="postFiled">Post</label>
	    <textarea class="form-control" id="postFiled" placeholder="Text here" name="postFiled" rows=5 required default=""></textarea>
	  </div>
	  <div class="form-group">
	    <label for="username">Username</label>
	    <div class="row">
 	      <div class="col-xs-3">
	        <input class="form-control" id="username" placeholder="Username" name="username" required default="">
	      </div>
	    </div>
	  </div>
	  <button type="submit" class="btn btn-info">Submit</button>
	</form>
	<p>
	<?php
	  if ($_POST) {
	  $input = file_get_contents("php://input");
	  $text = $_POST['postFiled'];
	  $username = $_POST['username'];
	  include("conn.php");
	  $insert = "INSERT INTO Notepad VALUES ('$username', '$text', current_timestamp)";
	  mysql_query($insert, $con);
	  mysql_close($con);
	  header("Location: " . $_SERVER['REQUEST_URI']);
	  exit();
	  }
	?>
	</p>
      </div>
    </div>
  </div>
</body>
