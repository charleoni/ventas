var serie1 = []
var serie2 = []
var serie3 = []
var serie4 = []
var categories = []
var zona = []
var total_ventas = []
var totk_ant=0,totp_ant=0
var totk_cen=0,totp_cen=0
var totk_val=0,totp_val=0
var totk_eje=0,totp_eje=0
var dateDesde, dateHasta
var zo_27_val=0,zo_27_ant=0
var zo_27_cen=0,zo_27_eje=0
var totk_rm_ant=0,totk_rm_cen=0
var totK_rm_val=0,totk_rm_eje=0
var totp_rm_ant=0,totp_rm_cen=0
var totp_rm_val=0,totp_rm_eje=0


window.onload = function(){
	console.log('load correcta...')

	swal({
	  position: 'top-center',
	  type: 'success',
	  title: 'Carga del sitio correctamente!!!',
	  showConfirmButton: false,
	  timer: 1500
	})

	/*document.getElementById("btgetData").addEventListener("click", function(){
		//getDataInforme01();
		console.log('Click button...')
	})*/
}

//Funcion elimina datos repetidos de un array
Array.prototype.unique=function(a){
  return function(){return this.filter(a)}}(function(a,b,c){return c.indexOf(a,b+1)<0
});

/*
Consulta informacion al controlador
a traves de metodo AJAX
para la grafica 01
*/
function getDataInforme01(){
	console.log('getDataInforme01')
	dateDesde = document.getElementById('date_desde').value
	dateHasta = document.getElementById('date_hasta').value

	data = {
		dateDesde,
		dateHasta
	}
		
	$.ajax({
		url: 'http://localhost:8080/ventas/index.php/Ebitda/informe01',
		beforeSend: function(){
			document.getElementById('loading').style.display = 'block';
		},
		data: data,
		type: 'POST',
		success: function(resp) {
			let arrayJson = JSON.parse(resp);
			let data = arrayJson.data
			let fechaDcto = []
			let sumPeso = []
			//console.log(JSON.parse(resp))
			//console.log(data);			
			
			data.forEach(function(element){
			  categories.push(element.FECHA_DCTO)
			  serie1.push(Math.round((parseInt(element.SUMPESO))))
			})
			grafica01()
		},
		complete: function(xhr,status){
			getDataInforme02()
			document.getElementById('loading').style.display = 'none';
		},
		error: function() {
	    console.log("No se ha podido obtener la información");
	  }
	});
}

function getDataInforme02(){
	console.log('getDataInforme02')
	serie1 = []
	serie2 = []
	serie3 = []
	serie4 = []
	categories = []
	$.ajax({
		url: 'http://localhost:8080/ventas/index.php/Ebitda/informe02',
		beforeSend: function(){

		},
		success: function(resp) {
			let arrayJson = JSON.parse(resp);
			let data = arrayJson.data
			console.log(JSON.parse(resp))
			//console.log(data);			
			let fecha01 = data[0].FECHA_DCTO
			//debugger
			let fecha02
			let a=0,b=0,c=0,d=0
			data.forEach(function(element){	
			  categories.push(element.FECHA_DCTO)
			  
			  fecha02 = element.FECHA_DCTO
			  if (fecha01!=fecha02) {					
					if (parseInt(a)==0)
						serie1.push(0)
					if (parseInt(b)==0)
						serie2.push(0)
					if (parseInt(c)==0)
						serie3.push(0)
					if (parseInt(d)==0)
						serie4.push(0)
					fecha01=element.FECHA_DCTO
					a=0,b=0,c=0,d=0
					console.log(a+b+c+d)
				}
			  switch(element.ZONA) {
		    case 'ANTIOQUIA':
		    		a=1
		        serie1.push(Math.round((parseInt(element.SUMPESO))))	        
		        totk_ant+=parseInt(element.SUMPESO)
		        totp_ant+=parseInt(element.TOT_VEN)
		        break;
		    case 'CENTRO':
		    		b=1
		        serie2.push(Math.round((parseInt(element.SUMPESO))))
		        totk_cen+=parseInt(element.SUMPESO)
		        totp_cen+=parseInt(element.TOT_VEN)		        
		        break;
		    case 'EJE CAFETERO':
		    		c=1
		        serie3.push(Math.round((parseInt(element.SUMPESO))))		        
		        totk_eje+=parseInt(element.SUMPESO)
		        totp_eje+=parseInt(element.TOT_VEN)
		        break;
		    case 'VALLE':
		    		d=1
		        serie4.push(Math.round((parseInt(element.SUMPESO))))		        
		        totk_val+=parseInt(element.SUMPESO)
		        totp_val+=parseInt(element.TOT_VEN)
		        break;
		    default:
		        break;
				}				
			})
			console.log(serie1)
			console.log(serie2)
			console.log(serie3)
			console.log(serie4)
			console.log(totk_ant)
			console.log(totp_ant)
			console.log(totk_cen)
			console.log(totp_cen)
			console.log(totk_eje)
			console.log(totp_eje)
			console.log(totk_val)
			console.log(totp_val)
			console.log(categories.unique())
			grafica02()			
			getDataInforme03()			
		},
		complete: function(xhr,status){

		},
		error: function() {
	    console.log("No se ha podido obtener la información");
	  }
	});
}

