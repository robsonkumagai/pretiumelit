@include('graficos')

<script type="text/javascript">
    var data = {
        labels: [
            @foreach($model->labels as $label)
                "{!! $label !!}",
            @endforeach
        ],
        series: [
            [
                @foreach($model->values as $value)
                    "{{ $value }}",
                @endforeach
            ],
        ]
    };

    var options = {
        showArea: true,
        @include('charts::_partials.dimension.js')
    };

    var {{ $model->id }} = new Chartist.Line('#{{ $model->id }}', data, options);
</script>
