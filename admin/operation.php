<?php
session_start();
include "../connect.php";
include "../pagination.php";
$sql = "SELECT * FROM document  WHERE action != 'ทราบ/รวบรวม' ";
$result = page_query($link,$sql,4);
if($_SESSION['ses_Id'] ==""){
	header("Location: ../login.php");
	die();
} else if($_SESSION['status'] != 1){
	header("Location: ../logout.php");
	die();
}else{

	?>

	<!DOCTYPE HTML>
<!--


	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
	<title>Massively by HTML5 UP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../assets/css/main.css" />
	<link href="../assets/css/freelancer.min.css" rel="stylesheet">
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">

	<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
</head>
<body class="is-loading"  id="page-top">

	<!-- Wrapper -->
	<div id="wrapper" class="fade-in">


		<!-- Header -->
		<header id="header">
			<a href="index.php" class="logo">Home</a>
		</header>

		<!-- Nav -->
		<nav id="nav">
			<ul class="links">
				<li ><a href="../admin/index.php">Home</a></li>
				<li ><a href="../admin/Document_admin.php">Document search</a></li>
				<li ><a href="../admin/AddDocument.php">Add the document</a></li>
				<li ><a href="../admin/members.php">members</a></li>
				<li class="active"><a href="../report.php">members</a></li>

			</ul>
			<ul class="icons">
				<li><a href="../logout.php" class="fa fa-sign-out"><span class="label"> Log out</span></a></li>

			</ul>
		</nav>

		<!-- Main -->
		<div id="main">

			<!-- Featured Post -->
			<article class="post featured">
				<header class="major">
					<span class="date"><?php echo "$date $month $year";?></span>
					<h2><a href="#">รายงาน</a></h2>
				</header>
				<div class="table-wrapper">
					<table class="alt">
						<table class="table">
							<thead>
								<tr>
									<th><?php echo "รหัสเอกสาร";?></th>							
									<th><?php echo "เรื่อง";?></th>	
									<th><?php echo "วันจัดเก็บ";?></th>	
									<th><?php echo "ผู้ส่งมาให้";?></th>	
									<th><?php echo "สถานะ";?></th>	
								</tr>
							</thead>

							<tbody>				
								<tr>
									<?php
									while ($row = mysqli_fetch_array($result)) {
										?>
										<td>
											<?php echo "$year /";?><?php echo $row['documentId'];?></a>

										</td>
										<td><?php echo $row['documentName'];?></td>
										<td><?php echo $row['documentTime'];?></td>
										<td><?php echo $row['fromName']; ?></td>
										<td><?php echo $row['statusName'];?></td>
									</tr>
									<?php
								} 
								?>


							</tbody>
						</table>
						<?php
						page_echo_pagenums(4,true,false);
						mysqli_free_result($result);
						
						?>

						<P id="portfolio">
							<div class="container">
								<div class="portfolio-link" href="#portfolioModal1" data-toggle="modal">
									<button type="button" class="btn btn-primary" >	เพิ่มสมาชิก</button>
									<a href="../admin/position.php"> <button type="button" class="btn btn-danger" >	จัดการตำแหน่ง</button> </a>
								</div>
								
							</div>
							</div>
						</P>
					</div>

				</article>




				<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="close-modal" data-dismiss="modal">
								<div class="lr">
									<div class="rl"></div>
								</div>
							</div>
							<div class="container">
								<div class="row">
									<div class="col-lg-10 mx-auto">
										<div class="modal-body">

											<header class="major">
												<span class="date"><?php echo "$date $month $year";?></span>
											</header>
											<form method="post" action="../membersAdd.php" class="alt" id="membersAdd">
												<div class="row uniform">
													<div class="2u 12u$(xsmall)">
														<p for="exampleInputEmail1">เลขสมาชิก</p>
													</div>
													<div class="10u 12u$(xsmall)">
														<input type="text" class="form-control" name="userId" id="userId" placeholder="Enter userId" type="text">
													</div>
													<div class="2u 12u$(xsmall)">
														<p for="exampleInputEmail1">E-mail</p>
													</div>
													<div class="10u 12u$(xsmall)">
														<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" type="text">
													</div>
													<div class="2u 12u$(xsmall)">
														<p for="exampleInputPassword1">รหัสผ่าน </p>
													</div>
													<div class="10u 12u$(xsmall)">
														<input type="password" class="form-control" name="password" id="password" placeholder="Password" type="password">
													</div>
													<div class="2u 12u$(xsmall)">
														<p>ชื่อ</p>
													</div>
													<div class="10u 12u$(xsmall)">
														<input type="text" name="userName" id="userName" value="" placeholder="ชื่อ" />
													</div>
													<div class="2u 12u$(xsmall)">
														<p>ตำแหน่ง</p>
													</div>
													<div class="10u 12u$(xsmall)">
														<div class="select-wrapper">
															<select name="positionId" id="positionId">
																<option value="">- เลือก -</option>
																<?php
																while ($row = mysqli_fetch_array($resulti,MYSQLI_ASSOC)) {
																	?>
																	<option value="<?php echo $row['positionId'];?>"><?php echo $row['positionName'];?></option>
																	<?php } 
																	mysqli_free_result($result);
																	mysqli_close($link);

																	?>

																</select>
															</div>
														</div>

														<div class="12u$">
															<ul class="actions">
																<li><input type="submit" value="บันทึก " class="special" /></li>
																<li><input type="reset" value="ล้าง" /></li>
															</ul>
														</div>
													</div>


												</form>



											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					
					<!-- Posts -->






				<!-- Copyright -->
				<div id="copyright">
					<ul><li>&copy; Untitled</li><li>By: <a href="#">Foremost & Kwang</a></li></ul>
				</div>

			</div>

			<!-- Scripts -->
			<script src="../js/jquery.min.js"></script>
			<script src="../js/popper.min.js"></script>
			<script src="../js/bootstrap.min.js"></script>
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/jquery.scrolly.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>


		</body>
		</html>
		<?php }

		?>