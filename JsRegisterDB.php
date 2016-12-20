
<script type="text/javascript">

var nowValue = new Date();			
var second = nowValue.getSeconds();

var varAleatoria = Math.random()/10 + 0.9;
var valueX = varAleatoria * (0.09/59) * second + 0.9;
var xV = [second-1, second-1, second-1];
var batteryCharge = 100 * valueX * varAleatoria;
var storedWater = 50 * valueX * varAleatoria;
var contV = [0, 0, 0];

function main(){
	var nowValue = new Date();			
	var demo = nowValue.getSeconds();
	var horas = nowValue.getHours();
	horaAtual = horas;
	value = varAleatoria * (0.09/59) * demo + 0.9; // "value" vai variar de 0.9 até 0.99 aproximadamente
	sec = demo;	         
}

function homeSimulation(){
	main();
	waterSimulation();
	energySimulation();	
	}

function maxTimeWater(){ 
	time1 = 5;
	time2 = 1;
	time3 = 3;
	}

function statusAlarmWater(){ 
	alarmWater1 = "0";
	alarmWater2 = "1";
	alarmWater3 = "0";
	}

function waterVar(){ 
	maxTimeWater();
	statusAlarmWater();
	water1 = waterAlarmTime(1, "Shower", "1", alarmWater1, time1, 10);
	water2 = waterAlarmTime(2, "Bathroom Tap", "1", alarmWater2, time2, 6);
	water3 = waterAlarmTime(3, "Kitchen Tap", "1", alarmWater3, time3, 8);
        waterTotal = parseFloat((water1 + water2 + water3).toFixed(2));
	useStored = 1;
	if (horaAtual >= 20) {
	     rainInputValue = 30; 
	} else {
	     rainInputValue = 0;	
	}

	rainInputValue = rainInputValue * (62.5/100) * varAleatoria;

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
		//alert('Please! Enter valid number in Rain.');
		rainInputValue = 0;
	}

	if (storedWater <= 0) {
		storedWater = 0;}

water1 = parseFloat((water1).toFixed(2));
water2 = parseFloat((water2).toFixed(2));
water3 = parseFloat((water3).toFixed(2));
storedWater = parseFloat((storedWater).toFixed(2));
companyWaterUsed = parseFloat((companyWaterUsed).toFixed(2));

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
				//document.getElementById("statusVarWater"+id).value = "0";
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

function waterSimulation(){ 
	waterVar();
	}


function energyMaxValue(){ 
	max1 = 950;
	max2 = 2870;
	max3 = 14;
	max4 = 57.1;
	max5 = 49.35;
	max6 = 101.68;
	}

function statusAlarmEnergy(){ 
	statusAlarm1 = "0";
	statusAlarm2 = "0";
	statusAlarm3 = "0";
	statusAlarm4 = "0";
	statusAlarm5 = "0";
	statusAlarm6 = "0";
	}

function energyVar(){ 
	energyMaxValue();
	statusAlarmEnergy();
        air = conditionVariables(1, "AirConditioning","1", statusAlarm1, max1, 1000);
	shower = conditionVariables(2, "Shower", "1", statusAlarm2, max2, 3000);
        light1 = conditionVariables(3, "Light 1","1", statusAlarm3, max3, 15);
	light2 = conditionVariables(4, "Light 2", "1", statusAlarm4, max4, 60);
        plug1 = conditionVariables(5, "Refrigerator", "1", statusAlarm5, max5, 50);
	plug2 = conditionVariables(6, "TV42", "1", statusAlarm6, max6, 110);
	lightTotal = parseFloat((light1 + light2).toFixed(2));
        plugTotal = parseFloat((plug1 + plug2).toFixed(2));
	energyTotal = parseFloat((air+shower+lightTotal+plugTotal).toFixed(2));	
        
	hourSolar = horaAtual;

	if (hourSolar >= 0 && hourSolar <= 24 ){
		if (hourSolar < 5 || hourSolar > 18){
			energyProduced = parseFloat((hourSolar * 0).toFixed(2));}
		if (hourSolar >= 5 && hourSolar <= 12){
			energyProduced = parseFloat(( 1000*(hourSolar-5)/7).toFixed(2));}
		if (hourSolar > 12 && hourSolar <= 18){
			energyProduced = parseFloat((1000*((hourSolar/(-6))+3)).toFixed(2));}
	  } else {
		energyProduced = parseFloat((0).toFixed(2));
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
}


function conditionVariables(id, name, statusVar, statusAlarm, maxValue, baseValue){
        currentValue = parseFloat((baseValue*value).toFixed(2)); 
        condictionAlarm = actionedAlarms(currentValue, maxValue);
          if(statusVar == "1" && !(statusAlarm == "1" && condictionAlarm == "1") ){
             	result = currentValue;
	  } else if (statusVar == "1" && statusAlarm == "1" && condictionAlarm == "1"){
		//alert("Alert! Turn Off " + name + ". Its power is above the maximum value (MaxValue = " + maxValue + " W)");	
		//document.getElementById("statusVar"+id).value = "0";
		result = 0;
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

function confirmAlarm(text) {
    if (confirm(text) == true) {
	resultConfirm = true;
    } else {
	resultConfirm = false;
    }
return resultConfirm;	
}

homeSimulation();

    window.location.href = "DataRegister_DB.php?water1=" + water1 + "&water2=" + water2 + "&water3=" + water3 + "&energy1=" + air + "&energy2=" + shower + "&energy3=" + light1 + "&energy4=" + light2 + "&energy5=" + plug1 + "&energy6=" + plug2;

</script>

