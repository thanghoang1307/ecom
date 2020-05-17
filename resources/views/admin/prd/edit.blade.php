@extends('layouts.app')
@section('title')
<i class="far fa fa-product-hunt nav-icon"></i> Chỉnh sửa sản phẩm {{$prd->name}}
@endsection
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <form method="POST" action="{{route('admin.prd.update',$prd->id)}}">
        @csrf
        <div class="card-header">
          <div class="row">
            <div class="col-md-6 col-12">
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="{{route('front.product-detail',$prd->slug)}}" target="_blank" class="btn" style="border: 2px solid #999; color: #777; margin-left: 10px;">Xem trên giao diện</a>
            </div>
            <div class="col-md-6 col-12" style="text-align: right;">
              <a href="{{route('admin.prd.delete',$prd->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

          <!-- Accordion Status -->
          <div class="accordion">
            <div class="card">
              <div class="card-header" data-toggle="collapse" data-target="#statusAccordionContent">
                Tình trạng
              </div>
            </div>
          </div>
          <div id="statusAccordionContent" class="collapse">
            <div class="card-body">
              <div class="form-group">
                <label>Hiển thị</label>
                <select name="is_show" class="form-control">
                  <option value="0" {{$prd->is_show ? '': 'selected'}}>Ẩn</option>
                  <option value="1" {{$prd->is_show ? 'selected': ''}}>Hiện</option>
                </select>
              </div>
            </div>
          </div>

          <div style="margin: 30px 0 10px;">
            <h6 style="font-weight: bold;">Thông tin chính</h6>
          </div>

          <!-- Accordion Brand & Category-->
          <div class="accordion">
            <div class="card">
              <div class="card-header" data-toggle="collapse" data-target="#accordionBrandContent">
                Thương hiệu và Danh mục
              </div>
            </div>
          </div>
          <div class="collapse" id="accordionBrandContent">
            <div class="card-body">
              <div class="form-group">
                <label>Thương hiệu</label>
                <select class="form-control" name="brand_id">
                  @foreach ($brands as $brand)
                  <option value="{{$brand->id}}" {{$brand->id == $prd->brand_id ? "selected": ""}}>{{$brand->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Danh mục</label>
                @foreach ( $cats as $cat)
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" name="categories[]" value="{{$cat->id}}" {{$prd->cats->contains($cat->id) ? "checked": ""}}>
                    {{$cat->name}}
                  </label>
                </div>
                @endforeach
              </div>
            </div>
          </div>

          <!-- Accordion Image -->
          <div class="accordion">
            <div class="card">
              <div class="card-header" data-toggle="collapse" data-target="#accordionImageContent">
                Hình ảnh
              </div>
            </div>
          </div>
          <div id="accordionImageContent" class="collapse">
            <div class="form-group">
              <label>Chọn hình đại diện</label>
			  <div style="font-size: 12px; font-style: italic; color: gray; margin-bottom: 10px;">
			  	* Chỉ chọn 1 hình duy nhất làm đại diện<br />
			  	Định dạng hỗ trợ: jpg (đề xuất), png, gif. Dung lượng file đề xuất < 100kb. Kích thước đề xuất: 500x500px. Độ phân giải dề xuất: 72dpi.
			  </div>
              <div class="input-group">

                <div class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                  </a>
                </div>
                <input id="thumbnail" class="form-control" type="text" name="thumb" value="{{$prd->thumb}}">
              </div>
              <div id="holder" style="margin-top:15px;max-height:100px;">
                <img src="{{$prd->thumb}}" style="height:5rem;" />
              </div>
            </div>
            <div class="form-group">
              <label>Ảnh sản phẩm</label>
			  <div style="font-size: 12px; font-style: italic; color: gray; margin-bottom: 10px;">
			  	* Có thể chọn nhiều hình<br />
			  	Định dạng hỗ trợ: jpg (đề xuất), png, gif. Dung lượng file đề xuất < 100kb. Kích thước đề xuất: 500x500px. Độ phân giải dề xuất: 72dpi.
			  </div>
              <div class="input-group">
                <div class="input-group-btn">
                  <a id="lfm2" data-input="images" data-preview="holder2" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                  </a>
                </div>
                <input id="images" class="form-control" type="text" name="images" value="{{$image}}">
              </div>
              <div id="holder2" style="margin-top:15px;max-height:100px;">
                @foreach ($prd->images as $image)
                <img src="{{$image->image}}" style="height:5rem;" />
                @endforeach
              </div>
            </div>
          </div>

          <!-- Accordion General -->
          <div class="accordion">
            <div class="card">
              <div class="card-header" data-toggle="collapse" data-target="#generalAccordionContent">
                Thông tin chi tiết sản phẩm
              </div>
            </div>
          </div>
          <div id="generalAccordionContent" class="collapse">
            <div class="card-body">
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
                <label>Thông tin ưu đãi</label>
                <textarea class="form-control" name="short_desc" rows="5">{{$prd->short_desc}}</textarea>
              </div>
              <div class="form-group">
                <label>Mô tả</label>
				<div style="font-size: 12px; font-style: italic; color: gray; margin-bottom: 10px;">
			  	* Định dạng hình ảnh trong nội dung bài viết: Định dạng hỗ trợ: jpg (đề xuất), png, gif. Dung lượng file đề xuất < 100kb. Kích thước đề xuất: 500x500px. Độ phân giải dề xuất: 72dpi.<br />
			  	* Định dạng video trong nội dung bài viết: upload video trên kênh youtube (Google đề xuất) copy mã nhúng và nhúng link vào hệ thống tại menu Insert > Media và dán vào tab Embed.
			  </div>
                <textarea id="my-editor" class="form-control" name="long_desc" rows="5">{{$prd->long_desc}}</textarea>
              </div>
              <div class="form-group">
              <label>Tags/Từ khoá tìm kiếm</label>
              <input type="text" class="form-control" name="tags" data-role="tagsinput" value="{{$tags}}"></div>
            </div>
          </div>

          <div style="margin: 30px 0 10px;">
            <h6 style="font-weight: bold;">Thông tin kỹ thuật</h6>
          </div>

          <!-- Accordion Atributes-->
          @foreach($attr_grs as $attr_gr)
          <div class="accordion">
            <div class="card">
              <div class="card-header" data-toggle="collapse" data-target="#accordion-{{$attr_gr->id}}">
                {{$attr_gr->name}}
              </div>
            </div>
          </div>
          <div class="collapse" id="accordion-{{$attr_gr->id}}">
            <div class="card-body">
              @foreach($attr_gr->attrs()->orderBy('position')->get() as $attr)

              @switch($attr->type)
              @case('boolean')
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input attr_boolean" id="customSwitch{{$attr->code}}" name="{{$attr->code}}[]" {{($attr->prds()->where('prd_id', $prd->id)->first() ? $attr->prds()->where('prd_id', $prd->id)->first()->pivot->boolean_val : false) ? "checked" : ""}}>
                  <input type="hidden" name="{{$attr->code}}[]" class="attr_boolean" value="0">
                  <label class="custom-control-label" for="customSwitch{{$attr->code}}">{{$attr->name}}</label>
                </div>
              </div>
              @break
              @case('textarea')
              <div class="form-group">
                <label for="">{{$attr->name}}</label>
                <textarea name="{{$attr->code}}" cols="100%" rows="10">{!!$attr->prds()->where('prd_id', $prd->id)->first()->pivot->textarea_val ?? '' !!}</textarea>
              </div>
              @break
              @case('datetime')
              <div class="form-group">
                <label>{{$attr->name}}</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                  </div>
                  <input type="text" class="form-control datetime float-right" name="{{$attr->code}}" value="{{$attr->prds()->where('prd_id', $prd->id)->first() ? date('d/m/Y H:i',strtotime($attr->prds()->where('prd_id', $prd->id)->first()->pivot->datetime_val)) : date('d/m/Y H:i')}}">
                </div>
              </div>
              @break
              @case('integer')
              <div class="form-group">
                <label>{{$attr->name}}</label>
                <input type="number" class="form-control" name="{{$attr->code}}" value="{{$attr->prds()->where('prd_id', $prd->id)->first()->pivot->integer_val ?? '' }}">
              </div>
              @break
              @case('float')
              <div class="form-group">
                <label>{{$attr->name}}</label>
                <input type="number" class="form-control" name="{{$attr->code}}" step="0.01" value="{{$attr->prds()->where('prd_id', $prd->id)->first()->pivot->float_val ?? '' }}">
              </div>
              @break
              @case('date')
              <div class="form-group">
                <label>{{$attr->name}}</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                  </div>
                  <input type="text" class="form-control date float-right" name="{{$attr->code}}" value="{{$attr->prds()->where('prd_id', $prd->id)->first() ? date('d/m/Y',strtotime($attr->prds()->where('prd_id', $prd->id)->first()->pivot->date_val)) : date('d/m/Y')}}">
                </div>
              </div>
              @break
              @default
              <div class="form-group">
                <label>{{$attr->name}}</label>
                <input type="text" class="form-control" name="{{$attr->code}}" value="{{$attr->prds()->where('prd_id', $prd->id)->first()->pivot->text_val ?? ''}}">
              </div>
              @endswitch
              @endforeach
              </tbody>
              </table>

            </div>
          </div>
          @endforeach
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="{{route('front.product-detail',$prd->slug)}}" target="_blank" class="btn" style="border: 2px solid #999; color: #777; margin-left: 10px;">Xem trên giao diện</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- /.col-md-6 -->
</div>
<!-- /.row -->
@endsection


@section('script')
<script>
  var route_prefix = "/filemanager";
</script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
  var editor_config = {
    path_absolute: "",
    selector: "textarea",
    plugins: [
      "link image code"
    ],
    relative_urls: false,
    height: 129,
    file_browser_callback: function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file: cmsURL,
        title: 'Filemanager',
        width: x * 0.8,
        height: y * 0.8,
        resizable: "yes",
        close_previous: "no"
      });
    }
  };
  tinymce.init(editor_config);
</script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script type="text/javascript">
  $('#lfm').filemanager('image');
  $('#lfm2').filemanager('image');
</script>
<script>
  $(function() {
    $(".date").daterangepicker({
      singleDatePicker: true,
      autoUpdateInput: false,
      autoApply: true,
      locale: {
        format: 'DD/MM/YYYY'
      },
    });

    $('.date').on('apply.daterangepicker', function(ev, picker) {
      //do something, like clearing an input
      $(this).val(picker.startDate.format('DD/MM/YYYY'));
    });

    $('.datetime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      singleDatePicker: true,
      timePicker24Hour: true,
      autoUpdateInput: false,
      autoApply: true,
      locale: {
        format: 'DD/MM/YYYY hh:mm'
      },
    });

    $('.datetime').on('apply.daterangepicker', function(ev, picker) {
      //do something, like clearing an input
      $(this).val(picker.startDate.format('DD/MM/YYYY hh:mm'));
    });
  });
</script>
@endsection