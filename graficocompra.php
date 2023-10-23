<html>
  <head>
    <meta charset="uft-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Tipo de produto', 'Valor do produto'],
          <?php

          include 'conexao.php';
          $sql = "SELECT * FROM produto";
          $buscar = mysqli_query($conexao, $sql);

          while ($dados = mysqli_fetch_array($buscar)) {
            $tipo_produto = $dados['tipo_produto'];
            $valor_produto = $dados['valor_produto'];
        
          ?>
          ['<?php echo $tipo_produto?>', <?php echo $valor_produto ?>],
        <?php } ?>
        ]);

        var options = {
          title: 'compra',
          legend: {position: 'right'}
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
