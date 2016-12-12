var batteryCharge = parseInt( document.getElementById("batteryInicial").value );
var storedWater = parseInt( document.getElementById("storedWaterInicial").value );

function main(){
	var nowValue = new Date();			
	var demo = nowValue.getSeconds();
	value = (0.09/59)*demo+0.9; // "value" vai variar de 0.9 até 0.99         
}

function homeSimulation(){
	main();
	waterSimulation();
	energySimulation();

        document.getElementById("waterTotalHome").innerHTML = waterTotal + " L/min ";
	document.getElementById("energyTotal").innerHTML = energyTotal + " W ";

	setTimeout("homeSimulation()",1000);
	}

function waterVar(){ 
	
        water1 = conditionVariables(document.getElementById("statusWater1").value, "0", 10000, 15);
        water2 = conditionVariables(document.getElementById("statusWater2").value, "0", 10000, 10);
        waterTotal = parseFloat((water1 + water2).toFixed(2));
	useStored = parseInt( document.getElementById("useStored").value );
	
	rainInputValue = parseFloat( document.getElementById("rainInput").value );

	if (rainInputValue >= 0 && rainInputValue <= 62.5){
		if (storedWater > 5 && storedWater < 100 && useStored == 1){
			// Usando a agua da sisterna e enchendo também.
			storedWater =  storedWater - waterTotal/60 + rainInputValue/60 ;
			companyWaterUsed = 0;
		} else if (storedWater <= 5 && useStored == 1){ 
			//alert('In Water General Information, change Use Stored to "No".');
			storedWater =  storedWater + rainInputValue/60 ;
			companyWaterUsed = waterTotal; 
		} else if ( storedWater < 99 && useStored == 0) { // Capacidade máxima da sisterna 100 Litros
			companyWaterUsed = waterTotal;
			storedWater =  storedWater + rainInputValue/60 ; // Enchendo a Sisterna
        	} else if ( storedWater >= 100 ) {
			
			companyWaterUsed = 0;
			storedWater = storedWater - waterTotal/60;
		}
		
	} else {
		alert('Please! Enter valid number in Rain.');
		rainInputValue = 0;
	}

	if (storedWater <= 0) {
		storedWater = 0;}

storedWater = parseFloat((storedWater).toFixed(2));
companyWaterUsed = parseFloat((companyWaterUsed).toFixed(2));

}

function waterSimulation(){ 
	waterVar();
        document.getElementById("water1").innerHTML = water1 + " L/min";
        document.getElementById("water2").innerHTML = water2 + " L/min";
	document.getElementById("waterTotal").innerHTML = waterTotal + " L/min ";
	document.getElementById("storedWater").innerHTML = storedWater + " L ";
	document.getElementById("companyWaterUsed").innerHTML = companyWaterUsed + " L/min ";
	}

function energyVar(){ 
        air = conditionVariables(document.getElementById("statusAir").value,"0", 10000, 1000);
	shower = conditionVariables(document.getElementById("statusShower").value,"0", 10000, 3000);
        light1 = conditionVariables(document.getElementById("statusLight1").value,"0", 10000, 15);
	light2 = conditionVariables(document.getElementById("statusLight2").value,"0", 10000, 60);
        plug1 = conditionVariables(document.getElementById("statusPlug1").value,"0", 10000, 50);
	plug2 = conditionVariables(document.getElementById("statusPlug2").value,"0", 10000, 110);
	lightTotal = parseFloat((light1 + light2).toFixed(2));
        plugTotal = parseFloat((plug1 + plug2).toFixed(2));
	energyTotal = parseFloat((air+shower+lightTotal+plugTotal).toFixed(2));	
	hourSolar = parseInt(document.getElementById("hourSolarInput").value);
	if (hourSolar >= 0 && hourSolar <= 24 ){
		if (hourSolar < 5 || hourSolar > 18){
			energyProduced = parseFloat((hourSolar * 0).toFixed(2));}
		if (hourSolar >= 5 && hourSolar <= 12){
			energyProduced = parseFloat(( 1000*(hourSolar-5)/7).toFixed(2));}
		if (hourSolar > 12 && hourSolar <= 18){
			energyProduced = parseFloat((1000*((hourSolar/(-6))+3)).toFixed(2));}
	  } else {
		energyProduced = parseFloat((0).toFixed(2));
		alert('Please! Enter valid number in Hour.'); 
          }

	constantBattery = parseFloat((energyProduced - energyTotal).toFixed(2));
	batteryCharge = parseFloat((batteryCharge).toFixed(2));

	if (batteryCharge < 0) {
		batteryCharge = 0;}

	if (energyTotal > 1000) {
		if (batteryCharge >= 0) {
			companyEnergyUsed = energyTotal - 1000;
			batteryCharge = batteryCharge - 1000/60;
			statusEnergyCompany = "Buying";
		} else {
			companyEnergyUsed = constantBattery;
			statusEnergyCompany = "Buying";
		}
	} else {
		if (constantBattery >= 0) {
			if (batteryCharge >= 0 && batteryCharge <= 1000) { // Carga Máxima do Banco de Baterias = 2000 Wh
				batteryCharge = batteryCharge + constantBattery/60 ; // Carregando a bateria
				statusEnergyCompany = "Neutral";
				companyEnergyUsed = 0;
			} else if (batteryCharge > 1000) {
				companyEnergyUsed = constantBattery;
				statusEnergyCompany = "Selling";
			}

		} else if (batteryCharge > 0) {
			batteryCharge = batteryCharge + constantBattery/60 ; // constantBattery < 0, descarregando a bateria
			statusEnergyCompany = "Neutral";
			companyEnergyUsed = 0;
		} else if (batteryCharge == 0) {
			companyEnergyUsed = (-1)*constantBattery;
			statusEnergyCompany = "Buying";
		}

	}
	

batteryCharge = parseFloat((batteryCharge).toFixed(2));
companyEnergyUsed = parseFloat((companyEnergyUsed).toFixed(2));
		
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
	document.getElementById("energyProduced").innerHTML = energyProduced + " Wh";
	document.getElementById("batteryCharge").innerHTML = batteryCharge + " W";
	document.getElementById("statusEnergyCompany").innerHTML = statusEnergyCompany ;
	document.getElementById("companyEnergyUsed").innerHTML = companyEnergyUsed + " W";
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

function actionedAlarms(currentValue, maxValue){
       if (currentValue > maxValue){
	  actionedAlarm = "1";
	} else {
        actionedAlarm = "0";
        }
    return actionedAlarm;       
} 
