function main(){
	var nowValue = new Date();			
	var demo = nowValue.getSeconds();
	value = (0.09/59)*demo+0.9; // value vai variar de 0.9 até 0.99         
}

function homeSimulation(){
	main();
	waterSimulation();
	energySimulation();

        document.getElementById("waterTotalHome").innerHTML = waterTotal + " L/min ";
	document.getElementById("energyTotal").innerHTML = energyTotal + " W ";

	setTimeout("homeSimulation()",2000);waterTotal/100
	}

function waterVar(){ 
        water1 = conditionVariables(document.getElementById("statusWater1").value, "0", 10000, 15);
        water2 = conditionVariables(document.getElementById("statusWater2").value, "0", 10000, 10);
        waterTotal = parseFloat((water1 + water2).toFixed(2));
	storedWater = parseInt(document.getElementById("storedWaterInicial").value);
	//storedWater = document.getElementById("storedWaterInicial").value;
	rainInputValue = parseInt( document.getElementById("rainInput").value );
	if (rainInputValue >= 0 && rainInputValue <= 100){
		if (rainInputValue == 0){
			//storedWater = parseFloat(   (  storedWater + value + value*rainInputValue/50 ).toFixed(2)  );
			storedWater = parseFloat(   (  180 - value*59*(rainInputValue/50) - waterTotal).toFixed(2)  ); }
		else {
			storedWater = parseFloat(   (  60 + value*59*(rainInputValue/50) -  waterTotal).toFixed(2)  ); }
	} else {
		storedWater = parseFloat((0).toFixed(2));
		alert('Please! Enter valid number in Rain.');
	}

//parseFloat( document.getElementById("storedWaterInicial").value).toFixed(2));
	//storedWater = 102;
	//storedWater = parseFloat( (storedWater + rainInput ).toFixed(2));
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
	document.getElementById("storedWater").innerHTML = storedWater + " L ";
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

function energyVar(){ // valueStatusVar$reg[0] // outputVarEnergy$reg[0]
   	max1 = document.getElementById("maxValue1").value;
	max2 = document.getElementById("maxValue2").value;
        air = conditionVariables(document.getElementById("statusAir").value,document.getElementById("alarm2").value, max2, 1000);
	shower = conditionVariables(document.getElementById("statusShower").value,"0", 10000, 3000);
        light1 = conditionVariables(document.getElementById("statusLight1").value,"0", 10000, 15);
	light2 = conditionVariables(document.getElementById("statusLight2").value,"0", 10000, 60);
        plug1 = conditionVariables(document.getElementById("statusPlug1").value,"0", 10000, 50);
	plug2 = conditionVariables(document.getElementById("statusPlug2").value, document.getElementById("alarm1").value, max1, 110);
	lightTotal = parseFloat((light1 + light2).toFixed(2));
        plugTotal = parseFloat((plug1 + plug2).toFixed(2));
	energyTotal = parseFloat((air+shower+lightTotal+plugTotal).toFixed(2));	
	//outputVarEnergy1 = conditionVariables(document.getElementById("valueStatusVar1").value, document.getElementById("alarm1").value, max1, 110);
	hourSolar = document.getElementById("hourSolarInput").value;
	if (hourSolar >= 0 && hourSolar <= 24 ){
		if (hourSolar < 5 || hourSolar > 18){
			energyProduced = parseFloat((hourSolar * 0).toFixed(2));}
		if (hourSolar >= 5 && hourSolar <= 12){
			energyProduced = parseFloat(( 1000*(hourSolar-5)/7).toFixed(2));}
		if (hourSolar > 12 && hourSolar <= 18){
			energyProduced = parseFloat((1000*(-hourSolar/6)+3).toFixed(2));}
	  } else {
		energyProduced = parseFloat((hourSolar * 0).toFixed(2));
		alert('Please! Enter valid number in Hour.'); 
          }

	constantBattery = parseFloat((energyProduced - energyTotal).toFixed(2)); // energyProduced - energyTotal;

	batteryCharge = document.getElementById("batteryInicial").value;

	if (constantBattery > 0){
		batteryCharge = parseFloat(   (  batteryCharge - (energyTotal/(-50))  ).toFixed(2)  );}
	else {
		batteryCharge = parseFloat(   (  batteryCharge - (energyTotal/(50))  ).toFixed(2)  );}		
}

function energySimulation(){ 
	energyVar();   
            	document.getElementById("airCond").innerHTML = air + " W " ;
            	document.getElementById("eShower").innerHTML = shower + " W ";
		document.getElementById("lightingTotal").innerHTML = lightTotal + " W ";
		document.getElementById("lighting1").innerHTML = light1 + " W";
		document.getElementById("lighting2").innerHTML = light2 + " W";
		document.getElementById("plugTotal").innerHTML = plugTotal + " W";
		document.getElementById("plug1").innerHTML = plug1 + " W";
		document.getElementById("plug2").innerHTML = plug2 + " W";
        	//document.getElementById("outputVarEnergy1").innerHTML = outputVarEnergy1 + " W";
		document.getElementById("energyProduced").innerHTML = energyProduced + " W";
		document.getElementById("batteryCharge").innerHTML = batteryCharge + " W";
	    
	}

