<?php
  $connect = mysqli_connect("localhost","root","", "dp_pweb");
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
  }
  $query = "SELECT * FROM mahasiswa";
  $result = mysqli_query($connect, $query);
  $i=0;
  while($row = mysqli_fetch_array($result))
  {
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
      </tr>
    <?php for ($i=0; $i<sizeof($nrp); $i++) { ?>
      <tr>
         <td><?php echo $i+1?></td>
         <td><?php echo $nrp[$i];?></td>
         <td><?php echo $nama[$i];?></td>
      </tr>
      <?php } ?>
  </table>
</body>
</html>