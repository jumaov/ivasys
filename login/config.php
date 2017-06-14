<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IVASYS- Configuraciones</title>
    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
	<!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
	
    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	    
	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
			responsive: true
        });
    });
    </script>
</head>

<body>

    <div id="wrapper">
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                      <h1 class="page-header">Configuraciones - <small>IVASYS</small></h1>
                </div>	
            </div>
            <!-- /.row -->
            <div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header"><button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h3 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-floppy-disk"></i> Configuraciones del Sistema</h3>
				</div>
            
				<!-- Modal Body -->
				<div class="modal-body">
                                    <form  autocomplete="off" class="form-horizontal" name="agregarform" action="../web/class/ClsConfiguraciones.php" method="post" role="form">
						
                                        <div class="form-group">
                                            <label  class="col-sm-2 control-label" for="input01">Base de Datos</label>
                                            <div class="col-sm-10">
                                            <input type="text" name="txtBDD" class="form-control" id="txtBDD" placeholder="nombre de BDD"/>
                                            </div>
					</div>
					<div class="form-group">
                                            <label  class="col-sm-2 control-label" for="input01">Puerto</label>
                                            <div class="col-sm-10">
                                            <input type="text" name="txtPort" class="form-control" id="txtPort" placeholder="Puerto de BDD" />
                                            </div>
					</div>
                                        <div class="form-group">
                                            <label  class="col-sm-2 control-label" for="input01">Host</label>
                                            <div class="col-sm-10">
                                            <input type="text" name="txtServer" class="form-control" id="txtServer" placeholder="Servidor de BDD" />
                                            </div>
					</div>
                                        <div class="form-group">
                                            <label  class="col-sm-2 control-label" for="input01">Entorno</label>
                                            <div class="col-sm-10">
                                                <select name="txtEntorno" class="form-control" id="txtEntorno" required>
                                                        <option value="Desarrollo">Desarrollo </option>
                                                        <option value="Produccion">Producción</option>
                                                </select>
                                            </div>
					</div>
                                        <div class="form-group">
                                            <label  class="col-sm-2 control-label" for="input01">Version</label>
                                            <div class="col-sm-10">
                                            <input type="text" name="txtVersion" class="form-control" id="txtVersion" placeholder="Version/Deploy" />
                                            </div>
					</div>
				</div>
				<!-- Modal Footer -->
				<div class="modal-footer">
					<button type="reset" onclick="location.reload();" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
					<button type="submit" name="agregar" class="btn btn-primary">Guardar</button>
					</form>
				</div>
			</div>
		</div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    
    
</html>