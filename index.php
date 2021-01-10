
<?php
$filename = 'rules.php';
require_once($filename);
$fp = fopen($filename, 'r');
$class_name = $buffer = '';
$i = 0;
$filter_select_html = '';
$select_method = '';
while (!$class_name) {
    if (feof($fp)) break;

    $buffer .= fread($fp, filesize($filename));
    $tokens = token_get_all($buffer);
    if (strpos($buffer, '{') === false) continue;

    for (;$i<count($tokens);$i++) {
        if ($tokens[$i][0] === T_CLASS) {
            for ($j=$i+1;$j<count($tokens);$j++) {
                if ($tokens[$j] === '{') {
                    $class_name = $tokens[$i+2][1];
                }
               }
        $class_obj = new $class_name;
        $class = new ReflectionClass($class_name);
        $methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);
         foreach ($methods as $method) {
            $select_method = call_user_func(array($class_obj, $method->name));
            $filter_select_html .="<option value='".$class_name.".".$method->name."'>".$select_method['name']."</option>";
         }
      }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title></title>

      <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
      <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
      
      <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
      
      <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
      <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
      
      <link href="css/main.css" rel="stylesheet" media="all">
      <link href="css/custom.css" rel="stylesheet" media="all">
   </head>
   <body id="body">
      
      <div class="page-wrapper bg-grey p-t-100 p-b-100 font-robo">

         <div class="container table-container">
            <div class="text-center">
               <h1 id="products-list" class="py-3">Products List</h1>
               <select style="float:right;" name="product_filter" id="productFilter">
                  <option value="all">All</option>
                  <?php
                     echo $filter_select_html;
                  ?>
               </select>
            </div>
            <div class="row table-row">
               
               <div class="table-responsive">
                  
                  <table class="table table-striped table-bordered table-hover" id="products_table">
                     <thead>
                        <tr>
                        <th>Sl. No</th>
                        <th>Product Name</th>
                        <th>Upload Speed</th>
                        <th>Download Speed</th>
                        <th>Technology</th>
                        <th>Static ip</th>
                        </tr>
                     </thead>
                     <tbody id="product-table-body">
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="vendor/select2/select2.min.js"></script>
      

      <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
      <script src="js/app.js"></script>
      <script>
        
      </script>
   </body>
</html>
