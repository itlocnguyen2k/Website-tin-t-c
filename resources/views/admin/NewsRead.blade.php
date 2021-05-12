<!-- load file layout vao day -->
@extends("admin.Layout")
<!-- do du lieu vao tag do-du-lieu-vao-layout trong file Layout.blade.php -->
@section("do-du-lieu-vao-layout")
<div class="col-md-10 col-xs-offset-1">
	<div style="margin-bottom:5px;">
		<a href="{{ url('admin/news/create') }}" class="btn btn-primary">Add</a>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">News</div>
		<div class="panel-body">
			<table class="table table-hover table-bordered">
				<tr>
					<th style="width:50px;">STT</th>
					<th style="width:100px;">Ảnh</th>
					<th>Tiêu đề</th>
					<th style="width:200px;">Thuộc danh mục</th>
					<th style="width:100px;"></th>
				</tr>
				<?php 
					$stt = 0;
				 ?>
				 @foreach($data as $rows)
				 <?php $stt++; ?>
				<tr>
					<td style="text-align:center;">{{ $stt }}</td>
					<td style="text-align:center;">
						@if($rows->photo != "" && file_exists("upload/news/".$rows->photo))
						<img src="{{ asset('upload/news/'.$rows->photo) }}" style="width:100px;">
						@endif
					</td>
					<td>{{ $rows->name }}</td>
					<td style="text-align:center;">
						<!-- trong view co the truy van truc tiep csdl -->
						<?php 
							$category = DB::table("categories")->where("id","=",$rows->category_id)->first();
							echo isset($category->name) ? $category->name : "";
						 ?>
					</td>
					<td style="text-align:center">
						<a href="{{ url('admin/news/update/'.$rows->id) }}">Edit</a>&nbsp;
						<a href="{{ url('admin/news/delete/'.$rows->id) }}" onclick="return window.confirm('Are you sure?');">Delete</a>
					</td>
				</tr>
				@endforeach
			</table>
			<style type="text/css">
				.pagination{padding:0px; margin:0px;}			
			</style>
			{{ $data->render() }}
		</div>
	</div>
</div>
@endsection