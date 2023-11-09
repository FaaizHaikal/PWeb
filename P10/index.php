<?php
  include("_functions.php");

  
  // Check if delete button is clicked
  if(isset($_POST['delete'])) {
    $connect = dbconn("localhost","root","","dp_pweb");
    $deleted_nrp = $_POST['delete'];
    $query = "DELETE FROM mahasiswa WHERE NRP='$deleted_nrp'";
    mysqli_query($connect, $query);
    mysqli_close($connect);
  }
  
  $connect = dbconn("localhost","root","","dp_pweb");
  $query = "SELECT * FROM mahasiswa";
  $result = mysqli_query($connect, $query);
  $i = 0;
	while ($row = mysqli_fetch_array($result)) {
		$nrp[$i] = $row['NRP'];
		$nama[$i] = $row['Nama'];
		$i++;
	}
  mysqli_close($connect);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Daftar Mahasiswa</title>
</head>
<body>
  <h1>Daftar Mahasiswa</h1>
  <table style="width: auto" border="1">
      <tr>
         <th>No</th>
         <th>NRP</th>
         <th>Nama</th>
         <th>Action</th>
      </tr>
    <?php for ($i=0; $i<sizeof($nrp); $i++) { ?>
      <tr>
         <td><?php echo $i+1?></td>
         <td><?php echo $nrp[$i];?></td>
         <td><?php echo $nama[$i];?></td>
         <td>
           <form method="post">
             <button type="submit" name="delete" value="<?php echo $nrp[$i]; ?>">Delete</button>
           </form>
         </td>
      </tr>
      <?php } ?>
  </table>
</body>