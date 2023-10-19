<html>
  <head>
    <title>Ordenar listas con jQuery</title>
  <script type="text/javascript" src="./js/jquery-latest.js"></script> 
    <script type="text/javascript" src="./js/jquery.tablesorter.min.js"></script>
  <link rel="stylesheet" href="./themes/blue/style.css" type="text/css" media="print, projection, screen" />
    <script type="text/javascript">
     $(function(){
      //Cuando la página se cargue convertimos la tabla con id "myTable" en una tabla ordenable
      $("#myTable").tablesorter();
    });
    </script>
    <style>
      body{font-family:Arial;}
    </style>  
  </head>
  <body>
    <table id="myTable" class="tablesorter">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Email</th>
          <th>Compra total</th>
          <th>Web</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Smith</td>
          <td>John</td>
          <td>jsmith@gmail.com</td>
          <td>$50.00</td>
          <td>http://www.jsmith.com</td>
        </tr>
        <tr>
          <td>Bach</td>
          <td>Frank</td>
          <td>fbach@yahoo.com</td>
          <td>$50.00</td>
          <td>http://www.frank.com</td>
        </tr>
        <tr>
          <td>Doe</td>
          <td>Jason</td>
          <td>jdoe@hotmail.com</td>
          <td>$100.00</td>
          <td>http://www.jdoe.com</td>
        </tr>
        <tr>
          <td>Conway</td>
          <td>Tim</td>
          <td>tconway@earthlink.net</td>
          <td>$50.00</td>
          <td>http://www.timconway.com</td>
        </tr>
      </tbody>
    </table>
  </body>
</html>