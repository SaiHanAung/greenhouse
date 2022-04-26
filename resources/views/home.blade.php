@extends('layouts.app')

@section('content')
<?php print_r($_GET);?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: #90ee90; font-weight: bold;">{{ __('Dashboard') }}</div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <div class="row mt-5">
                    <div class="col-md-12">
                        <h2>Table</h2>
                        <a href="{{ route('dashboard.create') }}" class="btn btn-success my-3">Create new post</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered box-shadow mt-2">
                        <thead>
                            <tr style="background-color: #cfd9db;" align="center">
                                <th scope="col">#</th>
                                <th scope="col">Timestamp</th>
                                <th scope="col">Deviceid</th>
                                <th scope="col">Humid</th>
                                <th scope="col">Temp</th>
                                <th scope="col">Port 1</th>
                                <th scope="col">Port 2</th>
                                <th scope="col">Port 3</th>
                                <th scope="col">Port 4</th>
                                <th scope="col">Port 5</th>
                                <th scope="col">Port 6</th>
                                <th scope="col">Port 7</th>
                                <th scope="col">Port 8</th>
                                <th scope="col">Save</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $key => $value)
                            <tr>
                                <form method="POST" action="{{ route('dashboard.destroy', $value->id) }}">
                                    <th scope="row">
                                        <center>{{ ++$i }}</center>
                                    </th>
                                    <td>
                                        <center>{{ $value->created_at }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $value->device_id }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $value->humid }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $value->temp }}</center>
                                    </td>
                                    <td>
                                        <center>
                                            <label class="switch">
                                                <input type="checkbox" name="checkbox"><span class="slider round">{{ $value->port_1 }}</span>
                                            </label>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <label class="switch">
                                                <input type="checkbox" name="checkbox"><span class="slider round">{{ $value->port_2 }}</span>
                                            </label>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <label class="switch">
                                                <input type="checkbox" name="checkbox"><span class="slider round">{{ $value->port_3 }}</span>
                                            </label>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <label class="switch">
                                                <input type="checkbox" name="checkbox"><span class="slider round">{{ $value->port_4 }}</span>
                                            </label>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <label class="switch">
                                                <input type="checkbox" name="checkbox"><span class="slider round">{{ $value->port_5 }}</span>
                                            </label>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <label class="switch">
                                                <input type="checkbox" name="checkbox"><span class="slider round">{{ $value->port_6 }}</span>
                                            </label>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <label class="switch">
                                                <input type="checkbox" name="checkbox"><span class="slider round">{{ $value->port_7 }}</span>
                                            </label>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <label class="switch">
                                                <input type="checkbox" name="checkbox"><span class="slider round">{{ $value->port_8 }}</span>
                                            </label>
                                        </center>
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.edit', $value->id) }}" class="btn btn-secondary">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
