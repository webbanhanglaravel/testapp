@extends('pages.layouts.app_master_home')
@push('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endpush
@section('content')
         <div class="container mt-5">
             <div class="row position">
                 <div class="col-sm-7">
                     <h1 class="">イベント</h1>
                     <hr style="width:11%;text-align:left;height:2px;margin-left:0;color: #bb3a3a">
                     <p class="pt-4 fw-bold">Wix（ウィックス）のSEO設定をしよう！検索順位をアップして集客
                         を強化</p>
                     <span class="pt-2">スタートアップ等が、コストをかけずにすぐにWebサイトを準備したい場合、WIxは手軽に使えるホームペー
                        ジ作成サービスとして便利です。しかし、無料もしくは安価で手軽に使える反面、ホームページとして重要な
                        集客力がどれほどあるのかは気になるところでしょう。</span>
                 </div>
                 <div class="col-sm-5 img-1">
                     <img class="anh-1" src="{{asset('img/Rectangle10.jpg')}}" alt="">
                 </div>
             </div>

             <div class="row position top-1">
                 @foreach($products as $product)
                       <div class="col-sm-3">
                           <div class="card">
                               <img src="{{\Illuminate\Support\Facades\Storage::disk('image')->url($product->image)}}" class="card-img-top" alt="...">
                               <p class="danh-muc">{{$product->category->name}}</p>
                               <div class="card-body">
                                   <p>{{$product->name}}</p>
                                   <p class="card-title red">{{ number_format($product->price,0,',','.') }} VNĐ</p>
                               </div>
                           </div>

                       </div>
                 @endforeach
             </div>
         </div>
@endsection

