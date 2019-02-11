<!DOCTYPE html>
<html>
<head>
	<title>Cotações - Melhor Teste</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<div class="card border card-default">
			<div class="card-header">
				<h4 class="card-title">Cotações de Frete</h4>
			</div>
			<div class="card-body">
				<table class="table table-hover table-stripped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>Empresa</th>
							<th>Prazo de entrega</th>
							<th>Valor</th>
						</tr>
					</thead>
					<tbody>
						@foreach($retorno as $r)
						<tr>
							<td>{{$r['id']}}</td>
							<td>{{$r['name']}}</td>
							<td><img src="{{$r['company']['picture']}}" alt="{{$r['company']['name']}}" class="img-responsive" style="max-width: 80px"></td>
							<td>{{$r['delivery_time']}} dias</td>
							<td>{{$r['currency']}} {{number_format($r['price'],2,',','.')}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<a href="./" class="btn btn-primary">Novo Cálculo</a>
			</div>
		</div>
	</div>
</body>
</html>