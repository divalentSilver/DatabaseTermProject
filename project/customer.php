<?php
include "header.php";
?>
<!-- Main -->
	<section id="main">
		<div class="container">

			<!-- Content -->
				<article class="box post">
					<header>
						<h2>고객관리</h2>
						<p>호텔 라이언의 전체 고객 목록을 나타냅니다.</p>
					</header>
					<section>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>고객ID</th>
                                <th>고객 이름</th>
                                <th>고객 연락처</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
                            $sql = "SELECT * FROM customer;";
							$result = mysqli_query($conn, $sql);
							
							if (!$result) {
							    die('Query Error : ' . mysqli_error());
							}
							
                            $row_index = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>{$row_index}</td>";
                                echo "<td>{$row['cust_id']}</td>";
                                echo "<td>{$row['cust_name']}</td>";
                                echo "<td>{$row['cust_mobile']}</td>";
                                echo "
                                	<td width='17%'>
                                		<a href='customer_form.php?cust_id={$row['cust_id']}'>
                                			<button class='button alt'>수정</button>
                                		</a>
                                	</td>";
                                echo "</tr>";
                                $row_index++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <a href='customer_form.php'><button class='button alt'>신규고객등록</button></a>
					</section>
				</article>
				
		</div>
	</section>

<?php
	include "footer.php";
?>