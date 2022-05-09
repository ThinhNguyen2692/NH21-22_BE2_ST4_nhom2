@extends('layout')
@section('content')

<!-- BEGIN SLIDER -->
<div class="page-slider margin-bottom-35">
  <div id="carousel-example-generic" class="carousel slide carousel-slider">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <!-- First slide -->
      <div class="item carousel-item-four active">
        <div class="container">
          <div class="carousel-position-four text-center">
          
          </div>
        </div>
      </div>

     

<div class="main">
  <div class="container">
    <!-- Products tab & slick -->
		
			<!-- Products tab & slick -->
    <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->

      <!-- BEGIN SALE PRODUCT -->

     <img style="cursor:pointer" src="https://cdn.tgdd.vn/2022/04/banner/Sansale-desk-1-1200x90.png" alt="Hotsale TGDD Desk" width="1200" height="90">

    <div class="row  margin-bottom-40">
      <div class="col-md-12 sale-product themMau" >
        <div class="owl-carousel owl-carousel5"    >
            @foreach($productSale as $row)
  
            <div class="product-item setImg2">
              <div class="pi-img-wrapper">
                <img src="assets/pages/img/products/{{ $row->image}}" class="img-responsive" alt="Berry Lace Dress">
                <div>
                  <a href="assets/pages/img/products/{{ $row->image}}" class="btn btn-default fancybox-button">Zoom</a>
                </div>
              </div>
              <h3><a href="/shop-item/item_{{ $row->id}}">{{ $row->name}}</a></h3>
              <div class="pi-price" style="Color:red;" >{{number_format($row->price-($row->price * ($row->sale_price/100)))}}  ({{-$row->sale_price}}%)</div>
              <div>{{ number_format($row->price)}}</div>
              <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
              <div class="sticker sticker-sale"></div>
            
            </div>
          @endforeach
          
        </div>
      </div>
      <!-- END SALE PRODUCT -->
    </div>
    <!-- END SALE PRODUCT & NEW ARRIVALS -->
    <!-- BEGIN SIDEBAR & CONTENT -->

      <!-- BEGIN SIDEBAR -->
     
      <!-- END SIDEBAR -->
      <!-- BEGIN CONTENT -->
      <h2>New product</h2>

      <div class="row  margin-bottom-40">
      <div class="col-md-12 sale-product  " >
        <div class="owl-carousel owl-carousel5"    >
            @foreach($dataNew as $row)
  
            <div class="product-item setImg2">
              <div class="pi-img-wrapper">
                <img src="assets/pages/img/products/{{ $row->image}}" class="img-responsive" alt="Berry Lace Dress">
                <div>
                  <a href="assets/pages/img/products/{{ $row->image}}" class="btn btn-default fancybox-button">Zoom</a>
                </div>
              </div>
              <h3><a href="/shop-item/item_{{ $row->id}}">{{ $row->name}}</a></h3>
              <?php if($row->sale_price != 0){
                ?>
              <div class="pi-price" style="Color:red;" >{{number_format($row->price-($row->price * ($row->sale_price/100)))}}  ({{-$row->sale_price}}%)</div>
              <div>{{ number_format($row->price)}}</div>
              <?php } else{
                ?>
                 <div class="pi-price">{{ number_format($row->price)}}</div>
                <?php }?>
              <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
              <div class="sticker sticker-new"></div>
            
            </div>
          @endforeach
          
        </div>
      </div>
      <!-- END SALE PRODUCT -->
    </div>

      <h2>Featured products</h2>
      <div class="row  margin-bottom-40">
      <div class="col-md-12 sale-product  " >
        <div class="owl-carousel owl-carousel5"    >
            @foreach($datafeature as $row)
  
            <div class="product-item setImg2">
              <div class="pi-img-wrapper">
                <img src="assets/pages/img/products/{{ $row->image}}" class="img-responsive" alt="Berry Lace Dress">
                <div>
                  <a href="assets/pages/img/products/{{ $row->image}}" class="btn btn-default fancybox-button">Zoom</a>
                </div>
              </div>
              <h3><a href="/shop-item/item_{{ $row->id}}">{{ $row->name}}</a></h3>
              <div class="pi-price">{{ number_format($row->price)}}</div>
              <div class="pi-price"> (-{{ $row->sale_price}}%)</div>
              <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
            
            </div>
          @endforeach
          
        </div>
      </div>
      <!-- END SALE PRODUCT -->
    </div>

      <!-- END CONTENT -->

    <!-- END SIDEBAR & CONTENT -->

    <!-- BEGIN TWO PRODUCTS & PROMO -->
    <div class="row margin-bottom-35 ">
      <!-- BEGIN TWO PRODUCTS -->

      <!-- END TWO PRODUCTS -->
      <!-- BEGIN PROMO -->

      <!-- END PROMO -->
    </div>
    <!-- END TWO PRODUCTS & PROMO -->
  </div>
</div>
@endsection