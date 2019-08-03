<?php
include "header.php";
?>
<!-- Main -->
	<section id="main">
		<div class="container">

			<!-- Content -->
				<article class="box post">
					<header>
						<h2>예약관리</h2>
						<p>호텔 라이언의 예약 목록을 나타냅니다. 상세보기를 원하면 예약ID를 클릭해주세요.</p>
						<form style="margin: auto;">
							<input type="text" name="search_keyword" placeholder="예약 검색">
						</form>
					</header>
					<section>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>예약ID</th>
                                <th>이용시작일</th>
                                <th>이용종료일</th>
                                <th>고객 이름</th>
								<th>객실 번호</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
						    $sql = "SELECT * FROM reservation natural join customer;";
						    if (array_key_exists("search_keyword", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
						        $search_keyword = $_POST["search_keyword"];
						        $sql =  $sql . " where reserv_id like '%$search_keyword%' or reserv_from like '%$search_keyword%' or reserv_to like '%$search_keyword%' or cust_name like '%$search_keyword%' or room_no like '%$search_keyword%'";
						    }
						    $res = mysqli_query($conn, $sql);
						    
							if (!$res) {
							    die('Query Error : ' . mysqli_error());
							}
							
                            $row_index = 1;
                            while ($row = mysqli_fetch_array($res)) {
                                echo "<tr>";
                                echo "<td>{$row_index}</td>";
                                echo "<td><a href='reservation_view.php?reserv_id={$row['reserv_id']}'>{$row['reserv_id']}</a></td>";
                                echo "<td>{$row['reserv_from']}</td>";
                                echo "<td>{$row['reserv_to']}</td>";
                                echo "<td>{$row['cust_name']}</td>";
                                echo "<td>{$row['room_no']}</td>";
                                echo "
                                	<td width='17%'>
                                		<a href='reservation_form.php?reserv_id={$row['reserv_id']}'>
                                			<button class='button alt'>수정</button>
                                		</a>
                                		<button onclick='javascript:deleteConfirm({$row['reserv_id']})' class='button'>삭제</button>
                                	</td>";
                                echo "</tr>";
                                $row_index++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <a href='reservation_form.php'><button class='button alt'>신규예약등록</button></a>
					</section>
				</article>

		</div>
	</section>
	<script>
        function deleteConfirm(mgr_id) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "manager_delete.php?mgr_id=" + mgr_id;
            }else{   //취소
                return;
            }
        }
    </script>
<?php
	include "footer.php";
?>
