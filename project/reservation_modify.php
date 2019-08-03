<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$reserv_id = $_POST['reserv_id'];
$reserv_from = $_POST['reserv_from'];
$reserv_to = $_POST['reserv_to'];
$cust_id = $_POST['cust_id'];
$pay_id = $_POST['pay_id'];
$room_no = $_POST['room_no'];

/*******transaction*******/
mysqli_query($conn, "set autocommit = 0");	// autocommit 해제
mysqli_query($conn, "set transation isolation level serializable");	// isolation level 설정
mysqli_query($conn, "begin");	// begins a transation

$ret = mysqli_query($conn, "update reservation set reserv_from = '$reserv_from', reserv_to = '$reserv_to', cust_id = '$cust_id', pay_id = '$pay_id', room_no = '$room_no' where reserv_id = $reserv_id");

if(!$ret)
{
	// update reservation fail
	mysqli_query($conn, "rollback"); // 예약 정보 수정 query 수행 실패. 수행 전으로 rollback
    msg('Query Error : '.mysqli_error($conn));
}
else
{
	mysqli_query($conn, "commit"); // 예약 정보 수정 query 수행 성공. 수행 내역 commit
    s_msg ('성공적으로 수정 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=reservation.php'>";
}
/*******transaction*******/

?>
