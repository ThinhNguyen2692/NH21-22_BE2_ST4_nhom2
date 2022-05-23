<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>{{$data['title']}}</h2>
    <P>Đia chi giao hang: {{$data['address']}}</P>
    <?php $total = 0; $payment = 0;?>
    <table >
                  <tr>
                    <th class="goods-page-description">Name</th>
                    <th class="goods-page-quantity">Quantity</th>
                    <th class="goods-page-price">total</th>
                    <th class="goods-page-total" colspan="2">payment</th>
                  </tr>
                  @foreach($data['datas'] as $value)
                  <tr>
                    <th class="goods-page-description">{{$value->name}}</th>
                    <th class="goods-page-quantity">{{$value->quantity_bill}}</th>
                    <th class="goods-page-price">{{$value->total}}</th>
                    <th class="goods-page-total" colspan="2">{{$value->payment}}</th>
                    <?php $total += $value->total; $payment += $value->payment ?>
                  </tr>
                    @endforeach
                    <th class="goods-page-description"></th>
                    <th class="goods-page-quantity"></th>
                    <th class="goods-page-price">{{$total}}</th>
                    <th class="goods-page-total" colspan="2">{{$payment}}</th>

</table >
    
</body>
</html>