<?php require_once "controller/pagination-controller.php"; ?>
<?php $page = (isset($_GET["page"])) ? $_GET["page"] : 1; ?>
<?php 
 
if(!empty($_POST))
{
$aKeyword = explode(" ", $_POST['midato']);	
Pagination::config($page, 7, "w_contribuyentes", "SELECT * FROM w_contribuyentes WHERE Apellidos like '%" . $aKeyword[0] . "%' OR Nombre like '%" . $aKeyword[0] . "%' OR ContribuyenteClave like '%" . $aKeyword[0]. "%'" , 10); 
}
else
{	

Pagination::config($page, 7, "w_contribuyentes", false, 10); 
}	
?>
<?php $data = Pagination::data(); ?>
<?php $active = ""; ?>
<?php if ($data["error"]): header("location: ./index.php"); endif;?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>Raul PDO con PHP</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="./css/bootstrap.min.css">

<!-- jQuery library -->
<script src="./js/jquery.min.js"></script>

<!-- Popper JS -->
<script src="./js/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="./js/bootstrap.min.js"></script>

<!-- Main funciones JavaScript -->
<script src="./js/main.js"></script>
    <script type="text/javascript" src="./js/jquery.tablesorter.min.js"></script>
  <link rel="stylesheet" href="./themes/blue/style.css" type="text/css" media="print, projection, screen" />
   
	
	<link rel='stylesheet' href='https://mottie.github.io/tablesorter/css/theme.default.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://mottie.github.io/tablesorter/css/theme.bootstrap.css'>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.30.3/js/jquery.tablesorter.min.js'></script>
	<script src='https://mottie.github.io/tablesorter/js/jquery.tablesorter.combined.js'></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">
