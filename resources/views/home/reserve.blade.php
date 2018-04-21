<div id="fh5co-contact" data-section="reservation">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="heading to-animate">Reserve a Table</h2>
						<p class="sub-heading to-animate">Want to reserve a table, send us a message below and we will get back to you.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 to-animate-2">
						<h3>Contact Info</h3>
						<ul class="fh5co-contact-info">
							<li class="fh5co-contact-address ">
								<i class="icon-home"></i>
								12 Market Street, Monaghan,<br>Ireland
							</li>
							<li><i class="icon-phone"></i>+353 47 82277</li>
							<li><i class="icon-envelope"></i>info@andys.com</li>
							<!--<li><i class="icon-globe"></i> <a href="http://freehtml5.co/" target="_blank">freehtml5.co</a></li>-->
						</ul>
					</div>
					<div class="col-md-6 to-animate-2" id="reservation_form">
						<h3>Reservation Form</h3>
						
							{{ Form::open(array('route' => 'reservation.email', 'class' => 'form')) }}
								<div class="form-group">
									{{Form::text('name',null, array( 'class' => 'form-control', 'placeholder' => 'Name'))}}
								</div>

								<div class="form-group">
									{{Form::text('email',null, array( 'class' => 'form-control', 'placeholder' => 'Email'))}}
								</div>

								<div class="form-group">
									{{Form::date('date',null, array( 'class' => 'form-control', 'placeholder' => 'Date'))}}
								</div>

								<div class="form-group">
									{{Form::time('time',null, array( 'class' => 'form-control', 'placeholder' => 'time'))}}
								</div>

								<div class="form-group">
									{{Form::text('message',null, array( 'class' => 'form-control', 'placeholder' => 'Message'))}}
								</div>
								
								<br>
									{{ Form::submit('Add Item', array('class' => 'btn btn-success btn-lg'))}}
									
								<div class="form-group ">
									<input class="btn btn-primary" value="Reservation" onClick="emailReservation();" >
								</div>
							{{ Form::close() }}
		
						
						</div>
				</div>

				<div class="col-md-6 to-animate-2" id="email_success" style="display:none;">
						<h3>Thank You</h3>

							<p>Thank you for your reservation request, we will email you back to confirm your booking.</p>
						</div>
				</div>
			</div>
		</div>

	</div>


	<script type="text/javascript" src="{{ URL::asset('js/home.js') }}"></script>

