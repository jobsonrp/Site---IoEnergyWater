function main(){
	var nowValue = new Date();			
	var demo = nowValue.getSeconds();
	value = (0.09/59)*demo+0.9;
	}

function homeSimulation(){
	main();
	waterVar();
	energyVar();

        document.getElementById("waterTotal").innerHTML = waterTotal + " L/min ";
	document.getElementById("energyTotal").innerHTML = energyTotal + " W ";

	setTimeout("homeSimulation()",2000);
	}

function waterVar(){ 
	main();
        water1 = parseFloat((15*value).toFixed(2));
        water2 = parseFloat((10*value).toFixed(2));
        waterTotal = parseFloat((water1 + water2).toFixed(2));
	}

function waterSimulation(){ 
	main();
	waterVar();

        document.getElementById("waterTotal").innerHTML = waterTotal + " L/min ";
        document.getElementById("water1").innerHTML = water1 + " L/min";
        document.getElementById("water2").innerHTML = water2 + " L/min";

	setTimeout("waterSimulation()",2000);
	}

function energyVar(){ 
	main();
            air = parseFloat((1000*value).toFixed(2));
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
	main();
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

