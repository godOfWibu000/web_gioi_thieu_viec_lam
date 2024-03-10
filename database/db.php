<?php
  $conn = new mysqli("localhost","root","","vieclamsvitvnua");

  if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
  }else{
    // echo "Connect Success";
  }

  function getData($conn, $sql, $data){
    $dsViecLam = mysqli_query($conn, $sql);
    if($dsViecLam->num_rows > 0){
      while($row = $dsViecLam->fetch_assoc()){
          require $data;
      }
    }
  }

  function getListData($conn, $sql){
    $ds = mysqli_query($conn, $sql);
    if($ds->num_rows > 0){
      return $ds;
    }
  }

  function dsThongTinBoSung($conn, $sql, $key){
    $dsDB = mysqli_query($conn, $sql);
    $i = 0;
    $ds = null;
    if($dsDB->num_rows > 0){
      while($row = $dsDB->fetch_assoc()){
        $ds[$i] = $row[$key];
        $i++;
      }
    }

    return $ds;
  }

  function getSingleData($conn, $sql, $key){
    $result = mysqli_query($conn, $sql);
    $data;
    if($result->num_rows > 0){
      while ($row = $result->fetch_assoc()) {
        $data = $row[$key];
      }
    }
    return $data;
  }

?>