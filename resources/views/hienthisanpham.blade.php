      <!-- lấy giao diện chính đã có sẵn ở phần trên -->
      @extends('trangchu') <!--trỏ về giao diện chính --> 
       @section('content') <!--   đặt tên của cái giao diện nhỏ này
                                        để qua giao diện cần trỏ và thì
                                        gọi đúng tên này --> 
                                       
                                        
                                        {{csrf_field()}}
           @foreach($sanpham as $key =>$csanpham)
          
           
            <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
            
              <input type="hidden" value="{{$csanpham->masp}}" class="maspgiohang{{$csanpham->masp}}">
              <input type="hidden" value="{{$csanpham->hinhanh}}" class="hinhanhspgiohang{{$csanpham->masp}}">
              <input type="hidden" value="{{$csanpham->tensp}}" class="tenspgiohang{{$csanpham->masp}}">
              <input type="hidden" value="{{$csanpham->gia}}" class="giaspgiohang{{$csanpham->masp}}">

              <a href="{{URL::to('/chi-tiet-san-pham/'.$csanpham->masp)}}"><img class="card-img-top" src="{{URL::to('public/images/'.$csanpham ->hinhanh)}}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="{{URL::to('/chi-tiet-san-pham/').$csanpham->masp}}">{{$csanpham->tensp}}</a>
                </h4>
                <h5>{{number_format($csanpham -> gia)}} VND</h5>
               
              </div>
             
              <div class="card-footer">
              <form action="{{URL::to('/luu-gio-hang')}}" method="post">
              {{csrf_field()}}
              <input type="hidden" name="soluong" min="1" value="1"/>
              <input type="hidden" name ="maspmua" value="{{$csanpham->masp}}"/>
              <button type="submit" class="btn-sm">THÊM SP VÀO GIỎ</button>
                </form>
              </div>
             
            </div>
            </form>
          </div>
      <div>
 
      </div>
          @endforeach
    <div>
          

        
         
          </div>
        @endsection