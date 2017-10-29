@if(!$model->container)
	@include('graficos')
		<svg id="{{ $model->id }}" @include('charts::_partials.dimension.html')></svg>
	@include('charts::_partials.loader.container-bottom')
@endif
