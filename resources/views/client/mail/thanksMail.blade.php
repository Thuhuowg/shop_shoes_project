<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="background-image">
        <div class="container">
            @if (session()->has("order$transaction_id"))
                <p>Xác nhận đơn hàng thành công</p>
            @else
                <p>Xác nhận đơn hàng thất bại</p>
            @endif
        </div>
    </div>
</body>

</html>
<style>
    * {
        margin: 0px;
        padding: 0px;
    }

    .background-image {
        background-image: url('https://cdn.pixabay.com/photo/2016/11/29/03/26/pair-1867051_1280.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        width: auto;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 50px;
        background: grey;
        font-family: sans-serif;
    }
</style>
