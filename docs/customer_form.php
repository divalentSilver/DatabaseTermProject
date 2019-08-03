<?php
	include "header.php";
    $mode = "등록";
    $action = "customer_insert.php";

    if (array_key_exists("cust_id", $_GET)) {   //키가 있으면 수정모드로 바꿈
        $cust_id = $_GET["cust_id"];
        $query =  "select * from customer where cust_id = $cust_id";
        $res = mysqli_query($conn, $query);
        $cust = mysqli_fetch_array($res);
        if(!$cust) {    //해당 정보가 없는 파라미터일 때
            msg("해당 고객 정보가 존재하지 않습니다.");
        }
        $mode = "수정";
        $action = "customer_modify.php";
    }

?>


<!-- Main -->
	<section id="main">
		<div class="container">

			<!-- Content -->
				<article class="box post">
					<header>
						<h2>고객관리</h2>
					</header>
					<section>
                        <form name="cust_form" action="<?=$action?>" method="post" class="fullwidth">
                            <input type="hidden" name="cust_id" value="<?=$cust['cust_id']?>"/>
                            <h3>고객 정보 <?=$mode?></h3>
                            <p style="padding-top: 20px;">
                                <label for="cust_name">고객 이름</label>
                                <input type="text" placeholder="고객 이름 입력" id="cust_name" name="cust_name" value="<?=$cust['cust_name']?>"/>
                            </p>
                            <p>
                                <label for="cust_mobile">고객 연락처(예: 010-1234-5678)</label>
                                <input type="tel" placeholder="고객 연락처 입력" id="cust_mobile" name="cust_mobile" value="<?=$cust['cust_mobile']?>" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" required/>
                            </p>
                            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

                            <script>
                                function validate() {
                                    if(document.getElementById("cust_name").value == "") {
                                        alert ("고객 이름을 입력해 주십시오"); return false;
                                    }
                                    else if(document.getElementById("cust_mobile").value == "") {
                                        alert ("고객 연락처를 입력해 주십시오"); return false;
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
