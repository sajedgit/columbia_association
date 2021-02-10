<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Columbia PayPal Payment </title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style>

        .loader{
            width: 150px;
            height: 150px;
            margin: 40px auto;
            transform: rotate(-45deg);
            font-size: 0;
            line-height: 0;
            animation: rotate-loader 5s infinite;
            padding: 25px;
            border: 1px solid #cf303d;
        }
        .loader .loader-inner{
            position: relative;
            display: inline-block;
            width: 50%;
            height: 50%;
        }
        .loader .loading{
            position: absolute;
            background: #cf303d;
        }
        .loader .one{
            width: 100%;
            bottom: 0;
            height: 0;
            animation: loading-one 1s infinite;
        }
        .loader .two{
            width: 0;
            height: 100%;
            left: 0;
            animation: loading-two 1s infinite;
            animation-delay: 0.25s;
        }
        .loader .three{
            width: 0;
            height: 100%;
            right: 0;
            animation: loading-two 1s infinite;
            animation-delay: 0.75s;
        }
        .loader .four{
            width: 100%;
            top: 0;
            height: 0;
            animation: loading-one 1s infinite;
            animation-delay: 0.5s;
        }
        @keyframes loading-one {
            0% {
                height: 0;
                opacity: 1;
            }
            12.5% {
                height: 100%;
                opacity: 1;
            }
            50% {
                opacity: 1;
            }
            100% {
                height: 100%;
                opacity: 0;
            }
        }
        @keyframes loading-two {
            0% {
                width: 0;
                opacity: 1;
            }
            12.5% {
                width: 100%;
                opacity: 1;
            }
            50% {
                opacity: 1;
            }
            100% {
                width: 100%;
                opacity: 0;
            }
        }
        @keyframes rotate-loader {
            0% {
                transform: rotate(-45deg);
            }
            20% {
                transform: rotate(-45deg);
            }
            25% {
                transform: rotate(-135deg);
            }
            45% {
                transform: rotate(-135deg);
            }
            50% {
                transform: rotate(-225deg);
            }
            70% {
                transform: rotate(-225deg);
            }
            75% {
                transform: rotate(-315deg);
            }
            95% {
                transform: rotate(-315deg);
            }
            100% {
                transform: rotate(-405deg);
            }
        }

    </style>

</head>

<body>
<div class="container mt-5 text-center">




        <div class="row">
            <div class="col-md-12">
                <div class="loader">
                    <div class="loader-inner">
                        <div class="loading one"></div>
                    </div>
                    <div class="loader-inner">
                        <div class="loading two"></div>
                    </div>
                    <div class="loader-inner">
                        <div class="loading three"></div>
                    </div>
                    <div class="loader-inner">
                        <div class="loading four"></div>
                    </div>
                </div>
            </div>
        </div>



    <form class="form-horizontal" name="paymentForm" method="POST" id="payment-form" role="form" action="{{route('process_payment')}}" >
        {{ csrf_field() }}

        <div class="form-group">

            <input type="hidden" class="form-control" name="user_id" value="{{ $user_id }}" >
            <input type="hidden" class="form-control" name="item_id" value="{{ $item_id }}" >
            <input type="hidden" class="form-control" name="item_name" value="{{ $item_name }}" >
            <input type="hidden" class="form-control" name="item_description" value="{{ $item_description }}" >
            <input type="hidden" class="form-control" name="price" value="{{ $price }}" >
            <input type="hidden" class="form-control" name="quantity" value="{{ $quantity }}" >
            <input type="hidden" class="form-control" name="action" value="{{ $action }}" >
            <input type="hidden" class="form-control" name="details" value="{{ $details }}" >

        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
{{--                <button type="submit" class="btn btn-primary">  Pay With Paypal  </button>--}}
            </div>
        </div>
    </form>

</div>
</body>

<script>
    window.onload=function(){
        document.forms["paymentForm"].submit();
    }
</script>

</html>