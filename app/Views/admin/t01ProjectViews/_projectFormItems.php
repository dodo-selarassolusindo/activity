		<div class="row">
			<div class="col-md-12 px-4">

				<div class="form-group row">
					<label for="nama" class="col-md-4 col-form-label">
						<?=lang('T01Projects.nama') ?>*
					</label>
					<div class="col-md-8">
						<textarea rows="3" id="nama" name="nama" required style="height: 10em;" class="form-control<?= (($ferr = session('formErrors.nama')) ? ' is-invalid' : '') ?>"><?=old('nama', $t01Project->nama) ?></textarea>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->
			</div><!--//.col -->

		</div><!-- //.row -->