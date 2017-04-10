<?php

$NUMBER_CUR=13;   // number currency fix
$N;                                    //======getRateBuy===========
function getRateBuy($bank_name){
    global $NUMBER_CUR,$N;
    $postdata = http_build_query(
        array(
            'bank' => $bank_name
            )
        );

    $opts = array(
        'http'=>array(
            'method'=>"POST",
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
            "Content-Length: ".strlen($postdata)."\r\n".
            "User-Agent:MyAgent/1.0\r\n",
            'content' => $postdata
            )
        );

    $context = stream_context_create($opts);

    // Open the file using the HTTP headers set above
    $file = file_get_contents("http://www.bahtcheck.com/get_rate.php", false, $context);
    $html_1=array();
    $N=$NUMBER_CUR+$NUMBER_CUR+4+2;
    //echo "n=".$N;
    for ($i=2; $i <$N; $i=$i+2) {
        $html_1[$i]= explode("</span>", $file)[$i];
    }
    $html_2=array();
    $y=0;
    //shit element 
    for ($i=2; $i <$N; $i=$i+2)
    {
        $html_2[$y]=$html_1[$i];
        $y++;
    }
   /*  cheak shit element 
    for ($i=0; $i <11; $i++) {
         echo  $html_2[$i];
     }*/
     return  $html_2;
 }


                                        //======getRateSell===========
 
 $bank = array("PENTOR","BBL","SCB","KBANK","KTB","BAY","UOB","TCAP","TMB","BOT","SUPERTH","SIAMEX","SIA");


 $curren = array("USD 50-100","USD 5-20","USD 1-2","GBP","EUR","JPY","HKD","MYR","SGD","BND","CNY","IDR","INR","KRW","LAK","PHP","TWD","AUD","NZD","CHF","DKK","NOK","SEK","CAD","RUB","VND","ZAR","AED","BHD","OMR","QAR","SAR","SCP");
 ?>

 <!DOCTYPE html>
 <html >
 <head>
    <meta charset="UTF-8">

    <?php include_once('menu.php') ?>
    <?php include_once('header.php') ?>
    <link rel="stylesheet" href="removedot.css">

</head>

<body>

    <div class="table-title">
    </div>
    <table class="table">

        <thead>
            <tr>
                <th  >BANK</th>
                 <th ><?php echo "MyRate"?></th>
                <th ><?php echo $bank[9]?></th>
                <th ><?php echo $bank[1]?></th>
                <th><?php echo $bank[2]?></th>
                <th  ><?php echo $bank[3]?></th>
                <th  ><?php echo $bank[4]?></th>

            </tr>
        </thead>
        <tbody > 
            <th>CURRENCY/RATE</th>

            <th ></th>


            <th></th>


            <th></th>


            <th ></th>


            <th ></th>

            <th ></th>
            




            <?php
            $bank_9_Buy=array();

            $bank_9_Buy=getRateBuy($bank[9]);


            $bank_1_Buy=array();

            $bank_1_Buy=getRateBuy($bank[1]);


            $bank_2_Buy=array();

            $bank_2_Buy=getRateBuy($bank[2]);


            $bank_3_Buy=array();

            $bank_3_Buy=getRateBuy($bank[3]);


            $bank_4_Buy=array();

            $bank_4_Buy=getRateBuy($bank[4]);


            $con=mysqli_connect("localhost","root","","database");
            $result=mysqli_query($con,"SELECT * FROM money");


            $bank_me=array();

            $i=0;
            while($row=mysqli_fetch_array($result,MYSQLI_NUM))
            {
    
                        $bank_me[$i]=$row[2];
                        $i++;
            }
            echo "<ul style='list-style-type:none'>";
            for ($i=0; $i < $NUMBER_CUR; $i++) { 
                echo '<tr>';
                echo  '<td>'.$curren[$i].'</td>' ;

                echo  '<td>'.$bank_me[$i].'</td>' ;


                echo  '<td >'.$bank_9_Buy[$i].'</td>' ;


                echo  '<td>'.$bank_1_Buy[$i].'</td>' ;


                echo  '<td>'.$bank_2_Buy[$i].'</td>' ;


                echo  '<td>'.$bank_3_Buy[$i].'</td>' ;


                echo  '<td>'.$bank_4_Buy[$i].'</td>' ;




                echo '</tr>';
            }
            echo "</ul>";
        
            ?>        
        </tbody>
    </table>


</body>


</body>
</html>