function getDataInforme03(){
	console.log('getDataInforme03')
	serie1 = []
	serie2 = []
	serie3 = []
	serie4 = []
	categories = []
	$.ajax({
		url: 'http://localhost:8080/ventas/index.php/Ebitda/informe03',
		beforeSend: function(){

		},
		success: function(resp) {
			let arrayJson = JSON.parse(resp);
			let data = arrayJson.data
			console.log(JSON.parse(resp))
			console.log(data);			
			let fecha01 = data[0].FECHA_DCTO
			
			data.forEach(function(element){				
			switch(element.ZONA){
					case 'EJE CAFETERO':
						zo_27_eje=element.KGXFAC
						break;
					case 'VALLE':
						zo_27_val=element.KGXFAC
						break;	
					case 'CENTRO':
						zo_27_cen=element.KGXFAC
						break;
					case 'ANTIOQUIA':
						zo_27_ant=element.KGXFAC
						break;	
				}				   
			})
			getDataInforme04()
		},
		complete: function(xhr,status){
						
		},
		error: function() {
	    console.log("No se ha podido obtener la información");
	  }
	});
}

function getDataInforme04(){
	console.log('getDataInforme04')
	serie1 = []
	serie2 = []
	serie3 = []
	serie4 = []
	categories = []
	$.ajax({
		url: 'http://localhost:8080/ventas/index.php/Ebitda/informe04',
		beforeSend: function(){

		},
		success: function(resp) {
			let arrayJson = JSON.parse(resp);
			let data = arrayJson.data
			console.log(JSON.parse(resp))
			//console.log(data);			
			let fecha01 = data[0].FECHA_DCTO
			
			data.forEach(function(element){				
			switch(element.ZONA){
					case 'EJE CAFETERO':
						totk_rm_eje=element.SUM_PESO_RM
						totp_rm_eje=element.TOT_VEN_RM
						break;
					case 'VALLE':
						totk_rm_val=element.SUM_PESO_RM
						totp_rm_val=element.TOT_VEN_RM
						break;	
					case 'CENTRO':
						totk_rm_cen=element.SUM_PESO_RM
						totp_rm_cen=element.TOT_VEN_RM
						break;
					case 'ANTIOQUIA':
						totk_rm_ant=element.SUM_PESO_RM
						totp_rm_ant=element.TOT_VEN_RM
						break;	
				}
			})
			tableGrafica02()
		},
		complete: function(xhr,status){
				
		},
		error: function() {
	    console.log("No se ha podido obtener la información");
	  }
	});
}

function alertSweet2(){
	swal({
	  position: 'top-center',
	  type: 'success',
	  title: 'Carga del sitio correctamente!!!',
	  showConfirmButton: false,
	  timer: 1500
	})
}

function grafica01(){
  var myChart = Highcharts.chart('grafica01', {
      chart: {
        type: 'area'
      },
      title: {
        text: 'Comustibles líquidos de Colombia SA ESP - Ventas en Kg - Consolidado'
      },
      xAxis: {
        categories: categories.unique()
      },
      yAxis: {
          title: {
          text: 'Fruit eaten'
      	}
      },
      series: [{
			  data: serie1,
			  name: 'Kg Vendido'
			}]
  });
}

function grafica02(){
  var myChart = Highcharts.chart('grafica02', {
	      chart: {
	        type: 'area'
		    },
		    title: {
		        text: 'Comustibles líquidos de Colombia SA ESP - Ventas en Kg - Zonas'
		    },
		    subtitle: {
		        text: ''
		    },
		    xAxis: {
		        categories: categories.unique(),
		        tickmarkPlacement: 'on',
		        title: {
		            enabled: false
		        }
		    },
		    yAxis: {
		        title: {
		            text: 'Kilos'
		        },
		        labels: {
		            formatter: function () {
		                return this.value / 1000;
		            }
		        }
		    },
		    tooltip: {
		        split: true,
		        valueSuffix: ' Kilos'
		    },
		    plotOptions: {
		        area: {
		            stacking: 'normal',
		            lineColor: '#666666',
		            lineWidth: 1,
		            marker: {
		                lineWidth: 1,
		                lineColor: '#666666'
		            }
		        }
		    },
		    series: [{
		        name: 'ANTIOQUIA',
		        data: serie1
		    }, {
		        name: 'CENTRO',
		        data: serie2
		    }, {
		        name: 'EJE CAFETERO',
		        data: serie3
		    }, {
		        name: 'VALLE',
		        data: serie4
		    }]
		  });
}

