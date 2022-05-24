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
            <h1>History</h1>
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
                    <th class="goods-page-total" colspan="2">Payment</th>
                  </tr>
                  @if(isset($getBill))
                  @foreach($getBill as $value)
                  <?php
                    if(isset(Auth::user()->id)){
                      $id = $value->id_product;
                      $name = $value->name;
                      $image = $value->image;
                      $sale_price = $value->sale_price;
                      $price = $value->price;
                      $quantity_bill = $value->quantity_bill;
                      $total_bill = $value->total_bill;
                      $payment = $value->payment_bill;
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
                    <input style="text-align: center; width: 70px;" id="product-quantity" type="text" value="{{ $quantity_bill}}" readonly>
                    </td>
                    <td class="goods-page-price">
                      <strong>{{number_format($price)}}</strong>
                    </td>
                    <td class="goods-page-total">
                     
                      <strong>{{number_format($payment)}}</strong>
                    </td>
                   
                  </tr>
                  <?php $totalAllCart  += $price * $quantity_bill; 
                        $totalAllSale += $payment;
                        
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