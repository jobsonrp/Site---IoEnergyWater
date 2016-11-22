function myFunction() {
    x = document.getElementById("mySelect").value;
    if (x != "on"){
	x = "off";
	}
    //document.getElementById("demo").innerHTML = "You selected: " + x;
}

function main(){
	var nowValue = new Date();			
	var demo = nowValue.getSeconds();
	value = (0.09/59)*demo+0.9;
}

function homeSimulation(){
	main();
	waterSimulation();
	energySimulation();

        document.getElementById("waterTotal").innerHTML = waterTotal + " L/min ";
	document.getElementById("energyTotal").innerHTML = energyTotal + " W ";

	setTimeout("homeSimulation()",2000);
	}

function waterVar(){ 
	//main();
        water1 = parseFloat((15*value).toFixed(2));
        water2 = parseFloat((10*value).toFixed(2));
        waterTotal = parseFloat((water1 + water2).toFixed(2));
	}

function waterSimulation(){ 
	//main();
	waterVar();

        document.getElementById("waterTotal").innerHTML = waterTotal + " L/min ";
        document.getElementById("water1").innerHTML = water1 + " L/min";
        document.getElementById("water2").innerHTML = water2 + " L/min";

	setTimeout("waterSimulation()",2000);
	}

function conditionVariables(statusVar, statusAlarm, baseValue){
          if(statusVar == "on" && statusAlarm == "off"){
             result = parseFloat((baseValue*value).toFixed(2));}
           else {
             result = parseFloat((0).toFixed(2));
          }
	return result;
}

function energyVar(){
        myFunction()
        //statusAir = x;
        air = conditionVariables(x, "off", 1000)
          /*if(statusAir == "on" && alarmAir == "off"){
             air = parseFloat((1000*value).toFixed(2));}
           else {
             air = parseFloat((0).toFixed(2));
          }*/
            shower = parseFloat((3000*value).toFixed(2));
            light1 = parseFloat((15*value).toFixed(2));
            light2 = parseFloat((60*value).toFixed(2));
            lightTotal = parseFloat((light1 + light2).toFixed(2));
            plug1 = parseFloat((50*value).toFixed(2));
            plug2 = parseFloat((110*value).toFixed(2));
            plugTotal = parseFloat((plug1 + plug2).toFixed(2));
	    energyTotal = parseFloat((air+shower+lightTotal+plugTotal).toFixed(2));	
	}

function energySimulation(){ 
	//main();
	energyVar();
      
            document.getElementById("airCond").innerHTML = air + " W " ;
            document.getElementById("eShower").innerHTML = shower + " W ";
            document.getElementById("lightingTotal").innerHTML = lightTotal + " W ";
            document.getElementById("lighting1").innerHTML = light1 + " W";
            document.getElementById("lighting2").innerHTML = light2 + " W";
            document.getElementById("plugTotal").innerHTML = plugTotal + " W";
            document.getElementById("plug1").innerHTML = plug1 + " W";
            document.getElementById("plug2").innerHTML = plug2 + " W";

	setTimeout("energySimulation()",2000);
	}

