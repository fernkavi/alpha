<?php

if (!function_exists('PingFunction')) {

    /**
     * <description></description>
     *
     * @param
     * @return
     */
    function PingFunction($ip)
    {
        // exec("ping -n 1 -w 1 $ip", $output, $status);
        exec("ping -c 1 -w 1 $ip", $output, $status);
        return $output;
    }

    function DropdownSearch($data){
        echo "<form method='post' id='dropdownNodesForm'>";
        echo "<select class='selectpicker form-control' data-live-search='true'>";
        for($i=0;$i<count($data);$i++){
            echo "<option value='".$data[$i]['id']."'>".$data[$i]['hier'].$data[$i]['name']."</option>";
        }
        echo "</select>";
        echo "<input type='hidden' name='hiddenSearch' id='hiddenSearch' />";
        echo "<input type='submit' name='submitSearch' class='btn btn-info' value='Submit' />";
        echo "</form>";
    }

    function CompareStatus2($status){
        if(count($status)==2){
            if($status[0]['status']=="up" AND $status[1]['status']=="up"){
                return 'up';
            }
            elseif($status[0]['status']=="down" AND $status[1]['status']=="down"){
                return 'down';
            }
            else{
                return 'down';
            }
        }
    }

    function LineNotification($mess){
        // define('LINE_API',"https://notify-api.line.me/api/notify");
        $LINE_API="https://notify-api.line.me/api/notify";
        $token="NGpQX2QqxByZymBorIvaY3serxN3FpBIXE4dTjBlXkY";
        $data=array('message'=>$mess);
        $data=http_build_query($data,'','&');
        $headerOpt=array(
            'http'=>array(
                'method'=>'POST',
                'header'=>"Content-Type: application/x-www-form-urlencoded\r\n"."Authorization: Bearer ".$token."\r\n"."Content-Length: ".strlen($data)."\r\n",
                'content'=>$data
            ),
        );
        $context=stream_context_create($headerOpt);
        $result=file_get_contents($LINE_API,FALSE,$context);
        $res=json_decode($result);
        return $res;
    }



}
