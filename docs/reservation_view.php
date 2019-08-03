<?php
include "header.php";
if (array_key_exists("reserv_id", $_GET)) {
    $reserv_id = $_GET["reserv_id"];
    $query = "select * from reservation natural join customer natural join room natural join payment where reserv_id = $reserv_id";
    $res = mysqli_query($conn, $query);
    $reserv = mysqli_fetch_assoc($res);
    if (!$reserv) {
        msg("해당 예약이 존재하지 않습니다.");
    }
}
?>
<!-- Main -->
	<section id="main">
		<div class="container">

			<!-- Content -->
				<article class="box post">
					<header>
						<h2>예약관리</h2>
					</header>
					<section>
						<form>
							<h3>예약 상세 정보 보기</h3>
							<p style="padding-top: 20px;">
					            <label for="reserv_id">예약ID</label>
					            <input readonly type="text" id="reserv_id" name="reserv_id" value="<?= $reserv['reserv_id'] ?>"/>
					        </p>
					        <p>
					            <label for="reserv_from">이용시작일</label>
					            <input readonly type="text" id="reserv_from" name="reserv_from" value="<?= $reserv['reserv_from'] ?>"/>
					        </p>
					        <p>
					            <label for="reserv_to">이용종료일</label>
					            <input readonly type="text" id="reserv_to" name="reserv_to" value="<?= $reserv['reserv_to'] ?>"/>
					        </p>
					        <p>
					            <label for="cust_name">고객 이름</label>
					            <input readonly type="text" id="cust_name" name="cust_name" value="<?= $reserv['cust_name'] ?>"/>
					        </p>
					        <p>
					            <label for="cust_mobile">고객 연락처</label>
					            <input readonly type="text" id="cust_mobile" name="cust_mobile" value="<?= $reserv['cust_mobile'] ?>"/>
					        </p>
							<p>
					            <label for="room_no">객실 번호</label>
					            <input readonly type="text" id="room_no" name="room_no" value="<?= $reserv['room_no'] ?>"/>
					        </p>
					        <p>
					            <label for="room_type">객실 유형</label>
					            <input readonly type="text" id="room_type" name="room_type" value="<?= $reserv['room_type'] ?>"/>
					        </p>
					        <p>
					            <label for="room_price">1박 숙박비</label>
					            <input readonly type="text" id="room_price" name="room_price" value="<?= $reserv['room_price'] ?>"/>
					        </p>
					        <p>
					            <label for="pay_method">결제 수단</label>
					            <input readonly type="text" id="pay_method" name="pay_method" value="<?= $reserv['pay_method'] ?>"/>
					        </p>
							<p>
					            <label for="pay_dc_rate">결제 할인율</label>
					            <input readonly type="text" id="pay_dc_rate" name="pay_dc_rate" value="<?= $reserv['pay_dc_rate'] ?>"/>
					        </p>
				        </form>
					</section>
				</article>
		</div>
	</section>

<?php
	include "footer.php";
?>
