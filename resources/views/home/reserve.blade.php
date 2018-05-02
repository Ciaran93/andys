<div id="fh5co-contact" data-section="reservation">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="heading to-animate">Reserve a Table</h2>
						<!-- <p class="sub-heading to-animate">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p> -->
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
					@if($showSection->show_reservation)
					<div class="col-md-6 to-animate-2">
					<div id="reservation_form">
						<meta name="csrf-token" content="{{ csrf_token() }}">
						
								<h3>Reservation Form</h3>
								<div class="form-group ">
									<label for="name" class="sr-only">Name</label>
									<input name="name" id="name" class="form-control" placeholder="Name" type="text">
								</div>
								<div class="form-group ">
									<label for="email" class="sr-only">Email</label>
									<input name="email" id="email" class="form-control" placeholder="Email" type="email">
								</div>

								<div class="form-group ">
									<label for="telephone" class="sr-only">Telephone</label>
									<input name="telephone" id="telephone" class="form-control" placeholder="Telephone" type="number">
								</div>
								
								<div class="form-group ">
									<label for="date" class="sr-only">Date</label>
									<input id="date" name="date" class="form-control datepicker" placeholder="Date" type="text">
								</div>

								<div class="form-group ">
									<label for="date" class="sr-only">Time</label>
									<input id="time" class="form-control" placeholder="Time" type="text">
								</div>

								<div class="form-group ">
									<label for="message" class="sr-only">Message</label>
									<textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
								</div>
								<div class="form-group ">
									<!-- <input data-sitekey="6Lf01FYUAAAAABexgoOgwEacOkMleri0_1xgwFaf" data-callback="YourOnSubmitFn" class="btn btn-primary g-recaptcha" value="Send Message" type="submit"> -->
									<input id="reservation"  class="btn btn-primary g-recaptcha" value="Make Reservation" type="submit">
								</div>
						</div>
					</div>

					<div id="success_div">
						<h3>Thank you</h3>
						<p>Blah Blah we will email you back if something happens.</p>
					</div>
					@endif
				</div>
			</div>
		</div>

		
	</div>


