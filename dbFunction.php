<?php
    spl_autoload_register(function ($class_name) {
        include $class_name . '.php';
    });
    require_once('rules.php');
    class dbFunction {  
        public $conn;
        function __construct() {  
            $db = new dbConnect;
            $this->conn=$db->connect_db();
               
        }
        public function getProductData($getData){
            $draw = $getData['draw'];
            $row = $getData['start'];
            $rowperpage = $getData['length'];
            $sel = mysqli_query($this->conn,"select count(*) as allcount from products");
            $records = mysqli_fetch_assoc($sel);
            $totalRecords = $records['allcount'];
            if($getData['filter']=='all')
                $query = "SELECT * from products ";
            else {
                $select_val = explode(".",$getData['filter']);
                $class_name = $select_val[0];
                $method_name = $select_val[1];
                $class_obj = new $class_name;
                $select_method = call_user_func(array($class_obj, $method_name));
                $query = $select_method['query'];
            }
            $qr = mysqli_query($this->conn,$query." order by id desc limit ".$row.",".$rowperpage) or die(mysqli_error($this->conn));
            $fetchResult = array();
            while($row_data = mysqli_fetch_assoc($qr)){
              $fetchResult[] = $row_data;
            }

            $sl_no = $row+1;
            foreach ($fetchResult as $key => $fr) {
                $fetchResult[$key]['sl_no'] = $sl_no;
                $sl_no++;
            }

            $response = array(
              "draw" => intval($draw),
              "iTotalRecords" => $totalRecords,
              "iTotalDisplayRecords" => $totalRecords,
              "aaData" => $fetchResult
            );
            return json_encode($response);
        }

    }

?>