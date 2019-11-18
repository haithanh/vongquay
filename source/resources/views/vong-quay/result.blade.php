<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Vòng Quay') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/vongquay/logo180.png') }}">
    <link rel="icon" href="{{ asset('img/vongquay/logo180.png') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
    <!-- Styles -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/result.css?v=1') }}<?php echo time(); ?>" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <table class="table table-dark table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Cửa hàng</th>
                            <th scope="col">Phần thưởng</th>
                            <th scope="col">Code</th>
                            <th scope="col">Tên</th>
                            <th scope="col">SĐT</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Ngày</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($oHistories)
                        @foreach ($oHistories as $oHistory)
                        <tr>
                            <td>{{$oHistory->id}}</td>
                            <td>@if($oHistory->store) {{$oHistory->store->name}} @endif</td>
                            <td>@if($oHistory->item) {{$oHistory->item->name}} @endif</td>
                            <td>@if($oHistory->code) {{$oHistory->code->code}} @endif</td>
                            <td>{{$oHistory->name}}</td>
                            <td>{{$oHistory->phone}}</td>
                            <td>{{$oHistory->address}}</td>
                            <td>{{$oHistory->created_at}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>
