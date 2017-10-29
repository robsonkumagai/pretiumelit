@if(!$model->container)
	@include('graficos')
		<div>
			<canvas id="{{ $model->id }}" @include('charts::_partials.dimension.html')></canvas>
		</div>
	@include('charts::_partials.loader.container-bottom')
@endif
