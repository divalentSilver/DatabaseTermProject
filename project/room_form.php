<?php
	include "header.php";

    if (array_key_exists("room_no", $_GET)) {   //키가 있으면 수정모드로 바꿈
        $room_no = $_GET["room_no"];
        $query =  "select * from room where room_no = $room_no";
        $res = mysqli_query($conn, $query);
        $room = mysqli_fetch_array($res);
        if(!$room) {    //해당 정보가 없는 파라미터일 때
            msg("해당 객실 정보가 존재하지 않습니다.");
        }
        $mode = "수정";
        $action = "room_modify.php";
    }
	else{
		msg("잘못된 주소입니다.");
	}

?>


<!-- Main -->
	<section id="main">
		<div class="container">

			<!-- Content -->
				<article class="box post">
					<header>
						<h2>객실관리</h2>
					</header>
					<section>
                        <form name="room_form" action="<?=$action?>" method="post" class="fullwidth">
                            <h3>객실 정보 <?=$mode?></h3>
							<p style="padding-top: 20px;">
                                <label for="room_no">객실 번호</label>
                                <input readonly type="num" placeholder="객실 번호" id="room_no" name="room_no" value="<?=$room['room_no']?>"/>
                            </p>
                            <p>
                                <label for="room_type">객실 유형</label>
                                <input type="text" placeholder="객실 유형 입력" id="room_type" name="room_type" value="<?=$room['room_type']?>"/>
                            </p>
                            <p>
                                <label for="room_price">1박 숙박비(숫자만 입력)</label>
                                <input type="num" min="1" placeholder="객실 가격 입력" id="room_price" name="room_price" value="<?=$room['room_price']?>"/>
                            </p>
                            <p>
                                <label for="mgr_id">담당직원 ID</label>
                                <input type="number" min="1" placeholder="객실 담당직원 ID 입력" id="mgr_id" name="mgr_id" value="<?=$room['mgr_id']?>"/>
                            </p>
                            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

                            <script>
                                function validate() {
                                    if(document.getElementById("room_no").value == "") {
                                        alert ("객실 번호를 입력해 주십시오"); return false;
                                    }
                                    else if(document.getElementById("room_type").value == "") {
                                        alert ("객실 유형을 입력해 주십시오"); return false;
                                    }
                                    else if(document.getElementById("room_price").value == "") {
                                        alert ("1박 숙박비를 입력해 주십시오"); return false;
                                    }
									else if(document.getElementById("mgr_id").value == "") {
                                        alert ("객실 담당직원 ID를 입력해 주십시오"); return false;
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
