<!DOCTYPE html>
<html>
<head>
	<title>Admin page</title>
	<meta charset="utf-8">
  <!-- su dung ham asset("duong dan") de load file -->
  <!-- 
      {{ "text" }} se tuong duong lenh echo "text"
      {!! "text" !!} se tuong duong lenh echo "text"
   -->
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.min.css') }}">
  <!-- load duong dan file ckeditor.js vao day -->
  <script type="text/javascript" src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li class="active"><a href="{{ url('admin/categories') }}">Danh mục tin tức</a></li>
            <li class="active"><a href="{{ url('admin/news') }}">Tin tức</a></li>
            <li class="active"><a href="{{ url('admin/users') }}">Quản lý user</a></li>
            <li class="active"><a href="{{ url('admin/logout') }}">Đăng xuất</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

   <div class="container" style="margin-top:70px;">
   	@yield("do-du-lieu-vao-layout")
   </div>

</body>
</html>