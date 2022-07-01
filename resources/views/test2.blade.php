<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>test2</title>	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/spacing.css') }}" rel="stylesheet">
<body>
    <h3>Show SoftDelete</h3>
@foreach($test_softDelete as $key => $value)
<div class="row ml-5">
    <div class="col">
        <span>{{ $value->title }}</span>
        <span>{{ $value->price }}</span>
        <span>{{ $value->deleted_at }}</span>
    </div>
</div>
@endforeach
</body>
</html>