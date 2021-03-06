@extends('layouts.Master')

@section('main')
<div class="col-md-10 mt-5 ml-auto mr-auto">
<div class="card">
	<div class="card-header">
	  <h4>Danh sách trình độ</h4>
	</div>
	<div class="card-body">
	  <div class="table-responsive">
		<table class="table">
		  <thead>
			<tr>
			  <th>Mã trình độ</th>
			  <th>Tên trình độ</th>
			  <th>Thao tác</th>
			</tr>
		  </thead>
		  <tbody>
				@foreach($trinhdo as $cv)
			<tr>
			  <th scope="row">{{ $cv->id }}</th>
			  <td>{{ $cv->ten_trinh_do }}</td>
			  <td>
				  <a id="p{{ $cv->id }}" href="#exampleModal" data-toggle="modal" data-whatever="@mdo"  title="Sửa tên trình độ">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
				  </a>
				  <a id="d{{ $cv->id }}"  href="#xoaModal" data-toggle="modal" data-whatever="@mdo"  title="Xóa trình độ">
						<i class="ml-2 fa fa-trash-o" aria-hidden="true"></i>
				  </a>
				  <script type="text/javascript">
							
					$(document).ready(function () {
						$('#p{{ $cv->id }}').click(function(event) {
							$('#textedit').val('{{$cv->ten_trinh_do}}');
							$('#macv').val('{{$cv->id}}');
						});
						$('#d{{ $cv->id }}').click(function(event) {
							$('#delcv').val('{{$cv->id}}');
						});
					});
				</script>
			  </td>
			</tr>
			@endforeach
		  </tbody>
		</table>
	  </div>
	</div>
	<div class="card-header">
		<form action="{{url('tao-moi-trinh-do')}}" method="POST">
			{{ csrf_field() }}
			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-3 col-form-label">Tên trình độ</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="tentrinhdo" placeholder="Tên trình độ">
				</div>
			</div>

			<div class="form-group row">
				<div class="offset-sm-3 col-sm-9">
					<button type="submit" class="btn btn-primary">Thêm trình độ</button>
				</div>
			</div>
		</form>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="exampleModalLabel">Sửa trình độ</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="form-edit" action="{{url('sua-trinh-do')}}" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="id" id="macv">
							<div class="form-group">
								<label for="recipient-name" class="form-control-label">Tên trình độ</label>
								<input type="text" class="form-control" id="textedit" name="tentrinhdo">
							</div>
							
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
						<button type="button" class="btn btn-primary" id="edit-submit">Sửa</button>
					</div>
				</div>
			</div>
	</div>
	<div class="modal fade" id="xoaModal" tabindex="-1" role="dialog" aria-labelledby="exampleMLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="exampleMLabel">Xóa trình độ ?!</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h1 class="text-danger">Chú ý !!!</h1>
						<p>Nếu bạn xóa tên trình độ này đồng nghĩa <Strong class="text-danger">tất cả dữ liệu liên quan đều bị xóa</Strong></p>
					</div>
					<div class="modal-footer">
							<form id="form-delete" action="{{url('xoa-trinh-do')}}" method="POST">
									{{ csrf_field() }}
									<input type="hidden" name="id" id="delcv">
							</form>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
						<button type="button" id="delete-submit" class="btn btn-primary" >Xóa</button>
					</div>
				</div>
			</div>
	</div>

</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function($) {
	$('#edit-submit').click(function(event) {
		$('#form-edit').submit();
	});
	$('#delete-submit').click(function(event) {
		$('#form-delete').submit();
	});
});
</script>
@endsection

