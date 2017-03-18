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
  </style>
</head>
<body>
  <div id="Wapper">
    <div id="Main">
      <div id="noteZone">
	<p class="oddLine">1</p>
	<p class="evenLine">2</p>
        <p class="oddLine">1</p>
        <p class="evenLine">2</p>
        <p class="oddLine">1</p>
        <p class="evenLine">2</p>
        <p class="oddLine">1</p>
        <p class="evenLine">2</p>
        <p class="oddLine">1</p>
        <p class="evenLine">2</p>
      </div>
      <div id="writeZone">
        <form method="post">
	  <div class="form-group">
	    <label for="postFiled">Post</label>
	    <textarea class="form-control" id="postFiled" placeholder="Text here" name="postFiled" rows=5 required></textarea>
	  </div>
	  <div class="form-group">
	    <label for="username">Username</label>
	    <div class="row">
 	      <div class="col-xs-3">
	        <input class="form-control" id="username" placeholder="Username" name="username" required>
	      </div>
	    </div>
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
	<p>
	<?php
	  $input = file_get_contents("php://input");
	  $text = $_POST['postFiled'];
	  $username = $_POST['username'];
	  print $input . "Hi";
	  print "<br>" . $_POST['username'];
	  include("conn.php")
	  $insert = "INSERT INTO Notepad VALUES ('$username', '$text', current_timestmap)"
	  if (!mysql_query($insert, $con)) {
					    die('Error: ' . mysql_error());
					   }
	  echo "1 record added.";
	  mysql_close($con);
	?>
	</p>
      </div>
    </div>
  </div>
</body>
