@extends('pages.layouts.app_master_frontend')
@section('content')
    <div class="container">
        <h1>Thêm mới danh mục</h1>
        <form class="form-horizontal" autocomplete="off" method="POST" action=""  enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="required">Tên danh mục <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control keypress-count" name="name">
                                @if($errors->first('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="required">Status</label><br>
                                <input type="checkbox" id="c_status" name="c_status" value="1">
                                <label for="c_status">Active</label><br>
                            </div>
                            <div class="form-group pt-3">
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-info"><i class="la la-save"></i> Submit</button>
                                    <a href="{{ route('get.category.index') }}" class="btn btn-danger mr-2">Quay lại <i class="la la-undo"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
