@extends('main')

@section('content')
<div class="main-journal-info">
	<h2>{{$journal->name}}</h2>
	<span class="j-desc">{{$journal->shortdesc(40)}}...</span>
</div>
<div class="accordion">
    <div class="accordion-section">
        <a class="accordion-section-title" href="#articledesc">Article description</a>
         
        <div id="articledesc" class="accordion-section-content">
        	<h2>Article description</h2><br />
			<p>{{$article->desc}}</p>    
		</div><!--end .accordion-section-content-->
        <a class="accordion-section-title" href="#articlestats">Article statistics</a>
         
        <div id="articlestats" class="accordion-section-content">
        	<h2>General statistics</h2><br />
        	<p>
        		<h4>This article has been viewed {{$article->views}} time(s)</h4>

				<h4>This article has been downloaded {{$article->downloads}} time(s)</h4>
        	</p>
        </div><!--end .accordion-section-content-->

        <a class="accordion-section-title" href="#thearticle">Read the article</a>
         
        <div id="thearticle" class="accordion-section-content main-article">
            <div class="pull-left">
                <h1 style="font-size: 30px; font-weight: bold;">{{$article->title}}</h1>
                <br />
                Article written by: 
                @foreach ($article->users as $user) 
                
                {{ $user->name }},

                @endforeach<br />
                Categories:  
                @foreach ($article->categories as $category)
                        <a href="#" class="category">{{$category->name}}</a> 
                        @if(!end($category))
                            |
                        @endif

                @endforeach<br />
                <br /><br />
            </div>
            <div class="pull-right">
                    <img src="{{ asset('/img/pdf-icon.png') }}" style="width: 50px; height: 50px; margin: 10px;">
                    <img src="{{ asset('/img/odt-icon.png') }}" style="width: 50px; height: 50px; margin: 10px;">
                    <img src="{{ asset('/img/word-icon.png') }}" style="width: 50px; height: 50px; margin: 10px;">
                </div>
            <div class="article-viewport">
				<div class="article-body">
					{!! $article->body !!}
				</div>
			</div>
				
		
        </div><!--end .accordion-section-content-->
    </div><!--end .accordion-section-->
</div><!--end .accordion-->


@endsection


@section('script')
<script type="text/javascript">
	$(document).ready(function() {
    function close_accordion_section() {
        $('.accordion .accordion-section-title').removeClass('active');
        $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
    }
 
    $('.accordion-section-title').click(function(e) {
        // Grab current anchor value
        var currentAttrValue = $(this).attr('href');
 
        if($(e.target).is('.active')) {
            close_accordion_section();
        }else {
            close_accordion_section();
 
            // Add active class to section title
            $(this).addClass('active');
            // Open up the hidden content panel
            $('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
        }
 
        e.preventDefault();
    });
});
</script>
@endsection