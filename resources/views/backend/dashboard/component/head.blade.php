 <base href="{{env('APP_URL')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Dashboard v.2</title>

    <link href="backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="backend/font-awesome/css/font-awesome.css" rel="stylesheet">
@if (isset($config['css']) && is_array($config['css']))
    @foreach ($config['css'] as $item )
    <link href="{{$item}}" rel="stylesheet">
    @endforeach
@endif
    <link href="backend/css/animate.css" rel="stylesheet">
    <link href="backend/css/style.css" rel="stylesheet">
    <link href="backend/css/customize.css" rel="stylesheet">
      <script src="backend/js/jquery-3.1.1.min.js"></script>
