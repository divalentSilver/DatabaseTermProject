<?php
	include "header.php";
    $mode = "등록";
    $action = "manager_insert.php";

    if (array_key_exists("mgr_id", $_GET)) {   //키가 있으면 수정모드로 바꿈
        $mgr_id = $_GET["mgr_id"];
        $query =  "select * from manager where mgr_id = $mgr_id";
        $res = mysqli_query($conn, $query);
        $mgr = mysqli_fetch_array($res);
        if(!$mgr) {    //해당 정보가 없는 파라미터일 때
            msg("해당 직원 정보가 존재하지 않습니다.");
        }
        $mode = "수정";
        $action = "manager_modify.php";
    }

?>


<!-- Main -->
	<section id="main">
		<div class="container">

			<!-- Content -->
				<article class="box post">
					<header>
						<h2>직원관리</h2>
					</header>
					<section>
                        <form name="mgr_form" action="<?=$action?>" method="post" class="fullwidth">
                            <input type="hidden" name="mgr_id" value="<?=$mgr['mgr_id']?>"/>
                            <h3>직원 정보 <?=$mode?></h3>
                            <p style="padding-top: 20px;">
                                <label for="mgr_name">직원 이름</label>
                                <input type="text" placeholder="직원 이름 입력" id="mgr_name" name="mgr_name" value="<?=$mgr['mgr_name']?>"/>
                            </p>
                            <p>
                                <label for="mgr_mobile">직원 연락처(예: 010-1234-5678)</label>
                                <input type="tel" placeholder="직원 연락처 입력" id="mgr_mobile" name="mgr_mobile" value="<?=$mgr['mgr_mobile']?>" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" required/>
                            </p>
                            <p>
                                <label for="mgr_town">직원 주소지(거주 지역구만 입력)</label>
                                <input type="text" placeholder="직원 주소지 입력" id="mgr_town" name="mgr_town" value="<?=$mgr['mgr_town']?>"/>
                            </p>
                            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

                            <script>
                                function validate() {
                                    if(document.getElementById("mgr_name").value == "") {
                                        alert ("직원 이름을 입력해 주십시오"); return false;
                                    }
                                    else if(document.getElementById("mgr_mobile").value == "") {
                                        alert ("직원 연락처를 입력해 주십시오"); return false;
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
