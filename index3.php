<!-- elimina dalla tabella pagamenti la riga con pagante_id = 6 e con status = rejected -->

<?php

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "dbhotel";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    return;
  }

  $sql = " DELETE FROM pagamenti WHERE pagante_id = 6 AND status = 'rejected' "
  ;

  $result = $conn->query($sql);



  if ($result && $result->num_rows > 0) {

    echo "<ol>";
      while($row = $result->fetch_assoc()) {

        echo  "<li>"
        . $row['status'] . " " . " || "
        . $row['price'] . " " . " || "
        . $row['pagante_id']
        . "</li>"
        . '<br>';
      }

      echo "</ol>";

  } elseif ($result) {
      echo "0 results";
  } else {
      echo "query error";
  }
  $conn->close();
?>
