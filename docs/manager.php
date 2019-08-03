<?php
include "header.php";
?>
<!-- Main -->
	<section id="main">
		<div class="container">

			<!-- Content -->
				<article class="box post">
					<header>
						<h2>직원관리</h2>
						<p>호텔 라이언의 직원 중 객실담당 매니저 목록을 나타냅니다.</p>
					</header>
					<section>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>직원 ID</th>
                                <th>직원 이름</th>
                                <th>직원 연락처</th>
                                <th>직원 주소지</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
                            $sql = "SELECT * FROM manager;";
							$result = mysqli_query($conn, $sql);
							
							if (!$result) {
							    die('Query Error : ' . mysqli_error());
							}
							
                            $row_index = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>{$row_index}</td>";
                                echo "<td>{$row['mgr_id']}</td>";
                                echo "<td>{$row['mgr_name']}</td>";
                                echo "<td>{$row['mgr_mobile']}</td>";
                                echo "<td>{$row['mgr_town']}</td>";
                                echo "
                                	<td width='17%'>
                                		<a href='manager_form.php?mgr_id={$row['mgr_id']}'>
                                			<button class='button alt'>수정</button>
                                		</a>
                                		<button onclick='javascript:deleteConfirm({$row['mgr_id']})' class='button'>삭제</button>
                                	</td>";
                                echo "</tr>";
                                $row_index++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <a href='manager_form.php'><button class='button alt'>신규직원등록</button></a>
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