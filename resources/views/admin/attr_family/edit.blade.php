@extends('layouts.app')
@section('title')
Chỉnh sửa nhóm sản phẩm {{$family->name}}
@endsection
@section('content')
<div><button type="button" data-toggle="modal" data-target="#attrGrForm" class="btn btn-primary">Tạo nhóm thuộc tính</button></div>
@foreach($family->attr_grs()->orderBy('position')->get() as $attr_gr)
<div class="accordion" id="accordion-{{$attr_gr->id}}">
	<div class="card">
		<div class="card-header" id="headingOne" data-toggle="collapse" data-target="#{{str_replace(' ','-',$attr_gr->name)}}">			
			{{$attr_gr->name}}
		</div>
<div id="{{str_replace(' ','-',$attr_gr->name)}}" class="collapse" data-parent="#accordion-{{$attr_gr->id}}">
      <div class="card-body">
        <table class="table table-borderless">
        	<thead>
        		<th>Code</th>
        		<th>Name</th>
        		<th>Type</th>
        		<th>Action</th>
        	</thead>
		<tbody>
			@foreach($attr_gr->attrs as $attr)
			<tr>
				<td>{{$attr->code}}</td>
				<td>{{$attr->name}}</td>
				<td>{{$attr->type}}</td>
				<td>
<form action="{{route('admin.attr_family.delete_attr',$attr->id)}}" method="POST">
	@csrf
<button type="submit"><i class="fa fa-trash"></i></button>
</form>
			</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	
	<form class="form-inline" style="float:left;"action="{{route('admin.attr_family.delete_attr_gr',$attr_gr->id)}}" method="POST">
		@csrf
	<button class="btn btn-primary add-attr-btn" type="button" id="addAttrBtn" data-toggle="modal" data-target="#attrForm" data-id="{{$attr_gr->id}}" data-title="{{$attr_gr->name}}">Thêm thuộc tính</button>
	<button type="submit" class="btn btn-danger deleteAttrGrBtn">Xoá</button>
	</form>
      </div>
    </div>
</div>
</div>
@endforeach
@endsection
@section('modal')
<div id="attrGrForm" class="modal fade">
	<div class="modal-dialog">
	<div class="modal-content">
		<form action="{{route('admin.attr_family.create_attr_gr')}}" method="POST">
			@csrf
		<div class="modal-header">
			<div class="modal-title">Tạo nhóm thuộc tính</div>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
		</div>
		<div class="modal-body">			
				<input type="text" name="name" placeholder="Tên nhóm thuộc tính">
				<input type="number" name="position" placeholder="Vị trí">
				<input type="hidden" name="attr_family_id" value="{{$family->id}}">
		</div>
		<div class="modal-footer"><button type="submit" class="btn btn-primary">Tạo</button><button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ</button></div>
		</form>
	</div>
</div>
</div>

<div id="attrForm" class="modal fade">
	<div class="modal-dialog">
	<div class="modal-content">
		<form action="{{route('admin.attr_family.add_attr')}}" method="POST">
			@csrf
		<div class="modal-header">
			<div class="modal-title add-attr-title">Thêm thuộc tính vào nhóm </div>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
		</div>
		<div class="modal-body">			
					@foreach($attrs as $attr)
					<div><input type="checkbox" name="{{$attr->code}}" value="{{$attr->id}}"><label>{{$attr->name}}</label></div>
					@endforeach
				<input type="hidden" name="attr_gr_id" value="">
		</div>
		<div class="modal-footer"><button type="submit" class="btn btn-primary">Tạo</button><button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ</button></div>
		</form>
	</div>
</div>
</div>
@endsection
@section('script')
<script>
$(function(){
$('.add-attr-btn').on('click',function(){
$('#attrForm input[name="attr_gr_id"]').val($(this).data('id'));
$('#attrForm .add-attr-title').append($(this).data('title'));
});

});
</script>

@endsection