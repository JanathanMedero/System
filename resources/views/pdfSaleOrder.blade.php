<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/png">
	<title>Pyscom - Orden de venta: {{ $order->id }}</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<style type="text/css">

		th, td{
			border: 2px solid black;
		},
		th{
			background-color: #c1d5e0;
		},
		.text-format{
			font-size: 18px;
		},
		footer{
			border-top: 5px solid black;
			padding-top: 10px;
			position: absolute;
			bottom: 0;
			width: 100%;
			height: 80px;
			overflow: hidden;
		}

	</style>



</head>
<body>

		<div class="" style="width: 100vh;">
			<div style="width: 100%;">
				<div style="width: 20%; display: inline-block;">
					<img src="{{ asset('images/logo.png') }}" style="width: 100%;">
				</div>
				<div style="width: 79%; height: 80px; font-size: 24px; display: inline-block;" class="text-center">
					<p class="mt-2">PRODUCTOS, PROYECTOS Y SERVICIOS INFORMÁTICOS</p>
				</div>
			</div>

			<div class="title" style="width: 100%; text-align: center; margin-bottom: 2%;">
				<p class="mb-0" style="font-size: 32px; display: inline;"><u>Orden de venta</u></p>
			</div>
		</div>

		<div style="width: 100%;">
			<div style="width: 50%; display: inline-block;">
				<p class="text-format mb-0"><strong>Le atendió: </strong><u>{{ $order->employe->name }}</p>
			</div>
			<div style="width: 49%; display: inline-block; text-align: right;">
				<p class="mb-0 text-format"><strong>Fecha de venta:</strong> <u>{{ date('Y-m-d', strtotime($order->created_at)) }}</u></p>
			</div>
		</div>

		<div style="width: 100%;">
			<div style="width: 50%; display: inline-block;">
			</div>
			<div style="width: 49%; display: inline-block; text-align: right;">
				<p class="mb-0 mt-2 text-format"><strong>No de factura:</strong>_________________________</p>
			</div>
		</div>

		<div class="alert alert-info mt-2" style="padding: 8px 15px;" role="alert">
			<div style="width: 100%;">
				<div style="width: 50%; display: inline-block;">
					<p class="mb-0" style="font-size: 18px;"><strong>Datos del cliente</strong></p>
				</div>
				<div style="width: 49%; text-align: right; display: inline-block;">
					<p style="font-size: 18px; text-align: right;" class="mb-0">No. de venta: <strong>{{ $order->id }}</p>
				</div>
			</div>
		</div>

		<div style="width: 100%;" class="mb-2">
			<div style="width: 50%; display: inline-block;">
				<p class="text-format mb-0"><strong>NOMBRE: </strong><u>{{ $order->client->name }}</u></p>
			</div>
			<div style="width: 25%; display: inline-block;">
				<p class="text-format mb-0"><strong>TEL.: </strong><u>{{ $order->client->phone }}</u></p>
			</div>
			@if($order->client->rfc)
			<div style="width: 20%; display: inline-block;">
				<p class="text-format mb-0"><strong>RFC: </strong><u>{{ $order->client->rfc }}</u></p>
			</div>
			@else
			<div style="width: 20%; display: inline-block;">
				<p class="text-format mb-0"><strong>RFC: </strong><u>Sin registrar</u></p>
			</div>
			@endif
		</div>

		<div style="width: 100%;" class="mb-2">
			@if($order->client->street)
			<div style="width: 50%; display: inline-block;">
				<p class="text-format mb-0"><strong>DOMICILIO: </strong><u>{{ $order->client->street }} {{ $order->client->number }}</u></p>
			</div>
			@else
			<div style="width: 50%; display: inline-block;">
				<p class="text-format mb-0"><strong>DOMICILIO: </strong><u>Sin registrar</p>
			</div>
			@endif
			@if($order->client->suburb)
			<div style="width: 49%; display: inline-block;">
				<p class="text-format mb-0"><strong>COLONIA: </strong><u>{{ $order->client->suburb }}</p>
			</div>
			@else
			<div style="width: 49%; display: inline-block;">
				<p class="text-format mb-0"><strong>COLONIA: </strong><u>Sin registrar</u></p>
			</div>
			@endif
		</div>

		<div style="width: 100%;">
			@if($order->client->cp)
			<div style="width: 20%; display: inline-block;">
				<p class="text-format mb-0"><strong>C.P.: </strong><u>{{ $order->client->cp }}</p>
			</div>
			@else
			<div style="width: 20%; display: inline-block;">
				<p class="text-format mb-0"><strong>C.P.: </strong><u>Sin registrar</p>
			</div>
			@endif
			@if($order->advance)
			<div style="width: 25%; display: inline-block;">
				<p class="text-format mb-0"><strong>Anticipo: </strong><u>${{ $order->advance }}.00</p>
			</div>
			@else
			<div style="width: 25%; display: inline-block;">
				<p class="text-format mb-0"><strong>Anticipo: </strong><u>N/A</p>
			</div>
			@endif
			<div style="width: 35%; display: inline-block;">
				<p class="text-format mb-0"><strong>Tipo de pago: </strong><u>{{ $order->pay }}</p>
			</div>
		</div>

		{{-- <div style="width: 100%">
			<div style="width: 49%;" class="mb-2">
			@if($order->client->cp)
			<div style="width: 100%; display: inline-block;">
				<p class="text-format mb-0"><strong>C.P.: </strong><u>{{ $order->client->cp }}</p>
			</div>
			@else
			<div style="width: 100%; display: inline-block;">
				<p class="text-format mb-0"><strong>C.P.: </strong><u>Sin registrar</p>
			</div>
			@endif
		</div>
		<div style="width: 49%;" class="mb-2">
			@if($order->advance)
			<div style="width: 100%; display: inline-block;">
				<p class="text-format mb-0"><strong>Anticipo: </strong><u>${{ $order->advance }}.00</p>
			</div>
			@else
			<div style="width: 100%; display: inline-block;">
				<p class="text-format mb-0"><strong>Anticipo: </strong><u>N/A</p>
			</div>
			@endif
		</div>
		</div> --}}


		<table style="width:100%; border: 1px solid black;" class="my-4">
			<tr class="text-center">
				<th>Cant.</th>
				<th>Nombre del producto</th>
				<th>Garantía</th>
				<th>Descripción</th>
				<th>Observaciones</th>
				<th>Precio Unitario</th>
				<th>Precio NETO</th>
			</tr>
		  @foreach($order->products as $product)
			<tr class="text-center">
				<td>{{ $product->quantity }}</td>
				<td>{{ $product->name }}</td>
				@if($product->warranty)
					<td>{{ $product->warranty }}</td>
				@else
					<td><p class="mb-0">Sin garantía</p></td>
				@endif
				<td>{{ $product->description }}</td>
				@if($product->observations)
				<td>{{ $product->observations }}</td>
				@else
				<td><u>Sin observaciones</u></td>
				@endif
				<td>${{ $product->unit_price }}.00</td>
				<td>${{ $product->net_price }}.00</td>
			</tr>
		  @endforeach
		</table>

		<div style="width: 100%">
			<div style="width: 100%; display: inline-block; text-align: right;">
				<p class="text-format mb-0"><strong>TOTAL A PAGAR: </strong><u>${{ $subtotal }}.00</p>
			</div>
		</div>

		<div style="width: 100%">
			<div style="width: 100%; display: inline-block; text-align: right;">
				<p class="text-format mb-0"><strong>VENTA TOTAL: </strong><u>${{ $total }}.00</p>
			</div>
		</div>

		<footer style="padding-top: 15px;">

			<div style="width: 50%; display: inline-block;">
				<div class="title" style="width: 100%;">
					<p class="mb-0 text-center"><strong>MATRIZ</strong>:</p>
				</div>
				<div class="street" style="width: 100%;">
					<p class="mb-0 text-center" style="font-size: 12px;">
						NARAXAN 359, FELIX IRETA CP.58070
					</p>
				</div>
				<div class="phone" style="width: 100%;">
					<p class="mb-0 text-center" style="font-size: 12px;">
						<strong>TEL: </strong>(443) 315-19-88, <strong>RFC: </strong>AAVA800421DE1
					</p>
				</div>
				<div class="email" style="width: 100%;">
					<p class="mb-0 text-center" style="font-size: 12px;">
						<strong>E-mail: </strong>pyscom1@hotmail.com, administracion@pyscom.com
					</p>
				</div>
			</div>

			<div style="width: 49%; display: inline-block;">
				<div class="title" style="width: 100%;">
					<p class="mb-0 text-center"><strong>SUCURSAL VIRREY</strong>:</p>
				</div>
				<div class="street" style="width: 100%;">
					<p class="mb-0 text-center" style="font-size: 12px;">
						VIRREY DE MENDOZA # 1415-A, FELIX IRETA CP. 58070
					</p>
				</div>
				<div class="phone" style="width: 100%;">
					<p class="mb-0 text-center" style="font-size: 12px;">
						<strong>TEL: </strong>(443) 275-43-21, <strong>RFC: </strong>AAVA800421DE1
					</p>
				</div>
				<div class="email" style="width: 100%;">
					<p class="mb-0 text-center" style="font-size: 12px;">
						<strong>E-mail: </strong>ventasvirrey@pyscom.com, adminvirrey@pyscom.com
					</p>
				</div>
			</div>
		</footer>

</body>
</html>
