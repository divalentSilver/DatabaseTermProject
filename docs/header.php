<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
$conn = dbconnect($host, $dbid, $dbpass, $dbname);
?>

<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="ko">
	<head>
		<title>HOTEL RYAN :: Admin Page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-ico">
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header">

					<!-- Logo -->
						<h1><a href="index.php">Hotel Ryan 예약관리 시스템</a></h1>
					
					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li
								<?php
									$pageName = basename($_SERVER['PHP_SELF'], '.php');
									if(strpos($pageName, 'reservation') !== false) {
										echo " class='current'";
									}
								?>
								><a href="reservation.php">예약관리</a></li>
								<li
								<?php
									if(strpos($pageName, 'customer') !== false) {
										echo " class='current'";
									}
								?>
								><a href="customer.php">고객관리</a></li>
								<li
								<?php
									if(strpos($pageName, 'room') !== false) {
										echo " class='current'";
									}
								?>
								><a href="room.php">객실관리</a></li>
								<li
								<?php
									if(strpos($pageName, 'manager') !== false) {
										echo " class='current'";
									}
								?>
								><a href="manager.php">직원관리</a></li>
							</ul>
						</nav>

				</section>

						
						
						
					