@if(!$model->container)
	@include('graficos')
		<div>
			<canvas id="{{ $model->id }}"></canvas>
		</div>
	@include('charts::_partials.loader.container-bottom')
@endif
