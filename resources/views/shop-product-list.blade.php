@extends('layout')
@section('content')


<div class="title-wrapper">
  <div class="container">
    <div class="container-inner">

    </div>
  </div>
</div>

<div class="main">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="http://127.0.0.1:8000">Home</a></li>
      <li><a href="">Store</a></li>
      <li class="active">Men category</li>
    </ul>
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar col-md-3 col-sm-5">
        <div>
        <form action="{{ url('shop-product-list')}}" method="post">
          <h2>Filter</h2>
          <button class="btn btn-primary" type="submit">Filter</button>
        </div>
      <div>
        
        @csrf
        <label class="control-label">Ram:</label>
              <select name="Ram" class="form-control input-sm combobox">
                <option value="" selected="selected">ALL</option>
                <option value="3 GB">3 GB</option>
                <option value="4 GB">4 GB</option>
                <option value="6 GB">6 GB</option>
                <option value="8 GB">8 GB</option>
                <option value="16 GB">16 GB</option>
                <option value="32 GB">32 GB</option>
              </select>
            </div>
            <div>
              <label  class="control-label">Capacity:</label>
              <select name="Capacity" class="form-control input-sm combobox">
                <option value="" selected="selected">ALL</option>
                <option value="8 GB">8 GB</option>
                <option value="16 GB">16 GB</option>
                <option value="32 GB">32 GB</option>
                <option value="64 GB">64 GB</option>
                <option value="128 GB">128 GB</option>
                <option value="256 GB">256 GB</option>
                <option value="512 GB">512 GB</option>

              </select>
            </div>
            <div >
              <label  class="control-label">Manufactures:</label>
              <select name="Manufactures" class="form-control input-sm combobox">
                <?php
                //lấy kiểu du liệu sản phẩm (manu, type)
                //key: chuoi cho biet loai san pham nguoi dung tim kiem
                if (isset($key)) {
                  $pieces = explode("_", $key); ?>
                  @foreach($manufactures as $row)
                  <?php if ($pieces[1] == $row->id && $pieces[0] == "manu") { ?> <option value="{{$row->id}}">{{$row->manu_name}}</option> <?php } ?>
                  @endforeach
                  <option value="ALL">ALL</option>
                <?php

                } else { ?>
                  <option value="ALL" selected="selected">ALL</option>
                <?php

                }
                ?>

                @foreach($manufactures as $row)
                <option value="{{$row->id}}">{{$row->manu_name}}</option>
                @endforeach
              </select>
              <label class="control-label">Protype:</label>
              <select name="Protype" class="form-control input-sm combobox">
              <?php
                //lấy kiểu du liệu sản phẩm (manu, type)
                //key: chuoi cho biet loai san pham nguoi dung tim kiem
                if (isset($key)) {
                  $pieces = explode("_", $key); ?>
                  @foreach($protype as $row)
                  <?php if ($pieces[1] == $row->id && $pieces[0] == "type") { ?> <option value="{{$row->id}}">{{$row->type_name}}</option> <?php } ?>
                  @endforeach
                  <option value="ALL">ALL</option>
                <?php

                } else { ?>
                  <option value="ALL" selected="selected">ALL</option>
                <?php
                }
                ?>
                @foreach($protype as $row)
                <option value="{{$row->id}}">{{$row->type_name}}</option>
                @endforeach
              </select>
            </div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN CONTENT -->
      <div class="col-md-9 col-sm-7">
        <div class="row list-view-sorting clearfix">
          <div class="col-md-2 col-sm-2 list-view">
            <a href="javascript:;"><i class="fa fa-th-large"></i></a>
            <a href="javascript:;"><i class="fa fa-th-list"></i></a>
          </div>

          <div class="col-md-10 col-sm-10">   
           <!-- trả về ký tự tìm kiếm -->
          @if(isset($keyword))
          <div><h5>Search: {{$keyword}}</h5></div>
          @endif
            <!-- trả về tiêu chí lọc -->
          @if(isset($locSP))
          <div><h5>Search: {{$locSP}}</h5></div>
          @endif
          </div>
          
        </form>
    
            
      </div>
        <!-- BEGIN PRODUCT LIST -->


        <?php
        $soluong = 6;
        $i = 0;
        $j = 0;


        ?>

        @foreach($datas as $row)
        <?php
        if ($i == $j) {
          echo '<div class="row product-list">';
          $j = $j + 3;
        }
        $i++;
        ?>

        <!-- PRODUCT ITEM START -->
        <div class="col-md-4 col-sm-6 col-xs-12 setImg3">
          <div class="product-item  ">
            <div class="pi-img-wrapper">
              <img src="{{ asset('assets/pages/img/products/'. $row->image . '') }}" class="img-responsive" alt="Berry Lace Dress">
              <div>
                <a href="{{ asset('assets/pages/img/products/'. $row->image . '') }}" class="btn btn-default fancybox-button">Zoom</a>

              </div>
            </div class="">
            <h3><a href="/shop-item/item_{{ $row->id}}">{{ $row->name}}</a></h3>

            <div>
              <?php if ($row->sale_price != 0) {
              ?>
                <div class="pi-price" style="Color:red;">{{number_format($row->price-($row->price * ($row->sale_price/100)))}} ({{-$row->sale_price}}%)</div>
              <?php } else {
              ?>
                <div class="pi-price">{{ number_format($row->price)}}</div>
              <?php } ?>
              <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
            </div>
          </div>
        </div>
        <!-- PRODUCT ITEM END -->
        <!-- PRODUCT ITEM START -->

        <!-- PRODUCT ITEM END -->

        <?php if ($i == $j) echo ' </div>'; ?>
        @endforeach

        <!-- END PRODUCT LIST -->
        <!-- BEGIN PAGINATOR -->

        <div class="row">
          <div class="col-md-8 col-sm-8">
            {{ $datas->links() }}
          </div>
        </div>
        <!-- END PAGINATOR -->
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END SIDEBAR & CONTENT -->
  </div>
</div>
@endsection