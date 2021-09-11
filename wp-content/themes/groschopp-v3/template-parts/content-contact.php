	<div id="contact" class="col-sm-12 col-md-9 pull-right">
		<h1>Contact</h1>
		<div class="row">
			<div class="col-sm-7">
				<div class="contact-details">
					<p>
						<a class="contact-phone" href="tel:712 722 4135">712.722.4135</a>
					</p>
					<p>
						<a class="contact-email-address" href="mailto:sales@groschopp.com">sales@groschopp.com</a>
					</p>
					<p>
						<a class="contact-phone" href="tel:800 829 4135">800.829.4135</a>  <span class="contact-details-label">toll-free</span>  |  712.722.1445  <span class="contact-details-label">fax</span>
					</p>
				</div>
				<div>
					<iframe src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=GROSCHOPP+Inc&amp;aq=&amp;sll=43.093932,-96.172042&amp;sspn=0.009354,0.021479&amp;ie=UTF8&amp;hq=GROSCHOPP+Inc&amp;hnear=&amp;cid=2587677713608573944&amp;ll=43.093964,-96.172256&amp;spn=0.112817,0.239639&amp;z=11&amp;iwloc=A&amp;output=embed&amp;iwloc=near" width="472" height="307" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
				</div>
			</div>
			<div class="col-sm-5">
				<h2 class="contact-subheading">Connect with <span class="groschopp-text-logo">Groschopp</span></h2>
				<form class="contact-form" method="post" action="<?php bloginfo('template_url'); ?>/form-action.php">
					<input type="hidden" name="form" value="contact" />
					<div class="form-group">
						<label class="sr-only" for="contact-name-input">Name</label>
						<input type="text" class="form-control" name="name" placeholder="Name" required />
					</div>
					<div class="form-group">
						<label class="sr-only" for="contact-tel-input">Phone Number</label>
						<input type="tel" class="form-control" name="phone" placeholder="Phone Number" required />
					</div>
					<div class="form-group">
						<label class="sr-only" for="contact-email-input">Email Address</label>
						<input type="email" class="form-control" name="email" placeholder="Email Address" required />
					</div>
					<div class="form-group">
						<label class="sr-only" for="contact-how-input">How did you hear about us?</label>
						<input type="text" class="form-control" name="how_did_you_hear_about_us" placeholder="How did you hear about us?" />
					</div>
					<div class="form-group">
						<label class="sr-only" for="contact-message-input">Message</label>
						<textarea class="form-control" name="message" placeholder="Message" required></textarea>
					</div>
					<div class="form-group sr-only">
						<label class="sr-only" for="contact-zipcode-input">Zipcode</label>
						<input type="text" class="form-control" name="zipcode" placeholder="Zipcode" />
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary contact-form-btn pull-right" value="send message" />
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php get_sidebar() ?>