<script>	
$(document).ready(function()
{
	
	  
	
        $("td").click(function () {    
	    //alert("Bien!!!, la ContribuyenteClave seleccionada es: " +  $(this).text());
	    //alert("Bien!!!, la ContribuyenteClave seleccionada es: " + $(this).val());
		//$("#nombre3").val($(this).text());
	
		
            var valores="";
			var ContribuyenteClave="";
			var i = 0;
			
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find("td").each(function(){
				i++;
				
				if( i == 1){
                 ContribuyenteClave=$(this).html();
				 $("#nombre3").val(ContribuyenteClave);
                }
                valores+=$(this).html()+"\n";
            });
		    //alert(ContribuyenteClave);
            //alert(valores);
			     //$(this).addClass("selected");
				
			$(this).parents("td").addClass("selected");
         });
		 
		   $("tr").click(function () {    
			$("tr").each(function(){
			$(this).removeClass('selected');

			});
 
			$(this).addClass("unselected");
			
			if ($(this).hasClass('selected')) {
				$(this).removeClass('selected');
				$(this).addClass('unselected');
			} 
			else if ($(this).hasClass('unselected')) {
				$(this).removeClass('unselected');
				$(this).addClass('selected');
				tr.addClass('selected');
				// $(this).parents('tr').addClass("selected");
				//$(this).attr("bgcolor","#dddddd");
		        //$("th").css({'color':'red','font-size':'1.3em','background':'yellow'});
	  
			//$(this).parent().addClass("unselected");
    }  
		
         });
       
});
$.extend( true, $.fn.dataTable.defaults, {
	
	
    "language": {
        "decimal": ",",
        "thousands": ".",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoPostFix": "",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "lengthMenu": "Mostrar _MENU_ registros",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "processing": "Procesando...",
        "search": "Buscar:",
        "searchPlaceholder": "Término de búsqueda",
        "zeroRecords": "No se encontraron resultados",
        "emptyTable": "Ningún dato disponible en esta tabla",
        "aria": {
            "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        //only works for built-in buttons, not for custom buttons
        "buttons": {
            "create": "Nuevo",
            "edit": "Cambiar",
            "remove": "Borrar",
            "copy": "Copiar",
            "csv": "fichero CSV",
            "excel": "tabla Excel",
            "pdf": "documento PDF",
            "print": "Imprimir",
            "colvis": "Visibilidad columnas",
            "collection": "Colección",
            "upload": "Seleccione fichero...."
        },
        "select": {
            "rows": {
                _: '%d filas seleccionadas',
                0: 'clic fila para seleccionar',
                1: 'una fila seleccionada'
            }
        }
    }
	
} );        
</script>
<style type="text/css">


.selected {
font-size:'1.3em';	
font-weight:bold;
color:red;
#background-color: blue;
}
.unselected {
	
color:#FFF;
background: #999;
}
.tr_hover {background-color: #ffccee}
</style>

<script src="https://unpkg.com/xlsx@latest/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saverjs@latest/FileSaver.min.js"></script>
    <script src="https://unpkg.com/tableexport@latest/dist/js/tableexport.min.js"></script>
</head>
<body>
<button id="btnExportar">Exportar</button>
        <br>
        <br>
<input class="search" type="search" data-column="all"> (Coincidir con cualquier columna)<br>
<input class="search" type="search" data-column="1"> (Nombre de pila; búsqueda difusa... intenta ser)<br>

<!-- targeted by the "filter_reset" option -->
<button type="button" class="reset">Restablecer búsqueda</button>

<div align="center" style="position: absolute; bottom: 0; width:1000px; height: 500px;background-repeat: no-repeat; left: 70px">
  <h3 class="title-table">Contribuyentes</h3>
  <table id="myTable" class="tablesorter">
    <thead>
      <tr class="table-primary">
        <th style="display:none;">ContribuyenteClave</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Dni</th>
		
      </tr>
    </thead>
    <tbody>
	
      <?php foreach (Pagination::show_rows("ContribuyenteClave") as $row): ?>
      <tr>
        <td style="display:none;" id="ContribuyenteClave"><?php echo $row["ContribuyenteClave"]; ?></td>
        <td><?php echo $row["Nombre"]; ?></td>
        <td><?php echo $row["Apellidos"]; ?></td>
        <td><?php echo $row["Dni"]; ?></td>
		<?php /*
        echo '<td style="border: hidden " align="right">
        <button class="btn btn-success btn-sm" onclick="verDetalle(' . $row["ContribuyenteClave"] . ');">ver Recibo</button>        
              </td>';
        echo '</tr>';;
		*/?>
      </tr>
      <?php endforeach; ?>
    </tbody>
	<input type="text" id="nombre3" name="nombre3" disabled >
  </table>
  <script src="js/script.js"></script>
<style>
.activa{background: blue; color:white}
.normal{background: white}
</style>  

 <td  align="right">
        <button class="btn btn-success btn-sm" onclick="verDetalle(document.getElementById('nombre3').value)">ver Recibo</button>        
              </td>
       </tr>'
		
  <nav aria-label="Page navigation example">
    <ul class="pagination">
	  <?php if ($data["actual-section"] != 1): ?> 		  			
      <li class="page-item"><a class="page-link" href="index.php?page=1">Inicio</a></li>
      <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $data['previous']; ?>">&laquo;</a></li>
	  <?php endif; ?>
      <?php for ($i = $data["section-start"]; $i <= $data["section-end"]; $i++): ?>
      <?php if ($i > $data["total-pages"]): break; endif; ?>
      <?php $active = ($i == $data["this-page"]) ? "active" : ""; ?>
      <li class="page-item <?php echo $active; ?>"> <a class="page-link" href="index.php?page=<?php echo $i; ?>"> <?php echo $i; ?> </a> </li>
      <?php endfor; ?>
      <?php if ($data["actual-section"] != $data["total-sections"]): ?>
      <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $data['next']; ?>">&raquo;</a></li>
      <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $data['total-pages']; ?>">Final</a></li>
      <?php endif; ?>
    </ul>
  
  </nav>
  <!-- Modal -->
<div id="detalleModal" name="detalleModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Contenido del modal -->
    <div class="modal-content">
      <div class="modal-header">
        Detalle del Contribuyente
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">

             <table class="table table-striped table-hover responsive" id="table-detalle">

          <thead>
		     <tr>
              <th><input type="text" id="nombre4" name="nombre4" disabled ></th>
			
           
		  		<th  align="right">
        <button class="btn btn-danger btn-sm borrar" onclick="removerDetalle(document.getElementById('nombre4').value)">borrar</button>        
              </th> 
			  <th  align="right">
	<button class="btn btn-warning btn-sm" onclick="editarDetalle(document.getElementById('nombre3').value)">Editar</button>		  </th>

 <th  align="right">
	<button class="btn btn-success btn-sm" onclick="agregarDetalle(document.getElementById('nombre3').value)">Agregar</button>		  </th>
				 </tr>  				 
            <tr>
              <th >ContribuyenteClave</th>
              <th>Ejercicio</th>
              <th>Tipo</th>
              <th>Numero</th>
			  <th>Importe Principal</th>
            </tr>
          </thead>
		 
        </table>
<div id="botones" class="btn-group btn-group-xs" 
                 role="group" arial-label="grupo">
            </div>
      </div>

      <div class="modal-footer">
        <div id="mensaje"></div> <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
 <script id="rendered-js" >
$(function () {
  $("#myTable").tablesorter({  widgets: [ 'zebra', 'resizable', 'stickyHeaders', 'filter' ],
    widgetOptions: {
      resizable: true,
      resizable_widths : [ '15%', '15%', '10px', ],
      resizable_targetLast : false,
      filter_cssFilter   : '',
      filter_childRows   : false,
	  filter_external : '.search',
	  filter_defaultFilter: { 1 : '~{query}' },
      filter_hideFilters : false,
      filter_searchDelay : 300,
      filter_startsWith  : false,
      filter_external : '.search',
      filter_columnFilters: true,
      filter_placeholder: { search : 'Search...' },
      filter_saveFilters : true,
      filter_reset: '.reset',
      } 
  
  
  
  });
  
  // make demo search buttons work
  $('button[data-column]').on('click', function(){
    var $this = $(this),
      totalColumns = $table[0].config.columns,
      col = $this.data('column'), // zero-based index or "all"
      filter = [];

    // text to add to filter
    filter[ col === 'all' ? totalColumns : col ] = $this.text();
    $table.trigger('search', [ filter ]);
    return false;
  });
  $.extend($.tablesorter.themes.bootstrap, {
    // table classes
    table: 'table table-bordered table-striped',
    caption: 'caption',
    // *** header class names ***
    // header classes
    header: 'bootstrap-header',
    sortNone: '',
    sortAsc: '',
    sortDesc: '',
    // applied when column is sorted
    active: '',
    // hover class
    hover: '',
    // *** icon class names ***
    // icon class added to the <i> in the header
    icons: '',
    // class name added to icon when column is not sorted
    iconSortNone: 'bootstrap-icon-unsorted',
    // class name added to icon when column has ascending sort
    iconSortAsc: 'icon-chevron-up glyphicon glyphicon-chevron-up sort-asc',
    // class name added to icon when column has descending sort
    iconSortDesc: 'icon-chevron-down glyphicon glyphicon-chevron-down',
    filterRow: '',
    footerRow: '',
    footerCells: '',
    // even row zebra striping
    even: '',
    // odd row zebra striping
    odd: '' });

});
//# sourceURL=pen.js
    </script>
	
</body>

</html>