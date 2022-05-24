@extends('layout')
@section('content')

<div class="main">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="http://127.0.0.1:8000">Home</a></li>
      <li><a href="">Store</a></li>
      <li class="active">Cool green dress with red bell</li>
    </ul>
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar col-md-3 col-sm-5">
       

        <div class="sidebar-products clearfix">
         
          <h2 style="color: red;">___Sale Product</h2>
          @foreach($productSale as $value)
          <div class="item">
            <a href="/shop-item"><img src="{{ asset('assets/pages/img/products/'. $value->image . '') }}" alt="Some Shoes in Animal with Cut Out"></a>
            <h3><a href="/shop-item">{{$value->name}}</a></h3>
            <div class="price">{{$value->price}}</div>
            <div class="sticker sticker-sale"></div>
          </div>
          @endforeach
        <h2 style="color: red;">Related Products</h2>
        @foreach($productType as $value)
          <div class="item">
            <a href="/shop-item"><img src="{{ asset('assets/pages/img/products/'. $value->image . '') }}" alt="Some Shoes in Animal with Cut Out"></a>
            <h3><a href="/shop-item">{{$value->name}}</a></h3>
            <div class="price">{{$value->price}}</div>
            <div class="sticker sticker-sale"></div>
          </div>
          @endforeach
        
      </div>
      
    </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN CONTENT -->
      <div class="col-md-9 col-sm-7">
        <div class="product-page">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="product-main-image">
                <?php
                 $product_name = 0; $id_product = 0;
                ?>
                @foreach($data as $row)
                <?php $product_name = $row->name; $id_product = $row->id;?>
                <img src="{{ asset('assets/pages/img/products/'. $row->image . '') }}" alt="Cool green dress with red bell" class="img-responsive" data-BigImgsrc="assets/pages/img/products/model7.jpg">
              </div>

            </div>

            <div class="col-md-6 col-sm-6">
              <h1>{{ $row->name}}</h1>
              <div class="price-availability-block clearfix">
                <div class="price">
                  <?php if ($row->sale_price != 0) {
                  ?>
                    <strong><span></span>{{number_format($row->price-($row->price * ($row->sale_price/100)))}} </strong>
                    <em><span>{{ number_format($row->price)}}</span></em>
                    <strong><span></span>({{-$row->sale_price}}%)</strong>
                  <?php } else {
                  ?>
                    <strong><span></span>{{number_format($row->price-($row->price * ($row->sale_price/100)))}} </strong>
                  <?php } ?>

                </div>
                <div class="availability">
                  Availability: <strong>In Stock</strong>
                </div>
              </div>
              <div class="description">
                <p>{{ $row->description}}</p>
              </div>

             
              <div class="product-page-cart">
              <?php if($row->status == 0) echo '<br> <h3 style="color: red;">Sản phẩm tạm ngưng kinh doanh</h3>' ; elseif($row->quantity == 0){?>
                <?php  echo '<br> <h3 style="color: red;">Sản phẩm tạm hết hàng</h3>';}  else{?><a href="{{url('/shop-shopping-cart/'. $row->id)}}/1" class="btn btn-default add2cart">Add to cart</a>
                <?php }?>
              </div>

            

              <div class="review">
                <input type="range" value="4" step="0.25" id="backing4">
                <div class="rateit" data-rateit-backingfld="#backing4" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                </div>
                <a href="javascript:;">7 reviews</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:;">Write a review</a>
              </div>
              <ul class="social-icons">
                <li><a class="facebook" data-original-title="facebook" href="javascript:;"></a></li>
                <li><a class="twitter" data-original-title="twitter" href="javascript:;"></a></li>
                <li><a class="googleplus" data-original-title="googleplus" href="javascript:;"></a></li>
                <li><a class="evernote" data-original-title="evernote" href="javascript:;"></a></li>
                <li><a class="tumblr" data-original-title="tumblr" href="javascript:;"></a></li>
              </ul>
            </div>

            <div class="product-page-content">
              <ul id="myTab" class="nav nav-tabs">
                <li><a href="#Description" data-toggle="tab">Description</a></li>
                <li><a href="#Information" data-toggle="tab">Information</a></li>
                <li class="active"><a href="#Reviews" data-toggle="tab">Reviews (2)</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade" id="Description">
                  <p>{{ $row->description}} </p>
                </div>
                <div class="tab-pane fade" id="Information">
                  <table class="datasheet">
                    <tr>
                      <th colspan="2">Additional features</th>
                    </tr>
                    <tr>
                      <td class="datasheet-features-type">Ram</td>
                      <td>{{ $row->Ram}}</td>
                    </tr>
                    <tr>
                      <td class="datasheet-features-type">Dung lượng</td>
                      <td>{{ $row->Capacity}}</td>
                    </tr>
                    <tr>
                      <td class="datasheet-features-type">Chip</td>
                      <td>{{ $row->chip}}</td>
                    </tr>
                    <tr>
                      <td class="datasheet-features-type">Hệ điều hành</td>
                      <td>{{ $row->HDH}}</td>
                    </tr>
                    <tr>
                      <td class="datasheet-features-type">Xuất xứ</td>
                      <td>{{ $row->origin}}</td>
                    </tr>
                  </table>
                </div>
                <?php if ($row->sale_price != 0) {
            ?>
              <div class="sticker sticker-sale"></div>
            <?php } ?>
            @endforeach
                <div class="tab-pane fade in active" id="Reviews">
                  <!--<p>There are no reviews for this product.</p>-->
              
                              @if($getReview != null)
                                @foreach($getReview as $value)
                                  <div class="review-item clearfix">
                                    <div class="review-item-submitted">
                                      <strong>{{$value->user_name}}</strong>
                                      <em>>{{$value->rating}}</em>
                                      <div class="rateit" data-rateit-value="2.5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                    </div>
                                    <div class="review-item-content">
                                      <p>{{$value->review_user}}</p>
                                    </div>
                                  </div>
                                  @endforeach
                      @endif
                                  <!-- BEGIN FORM-->
                  <form action="{{url('/shop-item/addReview/'.$id_product)}}"  method="post" class="reviews-form" role="form">
                  @csrf
                    <label><h2>Write a review</h2></label>
                    <div class="form-group">
                      <label for="name">Name <span class="require">*</span></label>
                      <input type="text" class="form-control" name="name" value="<?php if(isset(Auth::user()->role_id)) echo Auth::user()->user_name?>" required id="name">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" value="<?php if(isset(Auth::user()->role_id)) echo Auth::user()->email?>" name="email" id="email">
                    </div>
                    <div class="form-group">
                      <label for="review">Review <span class="require">*</span></label>
                      <textarea class="form-control" rows="8" required name="review" id="review"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="email">Rating</label>
                     <div>             
                      <label style="margin-right: 10px;" class="" ><input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Rất tệ">Rất tệ</label>
                      <label style="margin-right: 10px;"  class="" ><input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Tệ">Tệ</label>
                      <label style="margin-right: 10px;"  class="" > <input checked="true" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Bình thường">Bình thường</label>
                      <label style="margin-right: 10px;"  class="" ><input class="" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Tốt">Tốt</label>
                      <label style="margin-right: 10px;"  class=""> <input class="" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Rất tốt<">Rất tốt</label>

                     </div>
                   
                      </div>
                      <div class="padding-top-20">
                      <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                    </div>
                 
                  </form>
                  <!-- END FORM-->
                </div>
              </div>
            </div>
          
          </div>
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