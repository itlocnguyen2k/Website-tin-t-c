@extends("frontend.layout")
@section("do-du-lieu-vao-layout")
<div class="left-container">
<!-- ========================================= -->
<?php 
    //lay cac danh muc co tin tuc
    $categories = DB::select("select * from categories where id in (select category_id from news where categories.id = news.category_id) order by id desc");
 ?>
 @foreach($categories as $category)
    <!-- list category tin tuc -->
    <div class="row-fluid">
        <div class="marked-title">
            <h3><a href="#" style="color:white">{{ $category->name }}</a></h3>
        </div>
    </div>                    
    <div class="row-fluid">
        <div class="span2">
            <?php 
                //lay tin dau tien
                $firstNews = DB::table("news")->where("category_id","=",$category->id)->orderBy("id","desc")->first();
             ?>
           <!-- first news -->
            <article>
                <div class="post-thumb">
                    <a href="{{ url('news/detail/'.$firstNews->id) }}"><img src="{{ asset('upload/news/'.$firstNews->photo) }}" alt=""></a>
                </div>
                <div class="cat-post-desc">
                    <h3><a href="{{ url('news/detail/'.$firstNews->id) }}">{{ $firstNews->name }}</a></h3>
                    <p>{{ $firstNews->description }}</p>
                </div>
            </article>
            <!-- end first news -->
        </div>
        <div class="span2">
        <?php 
            //lay 3 tin moi nhat ke tiep sau tin dau tien
            $news = DB::table("news")->where("category_id","=",$category->id)->orderBy("id","desc")->offset(1)->limit(3)->get();
         ?>
         @foreach($news as $rows)
           <!-- list news -->
            <article class="twoboxes">
                <div class="right-desc">
                    <h3><a href="{{ url('news/detail/'.$rows->id) }}"><img src="{{ asset('upload/news/'.$rows->photo) }}" alt=""></a><a href="{{ url('news/detail/'.$rows->id) }}">{{ $rows->name }}</a></h3>  
                    <div class="clear"></div>    
                </div>
                <div class="clear"></div>
            </article>
            <!-- end list news -->
        @endforeach
        </div>
    </div>
    <div class="clear"></div>
    <!-- end list category tin tuc -->
@endforeach   
    
 <!-- ========================================= -->   
</div>

@endsection