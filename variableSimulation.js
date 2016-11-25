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
        water1 = conditionVariables(document.getElementById("statusWater1").value, "0", 10000, 15)
        water2 = conditionVariables(document.getElementById("statusWater2").value, "0", 10000, 10)
        waterTotal = parseFloat((water1 + water2).toFixed(2));
	}

function actionedAlarms(currentValue, maxValue){
       if (currentValue > maxValue){
	  actionedAlarm = "1";
	} else {
        actionedAlarm = "0";
        }
    return actionedAlarm;       
} 

function waterSimulation(){ 
	waterVar();
        document.getElementById("waterTotalHome").innerHTML = waterTotal + " L/min ";
        document.getElementById("water1").innerHTML = water1 + " L/min";
        document.getElementById("water2").innerHTML = water2 + " L/min";
	document.getElementById("waterTotal").innerHTML = waterTotal + " L/min ";
	}

function conditionVariables(statusVar, statusAlarm, maxValue, baseValue){
        currentValue = parseFloat((baseValue*value).toFixed(2)); 
        condictionAlarm = actionedAlarms(currentValue, maxValue);
          if(statusVar == "1" && !(statusAlarm == "1" && condictionAlarm == "1") ){
             result = currentValue;
          } else {
             result = parseFloat((0).toFixed(2));
          }
	return result;
}

function energyVar(){
   max1 = document.getElementById("maxValue1").value;
        air = conditionVariables(document.getElementById("statusAir").value,"0", 10000, 1000)
	shower = conditionVariables(document.getElementById("statusShower").value,"0", 10000, 3000)
        light1 = conditionVariables(document.getElementById("statusLight1").value,"0", 10000, 15)
	light2 = conditionVariables(document.getElementById("statusLight2").value,"0", 10000, 60)
        plug1 = conditionVariables(document.getElementById("statusPlug1").value,"0", 10000, 50)
	plug2 = conditionVariables(document.getElementById("statusPlug2").value, document.getElementById("alarm1").value, max1, 110)
	lightTotal = parseFloat((light1 + light2).toFixed(2));
        plugTotal = parseFloat((plug1 + plug2).toFixed(2));
	energyTotal = parseFloat((air+shower+lightTotal+plugTotal).toFixed(2));	
        teste33 = actionedAlarms(plug2, max1);
	}

function energySimulation(){ 
	energyVar();   
            document.getElementById("airCond").innerHTML = air + " W " ;
            document.getElementById("eShower").innerHTML = shower + " W ";
            document.getElementById("lightingTotal").innerHTML = lightTotal + " W ";
            document.getElementById("lighting1").innerHTML = light1 + " W";
            document.getElementById("lighting2").innerHTML = light2 + " W";
            document.getElementById("plugTotal").innerHTML = plugTotal + " W";
            //document.getElementById("plug1").innerHTML = plug1 + " W";
            document.getElementById("plug1").innerHTML = teste33 + " W";
            document.getElementById("plug2").innerHTML = plug2 + " W";
	}

