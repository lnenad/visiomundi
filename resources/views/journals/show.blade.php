@extends('main')

@section('content')
<div class="home-featured cl">
		<div class="featured-left" id="entryinfo">
            	<h2 class="title-featured">Entry information</h2>
            <div class="fl-content">
            	
				<img width="200" height="320" src="{{$journal->image}}" class="attachment-shop_catalog wp-post-image" alt="Zbirka zadataka iz hemije">
			
				<h3 class="item-e-title"><b>Name of the journal: </b> {{$journal->name}}</h3>
				<span class="item-meta">
	            Authors: <b>JAKO VAZNO</b><br /> 
	            Date: {{$journal->updated_at}}<br />
	            Current Volume: {{$journal->volume}}<br />
				Publishing Schedule: Continuous Publication<br />
				Contact: {{$journal->contact_email}}<br />
	            </span>
            </div>
        </div>

	<div class="featured-leftright" id="flr-entry">

		<h2 class="title-featured">Open access journal</h2>
		<!-- Title -->
		<div class="fl-content">
        	<h1 class="title-main">{{$journal->name}}</h1>

    
		    <div class="tabs">
		    <ul class="tab-links">
		        <li class="active"><a href="#tab1">Articles</a></li>
		        <li><a href="#tab2">About</a></li>
		        <li><a href="#tab3">Contact</a></li>
		        <li><a href="#tab4" style="width:100px;">Editorial board</a></li>
		    </ul>
		 
		    <div class="tab-content">
		        <div id="tab1" class="tab active"><br />
		        @foreach ($articles as $article)
			        <div class="article-instance">
			            <h2><a href="{{ route('journals.articles.show', [$journal->slug,$article->slug]) }}">{{$article->title}}</a></h2>
			            <p>{{$article->desc}}</p>
			            <h4>
			            Categories: 
			            @foreach ($article->categories as $category)
			            <a href="#" class="category">{{$category->name}}</a> 
			            @endforeach<br />
			            Published on: {{$article->created_at}}<br />
			            Viewed {{$article->views}} times. Downloaded {{$article->downloads}} times<br /></h4>
			        </div>
			        <div class="border-bottom"></div>
		        @endforeach
		        </div>
		 
		        <div id="tab2" class="tab">
		            <p>{{$journal->about}}</p>
		        </div>
		 
		        <div id="tab3" class="tab">
		            {{$journal->contact_info}}
		        </div>
		 
		        <div id="tab4" class="tab">
		            <p>Tab #4 content goes here!</p>
		            <p>Donec pulvinar neque sed semper lacinia. Curabitur lacinia ullamcorper nibh; quis imperdiet velit eleifend ac. Donec blandit mauris eget aliquet lacinia! Donec pulvinar massa interdum risus ornare mollis. In hac habitasse platea dictumst. Ut euismod tempus hendrerit. Morbi ut adipiscing nisi. Etiam rutrum sodales gravida! Aliquam tellus orci, iaculis vel.</p>
		       	 </div>
		    	</div>
			</div>
		</div>
	</div>
</div>

		


@endsection