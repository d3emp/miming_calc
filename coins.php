<?php
    //Reward = ((hashrate * block_reward) / current_difficulty)
    include('json_get.php'); 
    $data= file_get_contents('json_test.json');
    $json = json_decode($data,true);
    $gpu = $_GET['gpu'];
    $bc_course = 7420;
    $gpu_data= file_get_contents('GPUs.json'); #--------------v.3
    $gpu_hr = json_decode($gpu_data,true);
    foreach ($json['coins'] as $coinName => $coinData ) {
        $br = $coinData['block_reward'];
        $diff = $coinData['difficulty24'];
        $course = $coinData['exchange_rate'];
        $alg = $coinData['algorithm'];
        $nh = $coinData['nethash'];
        $hr = $gpu_hr['GPUs'][$gpu][$alg]; 
        $bt = $coinData['block_time'];
        $time = 86400;
        //userHash/((difficulty)*solsPerDiff)*blockReward*3600*hashFactor (sollsPerDiff = 8192)
        if ($coinData['algorithm']=='Equihash'){$reward24=$hr/($diff*8192)*$br*$time*$course*$bc_course; }
        else {$reward24 = ($hr/$nh/$bt)*$br*$time*$course*$bc_course;};
        //if ($reward24>3) {$reward24=$reward24/10;}
        //$reward24 = $gpu_hr['GPUs'][$gpu][$alg]*$br/$diff*$time*$course*$bc_course;
        //if ($reward24&&$coinData["tag"]!='NICEHASH') echo "<table class='table'><tr><td>   $ ".substr(round($reward24,4),0,4) .' '.$coinName.' '.$coinData["algorithm"].'</td></table>';
        $i++;
        if ($reward24&&$coinData["tag"]!='NICEHASH') $reward_count[$i]=substr(round($reward24,4),0,4).' '.$coinName.' '.$coinData["algorithm"];
        
    } ;
    rsort($reward_count);
    for ($i=0; $i<count($reward_count);$i++){if ($reward_count[$i]>0.05) echo  "<table class='table'><tr><td>   $ ". $reward_count[$i].'</td></table>';}
        
?>