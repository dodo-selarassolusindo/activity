		<div class="row">
			<div class="col-md-6 pr-4">

				<div class="form-group row">
					<label for="activity" class="col-md-4 col-form-label">
						<?=lang('T31Activityds.activity') ?>*
					</label>
					<div class="col-md-8">
						<select id="activity" name="activity" required class="form-control select2bs" style="width: 100%;" >
							<option value=""><?=lang('Basic.global.pleaseSelectA', [lang('T31Activityds.activity')]) ?></option>

						<?php foreach ($activityList as $item) : ?>
							<option value="<?=$item->id ?>"<?=$item->id==$t31Activityd->activity ? ' selected':'' ?>>
								<?=$item->deskripsi ?>
							</option>
						<?php endforeach; ?>
						</select>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<label for="mulai" class="col-md-4 col-form-label">
						<?=lang('T31Activityds.mulai') ?>
					</label>
					<div class="col-md-8">
						<input type="datetime-local" id="mulai" name="mulai" maxLength="20" class="form-control<?= ($ferr = session('formErrors.mulai')) ? ' is-invalid' : '' ?>" value="<?=old('mulai', $t31Activityd->mulai) ?>">
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->
			</div><!--//.col -->
			<div class="col-md-6 pl-4">

				<div class="form-group row">
					<label for="selesai" class="col-md-4 col-form-label">
						<?=lang('T31Activityds.selesai') ?>
					</label>
					<div class="col-md-8">
						<input type="datetime-local" id="selesai" name="selesai" maxLength="20" class="form-control<?= ($ferr = session('formErrors.selesai')) ? ' is-invalid' : '' ?>" value="<?=old('selesai', $t31Activityd->selesai) ?>">
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<label for="status" class="col-md-4 col-form-label">
						<?=lang('T31Activityds.status') ?>
					</label>
					<div class="col-md-8">

					<?php $i=0; ?>
					<?php foreach($statusList as $item) : ?>
						<?php $i++; ?>
						<div class="form-check">
							<label for="status_<?=$i; ?>" class="form-check-label">

								<input type="radio" id="status_<?=$i; ?>" name="status" value="<?=$item->id; ?>" class="form-check-input" <?= $t31Activityd->status == $item->id ? 'checked' : '' ?>>
								<?=$item->nama; ?>
							</label>
						</div><!--//.form-check -->
					<?php endforeach; ?>
					</div><!--//.col -->
				</div><!--//.form-group -->
			</div><!--//.col -->

		</div><!-- //.row -->