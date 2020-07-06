<html>
<head>
    <title>{{$tdk['t']}}</title>
    <meta name="keyword" content="{{$tdk['k']}}" />
    <meta name="description" content="{{$tdk['d']}}" />
    @php echo css(['layui/css/layui.css','css/global.css']);@endphp
</head>
<body>
@include('layout.header')

@php echo $content;@endphp

@include('layout.footer')

@php
    echo js(['js/jquery-2.2.0.min.js','layui/layui.js']);
    echo $insert2footer;
@endphp
</body>
</html>