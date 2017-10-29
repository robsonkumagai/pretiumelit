@if(!$model->container)
	@include('graficos')
	@include('charts::_partials.loader.container-top')
		<div id="{{ $model->id }}" style="@include('charts::_partials.dimension.css')" class="ct-chart ct-perfect-fourth"></div>
	@include('charts::_partials.loader.container-bottom')
@endif
