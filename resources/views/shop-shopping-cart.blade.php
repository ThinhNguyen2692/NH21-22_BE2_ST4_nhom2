@extends('layout')
@section('content')
<?php 
 $totalAllSale = 0;
 $totalAllCart = 0;
?>
    <div class="main">
      <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Shopping cart</h1>
            <div class="goods-page">
              <div class="goods-data clearfix">
                <div class="table-wrapper-responsive">
                <table summary="Shopping cart">
                  <tr>
                    <th class="goods-page-image">Image</th>
                    <th class="goods-page-description">Description</th>
                    <th class="goods-page-ref-no">sale</th>
                    <th class="goods-page-quantity">Quantity</th>
                    <th class="goods-page-price">Unit price</th>
                    <th class="goods-page-total" colspan="2">Total</th>
                  </tr>
                  @if(isset($getCart))
                  @foreach($getCart as $value)
                  <?php
                    if(isset(Auth::user()->id)){
                      $id = $value->id_product;
                      $name = $value->name;
                      $image = $value->image;
                      $sale_price = $value->sale_price;
                      $price = $value->price;
                      $quantity_cart = $value->quantity_cart;
                      $total_cart = $value->total_cart;
                    }else{
                      $id = $value['id'];
                      $name = $value['product_name'];
                      $image = $value['image'];
                      $sale_price = $value['sale_price'];
                      $price = $value['price'];
                      $quantity_cart = $value['quantity_cart'];
                      $total_cart = $value['total_cart'];
                    }
                    
                  ?>
                  <tr>
                    <td class="goods-page-image">
                      <a href="javascript:;"><img src="{{ asset('assets/pages/img/products/'. $image . '') }}" alt="Berry Lace Dress"></a>
                    </td>
                    <td class="goods-page-description">
                      <h3><a href="javascript:;">{{$name}}</a></h3>
                    </td>
                    <td class="goods-page-ref-no">
                    {{$sale_price}}%
                    </td>
                    <td class="goods-page-quantity">
                    <div >
                    <input style="text-align: center; width: 70px;" id="product-quantity" type="text" value="{{ $quantity_cart}}" readonly>
                   <div> <a class="btn btn-default" href="{{url('/shop-shopping-cart/'. $id)}}/{{$quantity_cart+1}}"> <i class="fa fa-angle-up"></i></a>
                    <a class="btn btn-default" href="{{url('/shop-shopping-cart/'. $id)}}/{{$quantity_cart-1}}"><i class="fa fa-angle-down"></i></a></div>
                    </div>
                    </td>
                    <td class="goods-page-price">
                      <strong>{{number_format($price)}}</strong>
                    </td>
                    <td class="goods-page-total">
                     
                      <strong>{{number_format($price * $quantity_cart)}}</strong>
                    </td>
                    <td class="del-goods-col">
                      <a class="del-goods" href="{{url('/shop-shopping-cart/delete/cart/'.$id)}}">&nbsp;</a>
                    </td>
                  </tr>
                  <?php $totalAllCart  += $price * $quantity_cart; 
                        $totalAllSale += $total_cart;
                      
                      ?>
               @endforeach
              
                </table>
                </div>

                <div class="shopping-total">
                  <ul>
                    <li>
                      <em>Sub total</em>
                      <strong class="price">{{number_format($totalAllCart)}}</strong>
                    </li>
                    <li>
                      <em>Sale</em>
                      <strong class="price"><span></span>{{number_format($totalAllCart - $totalAllSale)}}</strong>
                    </li>
                    <li class="shopping-total-price">
                      <em>Total</em>
                      <strong class="price">{{number_format($totalAllSale)}}</strong>
                    </li>
                  </ul>
                </div>
              </div>
              @endif
              <form action="{{url('/shop-shopping-cart/bill')}}" method="post">
              @csrf
              <div class="form-group">
                <label for="inputProjectLeader">address</label>
                <input type="text" id="inputProjectLeader" class="form-control" required name="address">
               </div>
             @if(isset(Auth::user()->id))
             <div class="form-group">
                <label for="inputProjectLeader">email</label>
                <input type="text" id="inputProjectLeader" class="form-control" required value="{{Auth::user()->email}}" name="email">
              </div>
             @endif
             @if(!isset(Auth::user()->id))
             <div class="form-group">
                <label for="inputProjectLeader">email</label>
                <input type="text" id="inputProjectLeader" class="form-control" required name="email">
              </div>
             @endif
             <button class="btn btn-primary" type="submit">Checkout <i class="fa fa-check"></i></button>
            
              </form>
              <button class="btn btn-default" type="submit"> <a href="{{url('/')}}">Continue shopping</a> <i class="fa fa-shopping-cart"></i></button>
              
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN SIMILAR PRODUCTS -->
      
        <!-- END SIMILAR PRODUCTS -->
      </div>
    </div>

    @endsection