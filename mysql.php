<?php

require_once "koneksi.php";

class Sloka {

  public function getSlokaSQL($keyword) {
    global $conn;
  
    $sql = "SELECT id_sloka, bab, sloka FROM tb_sloka_ta_2 WHERE isi_terjemahan LIKE '%$keyword%'";
    $result = $conn->query($sql);
    $data = array();
  
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      $response=array(
        'status'  => 200,
        'message' =>'Get Sloka From MySQL Successfully.',
        'data'    => $data
      );
  
      header('Content-Type: application/json');
      echo json_encode($response);
    } else {
      $response=array(
        'status'  => 200,
        'message' =>'Get Sloka From MySQL Successfully.',
        'data'    => $data
      );
      
      header('Content-Type: application/json');
      echo json_encode($response);
    }
  
    $conn->close();
  }

  public function getAllSlokaSQL() {
    global $conn;
  
    $sql = "SELECT id_sloka, bab, sloka FROM tb_sloka_ta_2";
    $result = $conn->query($sql);
    $data = array();
  
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      $response=array(
        'status'  => 200,
        'message' =>'Get Sloka From MySQL Successfully.',
        'data'    => $data
      );
  
      header('Content-Type: application/json');
      echo json_encode($response);
    } else {
      $response=array(
        'status'  => 200,
        'message' =>'Get Sloka From MySQL Successfully.',
        'data'    => $data
      );
      
      header('Content-Type: application/json');
      echo json_encode($response);
    }
  
    $conn->close();
  }

  public function insertTestResult() {
    global $conn;

     $arrcheckpost = array('threshold' => '', 'TP' => '', 'FN' => '', 'FP' => '', 'TN'   => '');
     $hitung = count(array_intersect_key($_POST, $arrcheckpost));
     if($hitung == count($arrcheckpost)){
       $sql = "INSERT INTO tb_testing SET
       threshold = '$_POST[threshold]',
       TP = '$_POST[TP]',
       FN = '$_POST[FN]',
       FP = '$_POST[FP]',
       TN = '$_POST[TN]'";
       $result = $conn->query($sql);
        
       if($result)
       {
          $response=array(
             'status' => 200,
             'message' =>'Testing Data Added Successfully.'
          );
       }
       else
       {
          $response=array(
             'status' => 0,
             'message' =>'Testing Data Addition Failed.'
          );
       }
     }else{
      $response=array(
         'status' => 0,
         'message' =>'Parameter Do Not Match'
      );
     }
     header('Content-Type: application/json');
     echo json_encode($response);
  }

  public function insertTestDetailResult() {
    global $conn;

     $arrcheckpost = array('kata_kunci' => '', 'threshold' => '', 'search_result' => '');
     $hitung = count(array_intersect_key($_POST, $arrcheckpost));
     if($hitung == count($arrcheckpost)){
       $sql = "INSERT INTO tb_testing_detail SET
       kata_kunci = '$_POST[kata_kunci]',
       threshold = '$_POST[threshold]',
       search_result = '$_POST[search_result]'";
       $result = $conn->query($sql);
        
       if($result)
       {
          $response=array(
             'status' => 200,
             'message' =>'Testing Detail Data Added Successfully.'
          );
       }
       else
       {
          $response=array(
             'status' => 0,
             'message' =>'Testing Detail Data Addition Failed.'
          );
       }
     }else{
      $response=array(
         'status' => 0,
         'message' =>'Parameter Do Not Match'
      );
     }
     header('Content-Type: application/json');
     echo json_encode($response);
  }

  public function getAllDataUji() {
    global $conn;
  
    $sql = "SELECT kata_kunci FROM tb_data_uji";
    $result = $conn->query($sql);
    $data = array();
  
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      $response=array(
        'status'  => 200,
        'message' =>'Get Data Uji MySQL Successfully.',
        'data'    => $data
      );
  
      header('Content-Type: application/json');
      echo json_encode($response);
    } else {
      $response=array(
        'status'  => 200,
        'message' =>'Get Data Uji From MySQL Successfully.',
        'data'    => $data
      );
      
      header('Content-Type: application/json');
      echo json_encode($response);
    }
  
    $conn->close();
  }

}

?>