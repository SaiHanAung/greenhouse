<!DOCTYPE html>
<html>

<head>
    <title>test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/spacing.css') }}" rel="stylesheet">
</head>

<body>
    <h3>Test SoftDelete()</h3>
    @foreach($test as $key => $value)
    <div class="row ml-5 mt-4">
        <div class="col">
            <p>{{ $value->title }}</p>
        </div>
        <div class="col">
            <p>{{ $value->price }}</p>
        </div>
        <div class="col">
            <form action="{{ route('test.sd', ['id' => $value->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-secondary btn-sm">X</button>
            </form>
        </div>
    </div>
    @endforeach
    @foreach($get_date_deleted as $key_date => $value_date)
            <a href="{{ route('test.sd.show', ['id' => $value_date->id]) }}" class="btn-secondary btn-sm">{{ $value_date->delete_date }}</a>
    @endforeach
    <div class="row">
        <div class="col">

        </div>
    </div>
</body>

</html>