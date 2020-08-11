<?php 
    
    include 'Config.php';

    include 'lanches.class.php';


    $lanches = new Lanche($pdo);

    $lista = $lanches->totalizarPedido();
    $lista2 = $lanches->resumirPedido();

    $dados = [];
    $teste = [];    
    $valores = [2,4,1,8,12,6];
    $i = 1;

    
    foreach($valores as $item ){

    for($a = 0; $a < count($valores) - 1; $a++){
        
       
       

        if($valores[$a] > $valores[$a+1]){

            
            $aux = $valores[$a+1];
            $valores[$a+1] = $valores[$a];
            $valores[$a] = $aux;  

    }

        $i++;
        $aux = 0;
        
    }
}

    for($i = 0; $i < count($valores); $i++){

        echo $valores[$i].'<br>';

    }


    foreach ($lista as $item) {
        $dados[] = $item;
        $teste[] = $item;
        $nome[] = $item['nome'];
    }

     foreach ($lista2 as $item2) {
        $dados2[] = $item2;
    }

    $dados = json_encode($dados);
    $dados2 = json_encode($dados2);

    // echo $dados,'<br>';
    // echo '<br>';
    // echo $teste[0]['quant'].'<br/>';
    // echo $nome[0];

?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script>

var dados = <?php echo $dados ?>;

var dados_2 = <?php echo $dados2 ?>;

var dados2 = [{}];



// alert(dados2[1]['name']);

// alert(typeof dados[1]['quant']);


var data2 = [];
var valor = [];
var teste_data = [];



var teste = [{

    id: 'outros', 
    data: 
    teste_data

}]



teste.push({
    id: '28', 
    data: 
    teste_data
});



var y = 0;
var aux = 0;
var diferentes = 1;

while(y < dados.length){
   
    dados2.push({name: dados[y]['nome'] , y: parseInt(dados[y]['total']), drilldown: dados[y]['cliente']});
    
    teste_data.push([dados_2[y]['lanche'], parseInt(dados_2[y]['total'])]);

    for(var x = 0; x < teste.length; x++){

        if(dados2[y]['drilldown'] == teste[x]['id']){
                    aux = x;
                    x = 100;
        }

    }

    if(aux > 0){

    for(var i = 0; i < dados_2.length; i++){

        for(var u = 0; u < teste.length; u++){

            if(teste[aux]['data'][0][u] == dados_2[i]['lanche']){

            teste[aux]['data'][0][u+1] = teste[aux]['data'][0][u+1] + parseInt(dados_2[i]['total']);

            diferentes = 0;
           
            u = 100;
            i = 100;

            }else{
                diferentes = 1;
            }

        }

    }
    if(diferentes == 1){

        teste.push({
        id: dados_2[i]['cliente'],
        data:
            [teste_data[y]]

    }); 

    }else{
        teste.push({
        id: dados_2[y]['cliente'],
        data:
            [teste_data[y]]

    });
    }
    }
 

    y++;                     

}


alert(teste_data[1])


var x = 0;

while(x < dados2.length){

for(var i = 1; i < dados2.length - 1; i++){

if(dados2[i]['y'] > dados2[i+1]['y']){
    var aux = dados2[i]['y'];
    var aux2 = dados2[i]['name'];


    dados2[i]['y'] = dados2[i+1]['y'];
    dados2[i+1]['y'] = aux;

    dados2[i]['name'] = dados2[i+1]['name'];
    dados2[i+1]['name'] = aux2;


}



}

x++;

}





// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Basic drilldown'
    },
    xAxis: {
        type: 'category'
    },

    legend: {
        enabled: false
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true
            }
        }
    },
    series: [{
        name: 'Things',
        colorByPoint: true,
        data: dados2
    }],
    drilldown: {
        series: teste
}});

</script>