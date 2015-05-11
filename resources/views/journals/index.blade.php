@extends('main')

@section('content')
<section class="content-area no-sidebar" id="primary">
	<div id="content" class="site-content hfeed">
	
		<div class="home-featured cl">
			<div class="featured-left">
            <h2 class="title-featured">Categories</h2>
            	<div class="fl-content">
            		<ul class="catnav">
            			<li><a href="#">Architecture</a></li>
                		<li><a href="#">Agriculture</a></li>
                        <li><a href="#">Biology</a></li>
                        <li><a href="#">Computer science</a></li>
                        <li><a href="#">Dermatology</a></li>
                        <li><a href="#">Medicine</a></li>
                    </ul>
                
                </div>
            
            </div>
            <h2 class="title-featured">Open access journals</h2>
				
			<!-- Get Featured Product -->
								
			<div class="featured-leftright">
				<ul class="journals wrap-items">
					<div class="row">
					@foreach ($journals as $journal)
						<li class="col-md-3 journal-entry" name="{{ $journal->name }}" >
							<a href="{{ route('journals.show', $journal->slug) }}">
							<img class="journal-img" src="{{$journal->image}}" />
							<div id="journal-img-title"></div>
							<h3></h3></a>
						</li>
					@endforeach
					</a>
				</ul>
			</div>
		</div>
	</div>
@endsection