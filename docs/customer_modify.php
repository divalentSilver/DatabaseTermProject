<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$cust_id = $_POST['cust_id'];
$cust_name = $_POST['cust_name'];
$cust_mobile = $_POST['cust_mobile'];

/*******transaction*******/
mysqli_query($conn, "set autocommit = 0");	// autocommit 해제
mysqli_query($conn, "set transation isolation level serializable");	// isolation level 설정
mysqli_query($conn, "begin");	// begins a transation

$ret = mysqli_query($conn, "update customer set cust_name = '$cust_name', cust_mobile = '$cust_mobile' where cust_id = $cust_id");

if(!$ret)
{
	// update customer fail
	mysqli_query($conn, "rollback"); // 고객 정보 수정 query 수행 실패. 수행 전으로 rollback
    msg('Query Error : '.mysqli_error($conn));
}
else
{
	mysqli_query($conn, "commit"); // 고객 정보 수정 query 수행 성공. 수행 내역 commit
    s_msg ('성공적으로 수정 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=customer.php'>";
}
/*******transaction*******/

?>

