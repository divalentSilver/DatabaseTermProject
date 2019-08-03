<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$mgr_id = $_POST['mgr_id'];
$mgr_name = $_POST['mgr_name'];
$mgr_mobile = $_POST['mgr_mobile'];
$mgr_town = $_POST['mgr_town'];

/*******transaction*******/
mysqli_query($conn, "set autocommit = 0");	// autocommit 해제
mysqli_query($conn, "set transation isolation level serializable");	// isolation level 설정
mysqli_query($conn, "begin");	// begins a transation

$ret = mysqli_query($conn, "update manager set mgr_name = '$mgr_name', mgr_mobile = '$mgr_mobile', mgr_town = '$mgr_town' where mgr_id = $mgr_id");

if(!$ret)
{
	// update manager fail
	mysqli_query($conn, "rollback"); // 직원 정보 수정 query 수행 실패. 수행 전으로 rollback
    msg('Query Error : '.mysqli_error($conn));
}
else
{
	mysqli_query($conn, "commit"); // 직원 정보 수정 query 수행 성공. 수행 내역 commit
    s_msg ('성공적으로 수정 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=manager.php'>";
}
/*******transaction*******/

?>
