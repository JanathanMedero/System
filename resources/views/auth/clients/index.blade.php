@extends('layouts.dashboard')

@section('extra-css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/sb-1.3.4/sp-2.0.2/datatables.min.css"/>
@endsection

@section('title')
<title>Tabla de clientes de Pyscom</title>
@endsection

@section('content')
@livewire('show-clients')
@endsection

@section('extra-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script type="text/javascript">
	$('.show_confirm').click(function(event) {
		var form =  $(this).closest("form");
		var name = $(this).data("name");
		event.preventDefault();
		swal({
			title: `Esta seguro que desea eliminar este empleado?`,
			text: "Esta acción no se puede revertir",
			icon: "warning",
			buttons: true,
			dangerMode: true,
			buttons: ["Cancelar", "Si, Borrar"],
		})
		.then((willDelete) => {
			if (willDelete) {
				form.submit();
			}
		});
	});
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/sb-1.3.4/sp-2.0.2/datatables.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.clients_table').DataTable({
			language:{
				search: "Buscar cliente",
				infoEmpty: "",
				infoFiltered:   "",
				zeroRecords:    "No se encontraron resultados",
				emptyTable:     "No hay clientes registrados",
				paginate: {
					previous:   "Anterior",
					next:       "Siguiente",
				},
				info: "",
				responsive: true
			}
		});
	})
</script>

@endsection