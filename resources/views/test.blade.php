<?php
for($i=0;$i<count($downDevice);$i++){
    foreach($downDevice[$i] as $key=>$value){
        echo $key."=>".$value;
    }
}
// for($i=0;$i<count($downDevice);$i++){
//     echo $downDevice[$i];
//     // print_r($downDevice[$i]);
//     // echo "Down Device: ".$downDevice[$i]['type']." ที่ ".$downDevice[$i]['node']['hier'].$downDevice[$i]['node']['name'];
//     echo "<br/>";
// }


// print_r($downDevice['id']);
// echo $downDevice['node_id'][0];
?>
