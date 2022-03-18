@extends('pages.layouts.app_master_frontend')
@section('content')
    <div class="container">
        <h1>Sửa sản phẩm</h1>
        <form class="form-horizontal" autocomplete="off" method="POST" action=""  enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="required">Name <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control keypress-count" name="name" value="{{ old('c_name',$product->name ?? '') }}">
                                @if($errors->first('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục sản phẩm </label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option title="{{ $category->name }}" {{ $category->id == $product->category_id ? 'selected="selected"' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="required">Price <span>(*)</span></label>
                                        <input type="number"  class="form-control" value="{{ old('price',$product->price ?? '') }}"  name="price">
                                        @if($errors->first('price'))
                                            <span class="text-danger">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="required">Số lượng <span>(*)</span></label>
                                        <input type="number"  class="form-control" value="{{ old('amount',$product->amount ?? '') }}"  name="amount">
                                        @if($errors->first('amount'))
                                            <span class="text-danger">{{ $errors->first('amount') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Ảnh </label><br>
                                <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="required">Status</label><br>
{{--                                <select name="p_status" class="form-control"  tabindex="-1">--}}
{{--                                    <option title="Public" @if (old('p_status',$product->p_status) == '1') selected="selected" @endif value="1">Public</option>--}}
{{--                                    <option title="hide" @if (old('p_status',$product->p_status) == '0') selected="selected" @endif value="0">Hide</option>--}}
{{--                                </select>--}}
                                <input type="checkbox" id="p_status" name="p_status" @if (old('p_status',$product->p_status) == '1') checked="checked" @endif value="1">
                                <label for="p_status">Active</label><br>
                            </div>
                            <div class="form-group pt-3">
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-info"><i class="la la-save"></i> Submit</button>
                                    <a href="{{ route('get.product.index') }}" class="btn btn-danger mr-2">Quay lại <i class="la la-undo"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
