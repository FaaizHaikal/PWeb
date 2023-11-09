<head>
  <meta content="en-us" http-equiv="Content-Language">
</head>

<?php
  include("_functions.php");
  $act = isset($_GET['a']) ? $_GET['a']: "";
	if ($act=="i") {
		$new_nrp = $_POST['in_NRP'];
		$new_nama = $_POST['in_Nama'];
    $conn=dbconn("localhost","root","","dp_pweb");
		$sql=
    $result=mysqli_query($conn, $sql);
    mysqli_close($conn);
	}
?>

<body>
  <form method="post" action="?a=i">
  <table style="width: 100%">
    <tr>
        <td>NRP</td>
        <td>
          <input name="in_NRP" type="text">
        </td>
    </tr>
    <tr>
        <td colspan="2"><button type="submit">Delete</button></td>
    </tr>
  </table>
  </form>


</body>