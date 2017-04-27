<?php
  require_once("dbtools.php");

  $book_id[0] = $_GET["book_id"];
  $mode = $_GET["mode"];
/*
  $book_id = 2;
  $mode = "prev";*/
  $link = connection();

  if ($mode == "prev")
  {
    $sql = "select * from product where book_id < $book_id[0] order by book_id desc limit 2";
    $result = execute_sql($link, "mobile", $sql);
    $total_records = mysqli_num_rows($result);

    if ($total_records == 2)
    {
        $row = mysqli_fetch_assoc($result);
       do{
            $rowarray[] = $row;
        }
      while ( $row = mysqli_fetch_assoc($result));{
          echo json_encode($rowarray);
        }
      
    }
    else if ($total_records == 1)
    {
      $sql = "select * from product where book_id = (select max(book_id) from product) or book_id = (select min(book_id) from product) ";
      $result = execute_sql($link, "mobile", $sql);
      $row = mysqli_fetch_assoc($result);

      do{
            $rowarray[] = $row;
        }
      while ( $row = mysqli_fetch_assoc($result));{
          echo json_encode($rowarray);
        }
    }

    else
      {
      $sql = "select * from product order by book_id desc limit 2";
      $result = execute_sql($link, "mobile", $sql);
      $row = mysqli_fetch_assoc($result);

      do{
            $rowarray[] = $row;
        }
      while ( $row = mysqli_fetch_assoc($result));{
          echo json_encode($rowarray);
        }
    }
  }
  

  if ($mode == "next")
  {
    $sql = "select * from product where book_id > $book_id[0] order by book_id  limit 2";
    $result = execute_sql($link, "mobile", $sql);
    $total_records = mysqli_num_rows($result);

    if ($total_records == 2)
    {
        $row = mysqli_fetch_assoc($result);
       do{
            $rowarray[] = $row;
        }
      while ( $row = mysqli_fetch_assoc($result));{
          echo json_encode($rowarray);
        }
      
    }
    else if ($total_records == 1)
    {
      $sql = "select * from product where book_id = (select max(book_id) from product) or book_id = (select min(book_id) from product) ";
      $result = execute_sql($link, "mobile", $sql);
      $row = mysqli_fetch_assoc($result);

      do{
            $rowarray[] = $row;
        }
      while ( $row = mysqli_fetch_assoc($result));{
          echo json_encode($rowarray);
        }
    }

    else
      {
      $sql = "select * from product limit 2";
      $result = execute_sql($link, "mobile", $sql);
      $row = mysqli_fetch_assoc($result);

      do{
            $rowarray[] = $row;
        }
      while ( $row = mysqli_fetch_assoc($result));{
          echo json_encode($rowarray);
        }
    }
  }

  mysqli_free_result($result);
  mysqli_close($link);
?>