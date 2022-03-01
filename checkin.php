<?php

include "CONNECT.php";
session_start();
if(empty($_SESSION['id'])||empty($_SESSION['staff'])||$_SESSION['staff']==0) {
    echo "<meta http-equiv = 'Refresh' content = '0; url = main.php'>";
}
echo "
	<script type=text/javascript>
		var member = prompt('Enter the member ID for the customer:');
	</script>
	";
$member = "<script type=\"text/javascript\"> document.write(member); </script>";

$ISBN = $_POST['ISBN'];


$stmt = "select * from checkout where book_isbn = '{$ISBN}';";
$result = mysqli_query($conn, $stmt);


$checked_out = $result->fetch_assoc();
echo $checked_out['member_id'];

$stmt = "select copies from books where isbn = '$ISBN';";
$result = mysqli_query($conn, $stmt);
$copies = mysqli_fetch_assoc($result)['copies'];

if(!empty($checked_out['member_id']) && $member==$checked_out['member_id']) {
    $stmt = "delete from checkout where member_id = '$member' and book_isbn = '$ISBN';";
    $copies = $copies + 1;
	$stmt = "update table books set copies = $copies where isbn = '$ISBN';";
	
	$results = mysqli_query($conn, $stmt);
	echo "
		<script>alert('Book successfully checked In')</script>
	";
} else {
    echo
	"
		<script>alert('The memebr associated with the id provided has not checked out this book.')</script>
	";
    
}
//echo "<meta http-equiv='refresh' content='0; url=search.php'>";


?>