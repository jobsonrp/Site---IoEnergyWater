var batteryCharge = parseInt( document.getElementById("batteryInicial").value );
var storedWater = parseInt( document.getElementById("storedWaterInicial").value );
var contV = [0, 0, 0];
var nowValue = new Date();			
var second = nowValue.getSeconds();
var xV = [second-1, second-1, second-1];

function main(){
	var nowValue = new Date();			
	var demo = nowValue.getSeconds();
	value = (0.09/59)*demo+0.9; // "value" vai variar de 0.9 até 0.99
	sec = demo;	         
}

function homeSimulation(){
	main();
	waterSimulation();
	energySimulation();
	
        document.getElementById("waterTotalHome").innerHTML = waterTotal + " L/min ";
	document.getElementById("energyTotal").innerHTML = energyTotal + " W ";

	setTimeout("homeSimulation()",1000);
	}

function maxTimeWater(){ 
	time1 = parseInt(document.getElementById("maxTimeWater1").value);
	time2 = parseInt(document.getElementById("maxTimeWater2").value);
	time3 = parseInt(document.getElementById("maxTimeWater3").value);
	}

function statusAlarmWater(){ 
	alarmWater1 = parseInt(document.getElementById("statusAlarmWater1").value);
	alarmWater2 = parseInt(document.getElementById("statusAlarmWater2").value);
	alarmWater3 = parseInt(document.getElementById("statusAlarmWater3").value);
	}

