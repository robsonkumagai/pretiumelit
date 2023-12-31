@include('graficos')

<script type="text/javascript">
    var data = {
        labels: [
            @foreach($model->labels as $label)
                "{!! $label !!}",
            @endforeach
        ],
        series: [
            @foreach($model->datasets as $ds)
                [
                    @foreach($ds['values'] as $value)
                        "{{ $value }}",
                    @endforeach
                ],
            @endforeach
        ]
    };

    var options = { @include('charts::_partials.dimension.js') }

    var {{ $model->id }} = new Chartist.Line('#{{ $model->id }}', data, options);
</script>
