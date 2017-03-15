<?php

$NUMBER_CUR=13;   // number currency fix
$N;                                    //======getRateBuy===========


                                        //======getRateSell===========
function getRateSell($bank_name){
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
    $N=$NUMBER_CUR+$NUMBER_CUR+5+2;
    for ($i=5; $i <$N; $i=$i+2) {
        $html_1[$i]= explode("</span>", $file)[$i];
    }
    $html_2=array();
    $y=0;
    //shit element 
    for ($i=5; $i <$N; $i=$i+2)
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

 $bank = array("PENTOR","BBL","SCB","KBANK","KTB","BAY","UOB","TCAP","TMB","BOT","SUPERTH","SIAMEX","SIA");


 $curren = array("USD 50-100","USD 5-20","USD 1-2","GBP","EUR","JPY","HKD","MYR","SGD","BND","CNY","IDR","INR","KRW","LAK","PHP","TWD","AUD","NZD","CHF","DKK","NOK","SEK","CAD","RUB","VND","ZAR","AED","BHD","OMR","QAR","SAR","SCP");
 ?>

 <!DOCTYPE html>
 <html >
 <head>
    <meta charset="UTF-8">
    <title>Data Table</title>
    <?php include_once('header.php') ?>
     <?php include_once('menu.php') ?>

</head>
<body>
    <div class="tile is-parent">
        <article class="tile is-child notification is-info">
            <table class="table">

                <thead>
                    <tr>
                        <th class="text-left" >BANK / CURRENCY</th>

                        <th  colspan=><?php echo $bank[9]?></th>
                        <th  colspan=><?php echo $bank[1]?></th>
                        <th  colspan=><?php echo $bank[2]?></th>
                        <th  colspan=><?php echo $bank[3]?></th>
                        <th  colspan=><?php echo $bank[4]?></th>
                        <th  colspan=><?php echo $bank[5]?></th>
                        <th  colspan=><?php echo $bank[6]?></th>

                    </tr>
                </thead>
                <tbody class="table-hover" > 


                    <?php

                    $bank_9_Sell=array();

                    $bank_9_Sell=getRateSell($bank[9]);


                    $bank_1_Sell=array();

                    $bank_1_Sell=getRateSell($bank[1]);


                    $bank_2_Sell=array();

                    $bank_2_Sell=getRateSell($bank[2]);


                    $bank_3_Sell=array();

                    $bank_3_Sell=getRateSell($bank[3]);


                    $bank_4_Sell=array();

                    $bank_4_Sell=getRateSell($bank[4]);


                    $bank_5_Sell=array();

                    $bank_5_Sell=getRateSell($bank[5]);

                    $bank_6_Sell=array();

                    $bank_6_Sell=getRateSell($bank[6]);



                    for ($i=0; $i < $NUMBER_CUR; $i++) { 
                        echo '<tr>';
                        echo  '<td class="text-left">'.$curren[$i].'</td>' ;


                        echo  '<td class="text-left" >'.$bank_9_Sell[$i].'</td>' ;


                        echo  '<td class="text-left" >'.$bank_1_Sell[$i].'</td>' ;


                        echo  '<td class="text-left" >'.$bank_2_Sell[$i].'</td>' ;


                        echo  '<td class="text-left" >'.$bank_3_Sell[$i].'</td>' ;


                        echo  '<td class="text-left" >'.$bank_4_Sell[$i].'</td>' ;

                        echo  '<td class="text-left" >'.$bank_5_Sell[$i].'</td>' ;

                        echo  '<td class="text-left" >'.$bank_6_Sell[$i].'</td>' ;



                        echo '</tr>';
                    }
                    ?>        
                </tbody>
            </table>
        </article>
    </div>





</body>
</html>
