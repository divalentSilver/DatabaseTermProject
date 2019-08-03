<?php
include "header.php";
?>
<!-- Main -->
	<section id="main">
		<div class="container">

			<!-- Content -->
				<article class="box post">
					<header>
						<h2>객실관리</h2>
						<p>호텔 라이언의 전체 객실 목록을 나타냅니다.</p>
					</header>
					<section>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>객실 번호</th>
                                <th>객실 유형</th>
                                <th>1박 숙박비</th>
                                <th>담당 직원</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
                            $sql = "SELECT * FROM room natural join manager order by room_no;";
							$result = mysqli_query($conn, $sql);
							
							if (!$result) {
							    die('Query Error : ' . mysqli_error());
							}
							
                            $row_index = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>{$row_index}</td>";
                                echo "<td>{$row['room_no']}</td>";
                                echo "<td>{$row['room_type']}</td>";
								echo "<td>{$row['room_price']}</td>";
								echo "<td>{$row['mgr_name']}</td>";
                                echo "
                                	<td width='17%'>
                                		<a href='room_form.php?room_no={$row['room_no']}'>
                                			<button class='button alt'>수정</button>
                                		</a>
                                	</td>";
                                echo "</tr>";
                                $row_index++;
                            }
                            ?>
                            </tbody>
                        </table>
					</section>
				</article>

		</div>
	</section>

<?php
	include "footer.php";
?>
