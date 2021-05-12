@extends("frontend.layout")
@section("do-du-lieu-vao-layout")
<div class="left-container">
<!-- ========================================= -->	
    <div class="marked-title">
    	<?php 
    		$category = DB::table("categories")->where("id","=",$id)->first();
    	 ?>
        <h3>{{ $category->name }}</h3>
    </div>
    <div class="row">
    	<?php 
    		//phan 4 ban ghi tren mot trang
    		$news = DB::table("news")->where("category_id","=",$id)->paginate(3);
    	 ?>
    	 @foreach($news as $rows)
        <!-- list news -->
        <article>
			<div class="cat-post-desc">
				<h3><a href="{{ url('news/detail/'.$rows->id) }}">{{ $rows->name }}</a></h3>
				<p><a href="{{ url('news/detail/'.$rows->id) }}"><img class="img_category" style="width:200px;" src="{{ asset('upload/news/'.$rows->photo) }}" alt=""></a>{!! $rows->description !!}</p>
			</div>
			<div class="clear"></div>
			<div class="line_category"></div>
		</article>                       
        <!-- end list news -->
         @endforeach                                
                                
    </div>
    <div class="clear"></div>
    <style type="text/css">
    	.post-navi .active{background: black; color:white; padding:10px;}
    </style>
    <div class="post-navi">
        {{ $news->render() }}
    </div>
<!-- ========================================= -->    
</div>
@endsection