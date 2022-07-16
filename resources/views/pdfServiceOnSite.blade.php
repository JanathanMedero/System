<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/png">
	<title>Pyscom - Orden de servicio en sitio: {{ $order->id }}</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<style type="text/css">

		th, td{
			border: 2px solid black;
		},
		th{
			background-color: #c1d5e0;
		}.text-format{
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
	<div>
		<div class="" style="width: 100vh;">
			<div style="width: 100%;">
				<div style="width: 20%; display: inline-block;">
					<img src="{{ asset('images/pyscom.png') }}" style="width: 100%;">
				</div>
				<div style="width: 79%; height: 80px; font-size: 24px; display: inline-block;" class="text-center">
					<p class="mt-2">PRODUCTOS, PROYECTOS Y SERVICIOS INFORMÁTICOS</p>
				</div>
			</div>

			<div class="title" style="width: 100%; text-align: center; margin-bottom: 2%;">
				<p class="mb-0 text-format" style="font-size: 32px; display: inline;"><u>Orden de servicio en sitio</u></p>
			</div>
		</div>

		<div style="width: 100%; margin-top: 30px;">

			<div style="width: 49%; display: inline-block;">
				<p class="text-format"><strong>Le atendio: </strong>{{ $order->employe->name }}</p>
			</div>

			<div style="width: 49%; display: inline-block; text-align: right;">
				<p class="text-format"><strong>Fecha de venta: </strong><u>{{ $order->created_at->format('d/m/Y'); }}</p>
			</div>

		</div>

		<div class="alert alert-info mt-2" style="padding: 8px 15px;" role="alert">
			<div style="width: 100%;">
				<div style="width: 50%; display: inline-block;">
					<p class="mb-0" style="font-size: 18px;"><strong>Datos del cliente</strong></p>
				</div>
				<div style="width: 49%; text-align: right; display: inline-block;">
					<p style="font-size: 18px; text-align: right;" class="mb-0">No. de orden: <strong>{{ $order->id }}</p>
				</div>
			</div>
		</div>

		<div style="width: 100%;" class="mb-2">
			<div style="width: 50%; display: inline-block;">
				<p class="text-format mb-0"><strong>NOMBRE: </strong><u>{{ $order->client->name }}</p>
			</div>
			@if($order->client->phone)
			<div style="width: 25%; display: inline-block;">
				<p class="text-format mb-0"><strong>TEL.: </strong><u>{{ $order->client->phone }}</p>
			</div>
			@endif
			@if($order->client->rfc)
			<div style="width: 20%; display: inline-block;">
				<p class="text-format mb-0"><strong>RFC: </strong><u>{{ $order->client->rfc }}</p>
			</div>
			@endif
		</div>

		<div style="width: 100%;">
			@if($order->client->number)
			<div style="width: 50%; display: inline-block;">
				<p class="text-format mb-0"><strong>DOMICILIO: </strong><u>{{ $order->client->street }} {{ $order->client->number }}</p>
			</div>
			@endif
			@if($order->client->suburb)
			<div style="width: 49%; display: inline-block;">
				<p class="text-format mb-0"><strong>COLONIA: </strong><u>{{ $order->client->suburb }}</p>
			</div>
			@endif
		</div>

		<div style="width: 100%;" class="mb-2">
			@if($order->client->postal_code)
			<div style="width: 100%; display: inline-block;">
				<p class="text-format mb-0"><strong>C.P.: </strong><u>{{ $order->client->postal_code }}</p>
			</div>
			@endif
		</div>

		<div class="alert alert-info my-4" style="width: 95%;" role="alert">
			<div class="mb-0" style="width: 100%;">
				<div style="width: 100%; margin-bottom: 0px;"><p class="mb-0 text-center" style="font-size: 18px;"><strong>Servicios</strong></p></div>
			</div>
		</div>

		<table style="width:100%; border: 1px solid black;">
			<tr class="text-center">
			    <th>Cant.</th>
			    <th>Nombre del servicio</th>
			    <th>Descripción</th>
			    <th>Precio NETO</th>
		  	</tr>
		  @foreach($order->services as $service)
		  	<tr class="text-center">
			    <td>{{ $service->quantity }}</td>
			    <td>{{ $service->name }}</td>
			    @if($service->description)
			    <td>{{ $service->description }}</td>
			    @else
			    <td>Sin descripción</td>
			    @endif
			    <td>$ {{ $service->net_price }}.00</td>
		  	</tr>
		  @endforeach
		</table>

		@if($order->observations)
		<div style="width: 100%;" class="mt-4">
			<div style="width: 100%; display: inline-block;">
				<p class="text-format"><strong>Observaciones: </strong>{{ $order->observations }}</p>
			</div>
		</div>
		@endif

		<div style="width: 100%;" class="mt-4">
			@if($order->advance)
			<div style="width: 25%; display:inline-block;">
				<p class="text-format"><strong>Anticipo: </strong>$ {{ $order->advance }}.00</p>
			</div>
			@endif
			<div style="width: 25%; display:inline-block;">
				<p class="text-format"><strong>Total NETO: </strong>$ {{ $total }}.00</p>
			</div>
			<div style="width: 40%; display:inline-block;">
				<p class="text-format" style="text-align: right;"><strong>TOTAL A PAGAR: </strong><u>${{ $subtotal }}.00</p>
			</div>
		</div>
		{{-- <div style="width: 100%; margin-top: 15px;">
			<div style="width: 15%; display: inline-block;">
				<img src="{{ asset('qrcodes/qrcode-'.$order->folio.'.svg') }}" style="width: 100%;">
			</div>
			<div style="width: 80%; display: inline-block; height: 106px; padding-left: 10px;">
				<p class="text-format">Puede consultar el estatus de su servicio en todo momento, solamente escaneé el siguiente código QR.</p>
			</div>
		</div> --}}
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
