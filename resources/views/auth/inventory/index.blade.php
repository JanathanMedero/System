@extends('layouts.dashboard')

@section('title')
<title>Inventario - Pyscom</title>
@endsection

@section('content')
@livewire('show-inventory')
@endsection

@section('extra-js')
<script>
	document.getElementById("stock_matriz").defaultValue = 0;
</script>
@endsection
