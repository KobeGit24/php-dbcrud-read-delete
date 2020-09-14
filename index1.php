<!-- seleziona tutto dalla tabella pagamenti e stampa il risultato in una lista ordinata (fatto in classe)-->

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

  $sql = " SELECT * FROM pagamenti "
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
