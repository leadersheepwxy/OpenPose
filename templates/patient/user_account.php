<?php
    session_start();
    header("Content-Type:text/html; charset=utf-8");
    include("conmysql.php");
    $seldb = mysqli_select_db($link, "HBSR");
        if (!$seldb) die("資料庫選擇失敗！");

    $i_id = $_SESSION['i_id'];
    $sql_inv = "SELECT * FROM `INV` where I_ID = '$i_id'";

    $invinfo = mysqli_query($link, $sql_inv);
    $row_result = mysqli_fetch_assoc($invinfo);

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>個人資料管理</title>
    <link href="../../static/img/desktop_icon.png" rel="icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
  </head>
  <body>
	<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>
    <header id="header" class="d-flex flex-column justify-content-center">
      <nav class="nav-menu">
        <ul>
          <li class="active"><a href="homepage.php"><i class='bx bx-store'></i> <span>首頁</span></a></li>
		  <li><a href="training.php"><i class='bx bx-dumbbell'></i> <span>開始訓練</span></a></li>
		  <li><a href="historylog.php"><i class='bx bx-folder'></i> <span>歷史紀錄</span></a></li>
		  <li><a href="../index.php"><i class='bx bx-log-out'></i> <span>登出</span></a></li>
        </ul>
      </nav>
    </header>
    <main id="main" style='margin-top: 1%;'>
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>個人資料管理</h2>
          </div>

          <div class="row mt-1">

            <div class="col-lg-8 mt-5 mt-lg-0">

              <form action="check_user.php" method="post" >  <!--修改物治所帳號資料php-->
			  <?php
                if($_SESSION['i_id'] != null){
					echo'<div class="row">';
						echo'<div class="col-md-6 form-group">';
						echo"姓名";
						echo"<input type='text' name='i_name' class='form-control' value=".$row_result["I_NAME"]." readonly/>";
						echo'<div class="validate"></div>';
						echo'</div>';
					  
						echo'<div class="col-md-6 form-group">';
						echo'身分證字號';
						echo"<input type='text' name='i_id' class='form-control' value=".$row_result["I_ID"]." readonly/>";
						echo'<div class="validate"></div>';
						echo'</div>';
					echo'</div>';
					
					echo'<div class="row">';
						echo'<div class="form-group mt-3">';
						echo'生日';
						echo"<input type='date' class='form-control' name='i_bd' value=".$row_result["I_BD"]." readonly/>";
						echo'<div class="validate"></div>';
						echo'</div>';
						
						echo'<div class="form-group mt-3">';
						echo'病歷號';
						echo"<input type='text' name='i_num' class='form-control' value=".$row_result["I_NUM"]." readonly />";
						echo'<div class="validate"></div>';
						echo'</div>';
					echo'</div>';
					
					echo'<div class="row">';
						echo'<div class="form-group mt-3">';
						echo'聯絡電話';
						echo"<input type='tel' class='form-control' name='i_tel' value=".$row_result["I_TEL"]." placeholder='請輸入修改之聯絡電話' data-rule='minlen:7' data-msg='請輸入正確的電話號碼' />";
						echo'<div class="validate"></div>';
						echo'</div>';
						
						echo'<div class="form-group mt-3">';
						echo'密碼';
						echo"<input type='text' name='i_pw' class='form-control' value=".$row_result["I_PW"]." placeholder='請輸入修改之密碼' data-rule='minlen:1' data-msg='密碼為必填欄位' />";
						echo'<div class="validate"></div>';
						echo'</div>';
					echo'</div>';
					
					echo'<div class="row">';
						echo'<div class="form-group mt-3">';
						echo'物治所編號';
						echo"<input type='text' name='c_id' class='form-control' value=".$row_result["C_ID"]." readonly/>";
						echo'<div class="validate"></div>';
						echo'</div>';
					echo'</div>';
					
					echo'<div class="text-center loginbtn"><button type="submit">儲存修改資料</button></a></div>';
				}
				// else
				// {
				// 	echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
				// }
              ?>
				<!--
				<div class="text-center loginbtn"><button type="submit">儲存修改資料</button></a></div>
				-->
			  </form>
			  
            </div>
          </div>
        </div>
      </section>
    </main>

    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="../assets/vendor/counterup/counterup.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/venobox/venobox.min.js"></script>
    <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../assets/vendor/typed.js/typed.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/js/main.js"></script>

  </body>

</html>