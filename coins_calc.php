<meta charset="utf-8">
<?php
    include ('smile.php');
    $gpu_data= file_get_contents('GPUs.json');
    $gpu_hr = json_decode($gpu_data,true);
    echo "<select onclick='calc()'id='gpu' width='440'><option value='100'></option>";
    for ($i=0; $i<count($gpu_hr['GPUs']); $i++){
        echo "<option value=$i>".$gpu_hr['GPUs'][$i]['GPUName']."</option>";
    }
    echo "</select>";

?>
<script src='js/jquery-3.3.1.min.js'></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<div id = 'coins' ></div>

<script>
        function calc(){
            gpu_val = $('#gpu').val();                
            if (gpu_val!=100){$.get('coins.php',{gpu:gpu_val}, function(data){ $('#coins').html(data)} )}
            else $('#coins').html('')
        };
</script>