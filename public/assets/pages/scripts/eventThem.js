function getProducts(soluong){
    const divResult = document.querySelector(".itemproduct");
    divResult.innerHTML = `<?php
    $soluong = ${soluong+6};
    $t = 0; $j = 0;
    $i = 0;
    ?>
   
    @for($i = 0; $i < $soluong; $i++)
    <?php if($i < count($datas)){  ?>
      <?php if($t == $j){
        echo '<div class="row product-list">'; 
        $j = $j + 3;
    } 
    $t++;
    ?>

      <!-- PRODUCT ITEM START -->
      <div class="col-md-4 col-sm-6 col-xs-12 setImg3">
        <div class="product-item  ">
          <div class="pi-img-wrapper">
          <img src="{{ asset('assets/pages/img/products/'. $datas[$i]->image . '') }}" class="img-responsive" alt="Berry Lace Dress">
            <div>
            <a href="{{ asset('assets/pages/img/products/'. $datas[$i]->image . '') }}" class="btn btn-default fancybox-button">Zoom</a>
             
            </div>
          </div class="">
          <h3><a href="/shop-item/{{ $datas[$i]->id}}_item">{{ $datas[$i]->name}}</a></h3>
         
          <div>
          <?php if($datas[$i]->sale_price != 0){
        ?>
      <div class="pi-price" style="Color:red;" >{{number_format($datas[$i]->price-($datas[$i]->price * ($datas[$i]->sale_price/100)))}}  ({{-$datas[$i]->sale_price}}%)</div>
      <?php } else{
        ?>
         <div class="pi-price">{{ number_format($datas[$i]->price)}}</div>
        <?php }?> 
          <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a></div>
        </div>
      </div>
   
  
    <?php if($t == $j) echo ' </div>'; ?>
      <?php }?>
      @endfor
    <?php if($t != $j) echo ' </div>'; ?>
   </div>
   <?php 
  
   if($i - 1 <= count($datas)){?>
    <a class="btn btn-primary buttonThem" href="#" role="button">Link</a>
    <?php }?>
`;
}