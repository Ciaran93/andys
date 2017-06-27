<div id="fh5co-events" data-section="events" style="background-image: url(images/slide_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="fh5co-overlay"></div>
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2 to-animate">
						<h2 class="heading">Featured Gin Recipies</h2>
						<p class="sub-heading">Prosecco cocktails are all the rage these days - but for those of us with a soft spot for Mother's Ruin, nothing beats a gin cocktail.

Whether you want a drink that's long or short, refreshing or sweet, gin is the perfect spirit.</p>
					</div>
				</div>
				<div class="row">
				    @foreach($blogPosts as $post)
						<div class="col-md-4">
							<div class="fh5co-event to-animate-2">
								<h3>{{ $post->title }}</h3>
								<span class="fh5co-event-meta">{{ $post->created_at }}</span>
								<img src="images/bramble.jpg" class="img-responsive" alt="Free HTML5 Templates by FREEHTML5.co">

								<p>{{  str_limit($post->body, 45) }}</p>
								<p><a href="/blog/{{$post->id}}" class="btn btn-primary btn-outline">Read More</a></p>
							</div>
						</div>
					@endforeach
					
				</div>
			</div>
		</div>