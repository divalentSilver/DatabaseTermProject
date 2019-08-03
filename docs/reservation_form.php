<?php
include "header.php";
$mode = "등록";
$action = "reservation_insert.php";

if (array_key_exists("reserv_id", $_GET)) {   //키가 있으면 수정모드로 바꿈
    $reserv_id = $_GET["reserv_id"];
    $query =  "select * from reservation where reserv_id = $reserv_id";
    $res = mysqli_query($conn, $query);
    $reserv = mysqli_fetch_array($res);
    if(!$reserv) {    //해당 정보가 없는 파라미터일 때
        msg("해당 예약 정보가 존재하지 않습니다.");
    }
    $mode = "수정";
    $action = "reservation_modify.php";
}

$payment = array();
$query = "select * from payment";
$res = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($res)) {
    $payment[$row['pay_id']] = $row['pay_method']."결제 + ".$row['pay_dc_rate']."% 할인 적용";
}

$room = array();
$query = "select * from room";
$res = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($res)) {
    $room[$row['room_no']] = $row['room_no'];
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
                        <form name="reserv_form" action="<?=$action?>" method="post" class="fullwidth">
                        	<input type="hidden" name="reserv_id" value="<?=$reserv['reserv_id']?>"/>
                            <h3>예약 정보 <?=$mode?></h3>
                            <p style="padding-top: 20px;">
                                <label for="reserv_from">이용시작일(형식: YYYY-MM-DD)</label>
                                <input type="date" placeholder="이용시작일 입력" id="reserv_from" name="reserv_from" value="<?=$reserv['reserv_from']?>"/>
                            </p>
                            <p>
                                <label for="reserv_to">이용종료일(형식: YYYY-MM-DD)</label>
                                <input type="date" placeholder="이용종료일 입력" id="reserv_to" name="reserv_to" value="<?=$reserv['reserv_to']?>"/>
                            </p>
                            <p>
                                <label for="cust_id">예약자 고객ID</label>
                                <input type="number" min="1" placeholder="고객ID 입력" id="cust_id" name="cust_id" value="<?=$reserv['cust_id']?>"/>
                            </p>
                            <p>
				                <label for="pay_id">결제정보</label>
				                <select name="pay_id" id="pay_id">
				                    <option value="-1">선택해 주십시오.</option>
				                    <?
				                        foreach($payment as $id => $content) {
				                            if($id  == $reserv['pay_id']){
				                                echo "<option value='{$id}' selected>{$content}</option>";
				                            } else {
				                                echo "<option value='{$id}'>{$content}</option>";
				                            }
				                        }
				                    ?>
				                </select>
				            </p>
				            <p>
				                <label for="room_no">예약 객실</label>
				                <select name="room_no" id="room_no">
				                    <option value="-1">선택해 주십시오.</option>
				                    <?
				                        foreach($room as $id => $content) {
				                            if($id == $reserv['room_no']){
				                                echo "<option value='{$id}' selected>{$content}</option>";
				                            } else {
				                                echo "<option value='{$id}'>{$content}</option>";
				                            }
				                        }
				                    ?>
				                </select>
				            </p>
                            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

                            <script>
                                function validate() {
                                	var date_from = document.getElementById('reserv_from');
                                	var d = new Date();
									var nd = new Date(date_from.value);
                                    if(date_from == "") {
                                        alert ("이용시작일을 입력해 주십시오"); return false;
                                    }
                                    else if(document.getElementById("reserv_to").value == "") {
                                        alert ("이용종료일을 입력해 주십시오"); return false;
                                    }
                                    else if(document.getElementById("cust_id").value == "") {
                                        alert ("예약자 고객ID를 입력해 주십시오"); return false;
                                    }
                                    else if(document.getElementById("room_no").value == "") {
                                        alert ("예약 객실을 선택해 주십시오"); return false;
                                    }
                                    else if(nd.getTime() <= d.getTime()){
                                    	alert("이용시작일은 오늘 날짜와 같거나 그 이후여야 합니다."); return false;
                                    }
                                    return true;
                                }
                            </script>

                        </form>
					</section>
				</article>

		</div>
	</section>

<?php
	include "footer.php";
?>
