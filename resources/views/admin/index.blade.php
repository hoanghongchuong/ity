@extends('admin.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Quản trị website 
    
  </h1>
  <!-- @if (Session::has('flash_notice'))
    <span class="box-title text-green alert_thongbao">{{ Session::get('flash_notice') }}</span>
  @endif -->
  <ol class="breadcrumb">
    <li><a href="{{ asset('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tables</a></li>
    <li class="active">Data tables</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  
  <div class="box box-info hidden">
    <div class="box-header with-border">
      <h3 class="box-title">Tin tức mới nhất</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table no-margin">
          <thead>
          <tr>
              <th class="text-center with_dieuhuong">Stt</th>
              <th>Tên</th>
              <!-- <th class="text-center with_dieuhuong">Hoạt động</th> -->
              <th class="text-center with_dieuhuong">Sửa</th>
              <th class="text-center with_dieuhuong">Xóa</th>
            </tr>
          </thead>
          <tbody>
          @foreach($news as $k=>$item)
            <tr>
              <td class="text-center with_dieuhuong">{{$k+1}}</td>
              <td>{{$item->name}}</td>
              <!-- <td class="text-center with_dieuhuong">
                <div class="form-group"> 
                  @if($item->status>0)
                    <a href="admin/product/edit?id={{$item->id}}&hienthi={{ time() }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Hiển thị</a>
                  @else
                    <a href="admin/product/edit?id={{$item->id}}&hienthi={{ time() }}" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> Hiển thị</a>
                  @endif
                </div>
              </td> -->
              <td class="text-center with_dieuhuong">
                <i class="fa fa-pencil fa-fw"></i><a href="backend/news/edit?id={{$item->id}}">Edit</a>
              </td>
              <td class="text-center">
                <i class="fa fa-trash-o fa-fw"></i><a onClick="if(!confirm('Xác nhận xóa')) return false;" href="backend/news/{{$item->id}}/delete">Delete</a>
              </td>
            </tr>
            @endforeach
          
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <a href="{!! asset('admin/product') !!}" class="btn btn-sm btn-info btn-flat pull-left">Product list</a>
      
    </div>
    <!-- /.box-footer -->
  </div>

</section><!-- /.content -->
@endsection()