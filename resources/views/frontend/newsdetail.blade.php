@extends("frontend.layout")
@section("do-du-lieu-vao-layout")
<?php 
	$news = DB::table("news")->where("id","=",$id)->first();
 ?>
<div class="left-container">
    <!-- ========================================= -->
        <article>
        	<div class="title-box">
                <h1>{{ $news->name }}</h1>
            </div>
            <div class="post-thumb">
            	<img src="{{ asset('upload/news/'.$news->photo) }}" alt="">
            </div>
            <div class="post-content" style="margin-top: 10px;">
               {!! $news->description !!}
               {!! $news->content !!}
                <div class="marked-title first">
                    <h3>Tin tức khác</h3>
                </div>
                <div class="row-fluid">
                <?php 
                	//lay 4 tin tuc khac ngay sau tin hien tai
                	$otherNews = DB::select("select * from news where id < $id and category_id = {$news->category_id} order by id desc limit 0,4");
                 ?>
                 @foreach($otherNews as $rows)
                   <!-- other news -->
                    <div class="span4">
                        <article class="small single">
                            <div class="post-thumb">
                                <a href="{{ url('news/detail/'.$rows->id) }}"><img src="{{ asset('upload/news/'.$rows->photo) }}" alt=""></a>
                            </div>
                            <div class="cat-post-desc">
                                <h3><a href="{{ url('news/detail/'.$rows->id) }}">{{ $rows->name }}</a></h3>
                            </div>
                        </article>    
                    </div>
                    <!-- end other news -->
                <?php endforeach; ?>    
                </div>
                
                
            </div>
        </article>
     <!-- ========================================= -->   
    </div>
    
@endsection