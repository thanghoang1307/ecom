@extends('layouts.app')
@section('title')
Chỉnh sửa sản phẩm {{$prd->name}}
@endsection
@section('content')       
            <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <form method="POST" action="{{route('admin.prd.update',$prd->id)}}">
                @csrf
              <div class="card-header">
                <button type="submit" class="btn btn-primary">
                  Save
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <!-- /.form group -->
              <div class="form-group">
                <label>Tên sản phẩm</label>
              <input type="text" class="form-control" name="name" value="{{$prd->name}}">
              </div>
              <div class="form-group">
                <label>Slug</label>
              <input type="text" class="form-control" name="slug" value="{{$prd->slug}}">
              </div>
              <div class="form-group">
                <label>Mã sản phẩm</label>
              <input type="text" class="form-control" name="sku" value="{{$prd->sku}}">
              </div>
              <div class="form-group">
                <label>Giá sản phẩm</label>
              <input type="number" class="form-control" name="regular_price" value="{{$prd->regular_price}}">
              </div>
              <div class="form-group">
                <label>Giá khuyến mãi</label>
              <input type="number" class="form-control" name="sale_price" value="{{$prd->sale_price}}">
              </div>
              <div class="form-group">
                <label>Mô tả ngắn</label>
              <textarea class="form-control" name="short_desc" rows="5">{{$prd->short_desc}}</textarea>
              </div>
              <div class="form-group">
                <label>Mô tả</label>
              <textarea id="my-editor" class="form-control" name="long_desc" rows="5">{{$prd->long_desc}}</textarea>
              </div>
              <label>Chọn hình đại diện</label>
              <div class="input-group">
                
          <div class="input-group-btn">
          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
          <i class="fa fa-picture-o"></i> Choose
          </a>
          </div>
          <input id="thumbnail" class="form-control" type="text" name="logo" value="{{$prd->thumb}}">
          </div>
          <div id="holder" style="margin-top:15px;max-height:100px;">
            <img src="{{$prd->thumb}}" style="height:5rem;"/>
            </div>
          
              <div class="form-group">
                <label>Thương hiệu</label>
              <select class="form-control" name="brand_id">
                @foreach ($brands as $brand)
                <option value="{{$brand->id}}" 
                selected=<?php echo $brand->id == $prd->brand_id ? true:""?>
                  >{{$brand->name}}</option>
                  @endforeach
              </select>
              </div>
              <label>Danh sách thuộc tính</label>
               <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Tên thuộc tính</th>
                      <th>Giá trị</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($attrs_in as $attr)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$attr->name}}</td>
                      <td>
                      @switch($attr->type)
                      
                      @case('boolean')
                      <div class="form-check">
                      <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="{{$attr->code}}">
                      {{$attr->name}}
                      </label>
                      @break
                      @case('datetime')
                      <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" class="form-control datetime float-right" name="{{$attr->code}}">
                  </div>
                </div>
                      @break
                      @case('integer')
                      <div class="form-group">
                        <input type="number" class="form-control" name="{{$attr->code}}">
                      </div>
                      @break
                      @case('float')
                      <div class="form-group">
                        <input type="number" class="form-control" name="{{$attr->code}}" step="0.01">
                      </div>
                      @break
                      @case('date')
                      <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" class="form-control date float-right" name="{{$attr->code}}">
                  </div>
                </div>
                      @break
                      @default
                      <div class="form-group">
                        <input type="text" class="form-control" name="{{$attr->code}}">
                      </div>
                      @endswitch                      
                      </td>
                      <td><a href="{{route('admin.prd.delete_attr',[$attr->id,$prd->id])}}"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  Thêm thuộc tính
                </button>
              </div>              
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="submit" class="btn btn-primary">
                  Save
                </button>
              </div>
              </form>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
@endsection
@section('modal')
<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{action('Admin\Prd\PrdController@addAttr',$prd->id)}}" method="POST">
                @csrf
            <div class="modal-header">
              <h4 class="modal-title">Thêm thuộc tính</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
              <select name="attr_id">
                @foreach ($attrs_not_in as $attr)
                <option value="{{$attr->id}}">{{$attr->name}}</option>
                @endforeach
              </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" value="Thêm">
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection

@section('script')
<script>
   var route_prefix = "/filemanager";
  </script>
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
    var editor_config = {
      path_absolute : "",
      selector: "textarea[name=long_desc]",
      plugins: [
        "link image"
      ],
      relative_urls: false,
      height: 129,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };
    tinymce.init(editor_config);
  </script>
  <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script type="text/javascript">
  $('#lfm').filemanager('image');
</script>
<script>
  $('.datetime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      singleDatePicker: true,      
      locale: {
        format: 'DD/MM/YYYY hh:mm A'
      },
  });

  $('.date').daterangepicker({
      singleDatePicker: true,      
      locale: {
        format: 'DD/MM/YYYY'
      },
  });


</script>
@endsection
