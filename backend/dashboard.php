<?php
    include 'connect.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

    echo "<div class='container fs-4'  >";
    echo "<h1>All users  </h1>";


try{
    $table = "users";
    $db = connect_to_DB($table);
    if($db){

        $query = "select * from `$table`";
        $select_stmt = $db->prepare($query);
        $res=$select_stmt->execute();
        $data = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<table class='table'> <tr><th>ID</th>  <th>Name</th>  <th>Email</th> <th>Phone</th>
           <th>gift	</th>
            </tr>";

        foreach ($data as $row){
           
            echo "<tr>";
            foreach ($row as $element){
               
                echo "<td>{$element}</td>";
            }
           

           
            echo "</tr>";
        }
        echo "</table>";
    }

}catch (Exception $e){
    echo $e->getMessage();
}


?>
