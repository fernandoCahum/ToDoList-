<?php
print('
		<div class="container">
			<div class="row">
				<div class="col s12 m10 offset-m1 l6 offset-l3">
					<div class="card-panel primary-color">
						<div class="row">
							<form method="post" class="col s12">
								<div class="row">
									<div class="input-field col s12">
										<input id="email" type="email" name="email" class="validate primary-text">
										<label class="white-text" for="email">Email</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 ">
										<input id="password" type="password" name="pass" class="validate primary-text">
										<label class="white-text" for="password">Password</label>
									</div>
								</div>
								<button class="waves-effect waves-light btn-large orange accent-4 btn__login">Login</button>
		');
								if( isset($_GET['error']) ) {
									$template = '
										<div class="row">
											<p class="item  error col s12">%s</p>
										</div>
									';
									printf($template, $_GET['error']);
								}
		print('
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
');

