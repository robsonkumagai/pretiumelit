@if(!$model->container)

	@include('graficos')
		<div id="{{ $model->id }}" style="@include('charts::_partials.dimension.css')"></div>
	@include('charts::_partials.loader.container-bottom')
@endif
