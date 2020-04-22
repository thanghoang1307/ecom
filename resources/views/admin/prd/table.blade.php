<div class="card-body">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="width: 10px">#</th>

        <th>Tên sản phẩm</th>

        <th>Mã SKU</th>

        <th>Hành động</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($prds as $prd)
      <tr>
        <td>{{$loop->iteration}}</td>

        <td>{{$prd->name}}</td>

        <td>{{$prd->sku}}</td>

        <td><a href="{{route('admin.prd.edit',$prd->id)}}">
            <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
          </a>

          <!--<a href="{{route('admin.prd.delete',$prd->id)}}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>-->
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<!-- /.card-body -->
<div class="card-footer clearfix">{{$prds->render()}}</div>