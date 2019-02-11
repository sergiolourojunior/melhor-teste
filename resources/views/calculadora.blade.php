<!DOCTYPE html>
<html>
<head>
	<title>Calculadora de Frete - Melhor Teste</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<div class="card border card-default">
			<div class="card-header">
				<h4 class="card-title">Calculadora de Frete</h4>
			</div>
			<div class="card-body">
				<form action="./" method="post">
					<div class="row justify-content-md-center">
						<div class="col-md-4">
							<div class="form-group">
								<label>Cep Origem</label>
								<input type="text" name="postal_code_from" class="form-control {{$errors->has('postal_code_from') ? 'is-invalid' : ''}}">
								@if($errors->has('postal_code_from'))
								<div class="invalid-feedback">{{$errors->first('postal_code_from')}}</div>
								@endif
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Cep Destino</label>
								<input type="text" name="postal_code_to" class="form-control {{$errors->has('postal_code_to') ? 'is-invalid' : ''}}">
								@if($errors->has('postal_code_to'))
								<div class="invalid-feedback">{{$errors->first('postal_code_to')}}</div>
								@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Altura (cm)</label>
								<input type="text" name="height" placeholder="" class="form-control {{$errors->has('height') ? 'is-invalid' : ''}}">
								@if($errors->has('height'))
								<div class="invalid-feedback">{{$errors->first('height')}}</div>
								@endif
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Largura (cm)</label>
								<input type="text" name="width" placeholder="" class="form-control {{$errors->has('width') ? 'is-invalid' : ''}}">
								@if($errors->has('width'))
								<div class="invalid-feedback">{{$errors->first('width')}}</div>
								@endif
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Comprimento (cm)</label>
								<input type="text" name="length" placeholder="" class="form-control {{$errors->has('length') ? 'is-invalid' : ''}}">
								@if($errors->has('length'))
								<div class="invalid-feedback">{{$errors->first('length')}}</div>
								@endif
							</div>
						</div>
					</div>
					<div class="row justify-content-md-center">
						<div class="col-md-4">
							<div class="form-group">
								<label>Peso (kg)</label>
								<input type="text" name="weight" class="form-control {{$errors->has('weight') ? 'is-invalid' : ''}}">
								@if($errors->has('weight'))
								<div class="invalid-feedback">{{$errors->first('weight')}}</div>
								@endif
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Valor Segurado (R$)</label>
								<input type="text" name="insurance_value" class="form-control {{$errors->has('insurance_value') ? 'is-invalid' : ''}}">
								@if($errors->has('insurance_value'))
								<div class="invalid-feedback">{{$errors->first('insurance_value')}}</div>
								@endif
							</div>
						</div>
					</div>
					<div class="row justify-content-md-center text-center">
						<div class="col-md-4">
							<div class="form-group">
								<label>
									<input type="checkbox" name="receipt" value="1"> Aviso de recebimento (AR)
								</label>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>
									<input type="checkbox" name="own_hand" value="1"> Entrega em mãos
								</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md">
							<button class="btn btn-primary text-uppercase float-right">Calcular</button>
						</div>
					</div>
					@csrf
				</form>
			</div>
		</div>
	</div>
</body>
</html>