function tableGrafica02(){
	var gasPrice = new Intl.NumberFormat("CO",
												                        { style: "currency", currency: "COP",
												                          minimumFractionDigits: 2 } );
	let tab_ANTIOQUIA
	let tab_CENTRO
	let tab_eje_CAFETERO
	let tab_VALLE
	
	tab_ANTIOQUIA = `
		<tr>
      <td>Antioquia</td>
      <td>${gasPrice.format(totk_ant)}</td>
      <td>$${gasPrice.format(totp_ant)}</td>
      <td>$${gasPrice.format(totp_ant/totk_ant)}</td>
      <td>${zo_27_ant}</td>
      <td>$${gasPrice.format(totk_rm_ant)}</td>
      <td>$${gasPrice.format(totp_rm_ant)}</td>
    </tr>`

  tab_CENTRO = `
		<tr>
      <td>Centro</td>
      <td>${gasPrice.format(totk_cen)}</td>
      <td>$${gasPrice.format(totp_cen)}</td>
      <td>$${gasPrice.format(totp_cen/totk_cen)}</td>
      <td>${gasPrice.format(zo_27_cen)}</td>
      <td>$${gasPrice.format(totk_rm_cen)}</td>
      <td>$${gasPrice.format(totp_rm_cen)}</td>
    </tr>`

  tab_eje_CAFETERO = `
		<tr>
      <td>Eje Cafetero</td>
      <td>${gasPrice.format(totk_eje)}</td>
      <td>$${gasPrice.format(totp_eje)}</td>
      <td>$${gasPrice.format(totp_eje/totk_eje)}</td>
      <td>${gasPrice.format(zo_27_eje)}</td>
      <td>$${gasPrice.format(totk_rm_eje)}</td>
      <td>$${gasPrice.format(totp_rm_eje)}</td>
    </tr>`

  tab_VALLE = `
		<tr>
      <td>Valle</td>
      <td>${gasPrice.format(totk_val)}</td>
      <td>$${gasPrice.format(totp_val)}</td>
      <td>$${gasPrice.format(totp_val/totk_val)}</td>
      <td>${gasPrice.format(zo_27_val)}</td>
      <td>$${gasPrice.format(totk_rm_val)}</td>
      <td>$${gasPrice.format(totp_rm_val)}</td>
    </tr>`

    let tot_kilos=totk_val+totk_eje+totk_cen+totk_ant
    let tot_millones=totp_val+totp_eje+totp_cen+totp_ant
    let tot_zo_27=parseInt(zo_27_val)+parseInt(zo_27_eje)+parseInt(zo_27_cen)+parseInt(zo_27_ant)
    let totk_rm_kg=parseInt(totk_rm_val)+parseInt(totk_rm_eje)+parseInt(totk_rm_cen)+parseInt(totk_rm_ant)
    let totp_rm_kg=parseInt(totp_rm_val)+parseInt(totp_rm_eje)+parseInt(totp_rm_cen)+parseInt(totp_rm_ant)

  tab_TOTAL = `
		<tr>
      <td>TOTAL</td>      
      <td>${gasPrice.format(tot_kilos)}</td>
      <td>$${gasPrice.format(tot_millones)}</td>
      <td>$${gasPrice.format(tot_millones/tot_kilos)}</td>
      <td>${gasPrice.format(tot_zo_27)}</td>
      <td>${gasPrice.format(totk_rm_kg)}</td>
      <td>${gasPrice.format(totp_rm_kg)}</td>
    </tr>`



	let table = `<table class="table table-bordered table-hover table-responsive" id="promGrafica02">
    <thead>
      <tr>
        <th>Zona</th>
        <th>Kilos Fact.</th>
        <th>Millones</th>
        <th>Ingreso Promedio</th>
        <th>Bodega 027</th>     
        <th>Glp Remisión</th>     
        <th>Millones Rm</th>        
      </tr>
    </thead>
    <tbody>
    	${tab_ANTIOQUIA}
    	${tab_CENTRO}
    	${tab_eje_CAFETERO}
    	${tab_VALLE}
    	${tab_TOTAL}
    </tbody>
  </table>`

  document.getElementById("table").innerHTML = table;
}
