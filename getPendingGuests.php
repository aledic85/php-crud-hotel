<?php

  $servername = "localhost";
  $username = "root";
  $password = "juventus";
  $dbname = "Prova1";

  $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_errno) {

      echo ("Connection failed: " . $conn->connect_error);
      return;
    }

    $sql = "SELECT pagamenti.status, pagamenti.price, paganti.name, paganti.lastname
            FROM pagamenti
            JOIN paganti
            ON pagamenti.pagante_id = paganti.id
            WHERE pagamenti.status
            LIKE 'pending'
            ORDER BY pagamenti.price DESC";

    $result = $conn->query($sql);

    $res = [];

    if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {

        $res[] = $row;
      }
    } else {

      echo "0 results";
    }

    $conn->close();

    echo json_encode($res);
?>
