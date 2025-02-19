<?php 
if($result -> num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "
        <p'>". $row['playerName']. "</p>
        <p >". $row['position']. "</p>

        ";
    }
}

?>