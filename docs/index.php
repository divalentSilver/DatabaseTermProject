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
								<li><a href="reservation.php">예약관리</a></li>
								<li><a href="customer.php">고객관리</a></li>
								<li><a href="room.php">객실관리</a></li>
								<li><a href="manager.php">직원관리</a></li>
							</ul>
						</nav>

					<!-- Banner -->
						<section id="banner">
							<div style="padding-bottom: 5em;">
								<iframe width="560" height="315" src="//www.youtube.com/embed/_q6VfroS33Q?amp;vq=hd720&showinfo=0&autoplay=1&loop=1;playlist=_q6VfroS33Q" 
								frameborder="0" allowfullscreen></iframe>
							</div>
							<header>
								<h2>호텔 라이언 관리자님, 반갑습니다.</h2>
								<p>간편한 예약관리 시스템을 만나보세요!</p>
							</header>
						</section>

					<!-- Intro -->
						<section id="intro" class="container">
							<div class="row">
								<div class="col-3 col-12-medium">
									<section class="first">
										<i class="icon featured fa-cog"></i>
										<header>
											<h2>예약관리 기능</h2>
										</header>
										<p>예약정보 등록, 수정, 조회가 가능합니다.</p>
									</section>
								</div>
								<div class="col-3 col-12-medium">
									<section class="middle">
										<i class="icon featured alt fa-heart"></i>
										<header>
											<h2>고객관리 기능</h2>
										</header>
										<p>고객정보 등록, 수정, 조회가 가능합니다.</p>
									</section>
								</div>
								<div class="col-3 col-12-medium">
									<section class="middle">
										<i class="icon featured alt fa-flash"></i>
										<header>
											<h2>객실관리 기능</h2>
										</header>
										<p>객실정보 수정, 조회가 가능합니다.</p>
									</section>
								</div>
								<div class="col-3 col-12-medium">
									<section class="last">
										<i class="icon featured alt2 fa-star"></i>
										<header>
											<h2>직원관리 기능</h2>
										</header>
										<p>직원정보 등록, 수정, 삭제, 조회가 가능합니다.</p>
									</section>
								</div>
							</div>
						</section>

				</section>

<?php
	include "footer.php";
?>