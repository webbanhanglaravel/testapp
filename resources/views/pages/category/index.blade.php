@extends('pages.layouts.app_master_frontend')
@section('content')
    <div class="container">
        <div class="row mt-4">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table border table-striped">
                <thead>
                <tr>
                    <td colspan="3"><h2>Quản lý danh mục</h2></td>
                    <td style="text-align:right"><a href="{{ route('get.category.create') }}" class="btn btn-lg   btn-primary">Thêm</a></td>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($category as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{$item->name}}</td>
                        <td>
                            <span class="badge {{ $item->getStatus($item->status)['class']  }}">{{ $item->getStatus($item->status)['name']  }}</span>
                        </td>
                        <td>
                            <a href="{{ route('get.category.edit', $item->id) }}" class="btn btn-success">Sửa</a>
                            <a href="{{ route('get.category.delete', $item->id) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @empty
                    <p>Dữ liệu chưa cập nhật</p>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
