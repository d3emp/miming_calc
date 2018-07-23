<canvas id="smile" width="900" height="200" style='background-color:#0d0d0d'></canvas><br>
<div id='x'></div>
<script>
 y=1;
    x=1;
   
    function func() {
      y=y*1.01;
      x=x+1;
      b=x;
      var canvas = document.getElementById('smile');
      var context = canvas.getContext('2d');

      context.beginPath();
      context.arc(x+5,100,x+0.5,0,Math.PI*y*0.9,true);
      
      context.stroke();

     
      context.strokeStyle = 'rgb('+x*3+','+y*9+','+x*y/15+')';
      context.closePath();
      context.stroke();
     if (b<445) {
    setTimeout(func, 25);}
    //document.getElementById('x').innerHTML = x;
    
    }
    func();
    
    </script>
    