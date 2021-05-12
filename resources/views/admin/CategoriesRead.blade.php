<!-- load file layout vao day -->
@extends("admin.Layout")
<!-- do du lieu vao tag do-du-lieu-vao-layout trong file Layout.blade.php -->
@section("do-du-lieu-vao-layout")
<div class="col-md-6 col-xs-offset-3">
	<div style="margin-bottom: 5px;">
		<a href="{{ url('admin/categories/create') }}" class="btn btn-primary">Create</a>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">Category news</div>
		<div class="panel-body">
			<table class="table table-bordered table-hover">
				<tr>
					<th>Tên danh mục</th>
					<th style="width:100px;">Quản lý</th>
				</tr>
				@foreach($data as $rows)
				<tr>
					<td>{{ $rows->name }}</td>
					<td style="text-align:center">
						<a href="{{ url('admin/categories/update/'.$rows->id) }}">Edit</a>&nbsp;
						<a href="{{ url('admin/categories/delete/'.$rows->id) }}" onclick="return window.confirm('Are you sure?');">Delete</a>
					</td>
				</tr>
				@endforeach
			</table>
			<style type="text/css">
				.pagination{padding: 0px; margin: 0px;}
			</style>
			<!-- phan trang bang ham render() hoac links -->
			{{ $data->links() }}
		</div>
	</div>
</div>
@endsection