function waterVar(){ 
	maxTimeWater();
	statusAlarmWater();
	water1 = waterAlarmTime(1, "Shower", document.getElementById("statusVarWater1").value, alarmWater1, time1, 10);
	water2 = waterAlarmTime(2, "Bathroom Tap", document.getElementById("statusVarWater2").value, alarmWater2, time2, 6);
	water3 = waterAlarmTime(3, "Kitchen Tap", document.getElementById("statusVarWater3").value, alarmWater3, time3, 8);
        waterTotal = parseFloat((water1 + water2 + water3).toFixed(2));
	useStored = parseInt( document.getElementById("useStored").value );
	
	rainInputValue = parseFloat( document.getElementById("rainInput").value );
	rainInputValue = rainInputValue * (62.5/100) ;

	if (rainInputValue >= 0 && rainInputValue <= 62.5){
		if (storedWater > 5 && storedWater < 100 && useStored == 1){
			// Usando a agua da sisterna e enchendo também.
			storedWater =  storedWater - waterTotal/60 + rainInputValue/60 ;
			companyWaterUsed = 0;
		} else if (storedWater <= 5 && useStored == 1){ 
			//alert('In Water General Information, change Use Stored to "No".');
			storedWater =  storedWater + rainInputValue/60 ;
			companyWaterUsed = waterTotal; 
		} else if ( storedWater < 100 && useStored == 0) { // Capacidade máxima da sisterna 100 Litros
			companyWaterUsed = waterTotal;
			storedWater =  storedWater + rainInputValue/60 ; // Enchendo a Sisterna
        	} else if ( storedWater >= 100 && useStored == 0) {
			companyWaterUsed = waterTotal;
			storedWater = storedWater - waterTotal/60;
        	} else if ( storedWater >= 100 && useStored == 1) {
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
        document.getElementById("outputVarWater1").innerHTML = water1 + " L/min";
        document.getElementById("outputVarWater2").innerHTML = water2 + " L/min";
	document.getElementById("outputVarWater3").innerHTML = water3 + " L/min";
	document.getElementById("storedWater").innerHTML = storedWater + " L ";
	document.getElementById("companyWaterUsed").innerHTML = companyWaterUsed + " L/min ";
	}


function energyMaxValue(){ 
	max1 = parseInt(document.getElementById("maxValueEnergy1").value);
	max2 = parseInt(document.getElementById("maxValueEnergy2").value);
	max3 = parseInt(document.getElementById("maxValueEnergy3").value);
	max4 = parseInt(document.getElementById("maxValueEnergy4").value);
	max5 = parseInt(document.getElementById("maxValueEnergy5").value);
	max6 = parseInt(document.getElementById("maxValueEnergy6").value);
	}

function statusAlarmEnergy(){ 
	statusAlarm1 = parseInt(document.getElementById("statusAlarmEnergy1").value);
	statusAlarm2 = parseInt(document.getElementById("statusAlarmEnergy2").value);
	statusAlarm3 = parseInt(document.getElementById("statusAlarmEnergy3").value);
	statusAlarm4 = parseInt(document.getElementById("statusAlarmEnergy4").value);
	statusAlarm5 = parseInt(document.getElementById("statusAlarmEnergy5").value);
	statusAlarm6 = parseInt(document.getElementById("statusAlarmEnergy6").value);
	}

function energyVar(){ 
	energyMaxValue();
	statusAlarmEnergy();
        air = conditionVariables(1, "AirConditioning",document.getElementById("statusVar1").value, statusAlarm1, max1, 1000);
	shower = conditionVariables(2, "Shower", document.getElementById("statusVar2").value, statusAlarm2, max2, 3000);
        light1 = conditionVariables(3, "Light 1",document.getElementById("statusVar3").value, statusAlarm3, max3, 15);
	light2 = conditionVariables(4, "Light 2", document.getElementById("statusVar4").value, statusAlarm4, max4, 60);
        plug1 = conditionVariables(5, "Refrigerator", document.getElementById("statusVar5").value, statusAlarm5, max5, 50);
	plug2 = conditionVariables(6, "TV42", document.getElementById("statusVar6").value, statusAlarm6, max6, 110);
	lightTotal = parseFloat((light1 + light2).toFixed(2));
        plugTotal = parseFloat((plug1 + plug2).toFixed(2));
	energyTotal = parseFloat((air+shower+lightTotal+plugTotal).toFixed(2));	
	hourSolar = parseInt(document.getElementById("hourSolarInput").value);
	hourSolar = hourSolar * 24/100 ;

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
        document.getElementById("outputVarEnergy1").innerHTML = air + " W " ;
        document.getElementById("outputVarEnergy2").innerHTML = shower + " W ";
	document.getElementById("lightingTotal").innerHTML = lightTotal + " W ";
	document.getElementById("outputVarEnergy3").innerHTML = light1 + " W";
	document.getElementById("outputVarEnergy4").innerHTML = light2 + " W";
	document.getElementById("plugTotal").innerHTML = plugTotal + " W";
	document.getElementById("outputVarEnergy5").innerHTML = plug1 + " W";
	document.getElementById("outputVarEnergy6").innerHTML = plug2 + " W";
	document.getElementById("energyProduced").innerHTML = energyProduced + " W";
	document.getElementById("batteryCharge").innerHTML = batteryCharge + " W";
	document.getElementById("statusEnergyCompany").innerHTML = statusEnergyCompany ;
	document.getElementById("companyEnergyUsed").innerHTML = companyEnergyUsed + " W";
}


function conditionVariables(id, name, statusVar, statusAlarm, maxValue, baseValue){
        currentValue = parseFloat((baseValue*value).toFixed(2)); 
        condictionAlarm = actionedAlarms(currentValue, maxValue);
          if(statusVar == "1" && !(statusAlarm == "1" && condictionAlarm == "1") ){
             	result = currentValue;
	  } else if (statusVar == "1" && statusAlarm == "1" && condictionAlarm == "1"){
		alert("Alert! Turn Off " + name + ". Its power is above the maximum value (MaxValue = " + maxValue + " W)");	
		document.getElementById("statusVar"+id).value = "0";
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

function waterAlarmTime(id, name, statusVar, statusAlarm, maxTime, baseValue) { 
	currentValue = parseFloat((baseValue*value).toFixed(2));
	result = currentValue;
	if (statusVar == "0") {
		contV[id] = 0;
		xV[id] = sec; // sec varia de 0 - 59
		result = parseFloat((0).toFixed(2));
	} else if (statusAlarm == "0") {
		contV[id] = 0;
		xV[id] = sec; // sec varia de 0 - 59
		result = currentValue;
	} else {
		result = currentValue;
		if (contV[id] >= maxTime && statusAlarm == "1") {
			textAlarm = "Please! Close " + name + ". It's open more than " + maxTime + " minutes.";
			if (confirmAlarm(textAlarm) == true) {
				document.getElementById("statusVarWater"+id).value = "0";
				result = 0;				
			} else {
				contV[id] = 0;
			}
		} else if (statusAlarm == "1") {
			if (sec == xV[id]) {
				contV[id] = contV[id] + 1;			
			}
		}
	}
    return result;	
}

function confirmAlarm(text) {
    if (confirm(text) == true) {
	resultConfirm = true;
    } else {
	resultConfirm = false;
    }
return resultConfirm;	
}

function DataRegister_Now() {
    window.location.href = "DataRegister_Online.php?air=" + air + "&shower=" + shower + "&light1=" + light1 + "&light2=" + light2 + "&plug1=" + plug1 + "&plug2=" + plug2 + "&sun=" + hourSolar + "&produced=" + energyProduced + "&energyTotal=" + energyTotal + "&batteryCharge=" + batteryCharge + "&companyUse=" + companyEnergyUsed + "&statusCompany=" + statusEnergyCompany + "&water1=" + water1 + "&water2=" + water2 + "&water3=" + water3 + "&rain=" + rainInputValue + "&totalStored=" + storedWater + "&totalConsumed=" + waterTotal + "&companyConsumed=" + companyWaterUsed + "&useStored=" + useStored; 

}


