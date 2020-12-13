@extends('trangchu')
@section('content')
<div class="container">

    <div class="py-5 text-center">
    </div>
    <?php
    echo Session::get('MaDonDH');
    echo ";";
    echo Session::get('MaKH');
    ?>
    <!-- <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3 sticky-top">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Product name</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Second product</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$8</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Third item</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">Promo code</h6>
                        <small>EXAMPLECODE</small>
                    </div>
                    <span class="text-success">-$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>$20</strong>
                </li>
            </ul>
            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                </div>
            </form>
        </div> -->
        
        <!-- <form action="{{URL::to('/luu-don-dat')}}" method="post">
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
         
            {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">tên người nhận</label>
                        <input type="text" class="form-control"  name="ten_KH" required="">
                        <div class="invalid-feedback"> Valid first name is required. </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Số đt</label>
                        <input type="text" class="form-control" name="so_dt" value="" required="">
                        <div class="invalid-feedback"> Valid last name is required. </div>
                    </div>
                </div>
                <div class="mb-3">
                </div>
                <div class="mb-3">
                    <label for="address">Địa chỉ giao hàng</label>
                    <input type="text" class="form-control" name="dia_chi_DH" required="">
                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">XÁC NHẬN ĐẶT HÀNG</button>
            </form>
            
        </div>
    </div> -->

</div>
<?php
    $content= Cart::content();
    // print_r($content);
 
    ?>
    
          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
              
               
              
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Sản phẩm</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Giá</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Số lượng</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Tổng</div>
                  </th>
                </tr>
              </thead>
              @foreach($content as $key =>$val)
              <tbody>
                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-1">
                      <img src="{{URL::to('/public/images/'.$val->options->image)}}" alt="" width="100" class="img-fluid rounded shadow-sm">
                      <div class="ml-1 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"></a></h5><span class="text-muted font-weight-normal font-italic d-block">{{$val->name}}</span>
                      </div>
                    </div>
                  </th>
                  <form action="{{URL::to('/cap-nhat-gio-hang')}}" method="post">
                  <td class="border-0 align-middle">{{$val->price}}<strong></strong></td>
                  <td class="border-0 align-middle"><strong><input type="number" min="1" name="soluongspcapnhat" value="{{$val->qty}}"></strong></td>
                  <td class="border-0 align-middle"><?php $tongcua= $val->qty *$val->price;
                  echo $tongcua ?></td>
                  
                  {{csrf_field()}}
                  <input type="hidden" value="{{$val->rowId}}" name ="iddongcapnhat">
                  <td class="border-0 align-middle"><input class="btn-sm" type="submit" value="Cập nhật số lượng" name="capnhatsl"></td>
                  </form>
                  <td class="border-0 align-middle"><a href="{{URL::to('/xoa-sp-gio-hang/'.$val->rowId)}}" class="text-dark"><i class="fa fa-trash"></i>XÓA</a></td>
                </tr>
            @endforeach
               
              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>

      <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-12">
          <!--   <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
        <div class="p-4">
            <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
            <div class="input-group mb-4 border rounded-pill p-2">
              <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
              <div class="input-group-append border-0">
                <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
              </div>
            </div>
          </div>
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
          <div class="p-4">
            <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
            <textarea name="" cols="30" rows="2" class="form-control"></textarea>
          </div>-->
        </div> 
        <div class="col-lg-9">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Tổng tiền tất cả </div>
          <div class="p-4">
            <!-- <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p> -->
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tổng tiền của sản phẩm</strong><strong>{{Cart::subtotal(0,'.')}} VNĐ</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Phí vận chuyển</strong><strong>0</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Thuế</strong><strong>0</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tổng</strong>
                <h5 class="font-weight-bold">{{Cart::subtotal(0,'.')}} VNĐ</h5>
              </li>
            </ul>
            
            <?php
          $mathemKH= Session::get('MaKH');
          if($mathemKH !=null){

          
          ?>
                <li class="nav-item">
                <a href="{{URL::to('/thanh-toan')}}" class="btn btn-dark rounded-pill py-2 btn-block">Tiến hành thanh toán</a>
          </li>
         
          <?php
            }else{
          ?>
          
          <a href="{{URL::to('/dang-nhap-thanh-toan')}}" class="btn btn-dark rounded-pill py-2 btn-block">Tiến hành thanh toán</a>
          <?php
          }
          ?>
           
          </div>
        </div>
      </div>
          <form action="{{URL::to('xac-nhan-thong-tin-dat-hang')}}" method="POST">
          {{csrf_field()}}
      <div>
      <span>
      <label >
      <input name="chonhttt" value="tra tien mat" type="checkbox">Nhận hàng trả tiền mặt
      </label>
      
      </span>
      <span>
      <label >
      <input name="chonhttt" value="thanh toan online" type="checkbox">thanh toán online
      </label>
      <input type="submit" value="Xac nhan dat hang" name="xacnhandathang">
      </span>
      </div>

      </form>
@endsection