<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    @include('layouts.style')
    <title>INVOICE | {{ $order->order_no }}</title>
    @php
        $setting = \App\Models\Setting::first();
    @endphp
</head>

<body class="bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 p-0">
                <img class="w-100" src="{{ asset('assets/media/logos/' . $setting->logo) }}" alt="">
            </div>
            <div class="col-8 p-0">
                <h1 class="text-center mt-10 fs-1 fw-bolder">{{ $setting->name }}</h1>
                <h4 class="border-bottom border-3 border-dark text-center">{{ $setting->address }}</h4>
                <div class="row">

                    <div class="text-center col-4">
                        <strong>{{ $setting->url }}</strong>
                    </div>
                    <div class="text-center col-4">
                        <strong>{{ $setting->email }}</strong>
                    </div>
                    <div class="text-center col-4">
                        <strong>{{ $setting->contact }}</strong>
                    </div>
                </div>
            </div>
            <div class="col-2 p-0">
                <div>
                    <center>
                        @php
                            $url = Request::url();
                        @endphp
                        {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(90)->format('svg')->generate($url) !!}
                    </center>
                    <h4 class="text-center mt-5">{{ $order->order_no }}</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table border-bottom border-1 border-dark" style="min-height: 500px !important">
                    <thead>
                        <tr>
                            <th class="p-2 mt-15" colspan="5">
                                <h3 class="">INVOICE <span class="float-end">
                                        @php
                                            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                        @endphp
                                        {!! $generator->getBarcode($order->order_no, $generator::TYPE_CODE_128) !!}
                                    </span>
                                </h3>
                            </th>
                        </tr>
                        <tr>
                            <th class="p-2 border-dark border border-1 fw-bold">SR#</th>
                            <th class="p-2 border-dark border border-1 fw-bold">Product</th>
                            <th class="p-2 border-dark border border-1 fw-bold">Quantity</th>
                            <th class="p-2 border-dark border border-1 fw-bold">Unit Price</th>
                            <th class="p-2 border-dark border border-1 fw-bold">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($order->orderProducts as $orderProduct)
                            <tr>
                                <td class="p-2 border-dark border border-1">{{ $loop->iteration }}</td>
                                <td class="p-2 border-dark border border-1">{{ $orderProduct->product->name }}</td>
                                <td class="p-2 border-dark border border-1 text-end">{{ $orderProduct->quantity }}</td>
                                <td class="p-2 border-dark border border-1 text-end">{{ $orderProduct->price }}</td>
                                <td class="p-2 border-dark border border-1 text-end">
                                    {{ $orderProduct->price * $orderProduct->quantity }}</td>
                                @php
                                    $total += $orderProduct->price * $orderProduct->quantity;
                                @endphp
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="p-2 border-dark border border-1 fw-bold" colspan="4">Total</th>
                            <th class="p-2 border-dark border border-1 text-end fw-bold">{{ $total }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
