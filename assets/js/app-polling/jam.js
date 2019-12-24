function Timer() {
        

       var dt=new Date()
       var dtnow = dt.getTime()
       document.getElementById('clock').innerHTML=dt.getHours()+":"+String(dt.getMinutes()).padStart(2, '0')+":"+dt.getSeconds();
       setTimeout("Timer()",1000);
    }

    Timer();