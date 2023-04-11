		<div class="row">
			<div class="col-md-6 pr-4">

				<div class="form-group row">
					<label for="jenis" class="col-md-4 col-form-label">
						<?=lang('T30Activities.jenis') ?>*
					</label>
					<div class="col-md-8">
						<select id="jenis" name="jenis" required class="form-control select2bs" style="width: 100%;" >
							<option value=""><?=lang('Basic.global.pleaseSelectA', [lang('T30Activities.jenis')]) ?></option>

						<?php foreach ($jenisList as $item) : ?>
							<option value="<?=$item->id ?>"<?=$item->id==$t30Activity->jenis ? ' selected':'' ?>>
								<?=$item->nama ?>
							</option>
						<?php endforeach; ?>
						</select>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<label for="deskripsi" class="col-md-4 col-form-label">
						<?=lang('T30Activities.deskripsi') ?>*
					</label>
					<div class="col-md-8">
						<textarea rows="3" id="deskripsi" name="deskripsi" required style="height: 10em;" class="form-control<?= (($ferr = session('formErrors.deskripsi')) ? ' is-invalid' : '') ?>"><?=old('deskripsi', $t30Activity->deskripsi) ?></textarea>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<label for="modul" class="col-md-4 col-form-label">
						<?=lang('T30Activities.modul') ?>*
					</label>
					<div class="col-md-8">
						<textarea rows="3" id="modul" name="modul" required style="height: 10em;" class="form-control<?= (($ferr = session('formErrors.modul')) ? ' is-invalid' : '') ?>"><?=old('modul', $t30Activity->modul) ?></textarea>
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
					<label for="project" class="col-md-4 col-form-label">
						<?=lang('T30Activities.project') ?>*
					</label>
					<div class="col-md-8">
						<select id="project" name="project" required class="form-control select2bs" style="width: 100%;" >
							<option value=""><?=lang('Basic.global.pleaseSelectA', [lang('T30Activities.project')]) ?></option>

						<?php foreach ($projectList as $item) : ?>
							<option value="<?=$item->id ?>"<?=$item->id==$t30Activity->project ? ' selected':'' ?>>
								<?=$item->nama ?>
							</option>
						<?php endforeach; ?>
						</select>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<label for="user" class="col-md-4 col-form-label">
						<?=lang('T30Activities.user') ?>*
					</label>
					<div class="col-md-8">
						<select id="user" name="user" required class="form-control select2bs" style="width: 100%;" >
							<option value=""><?=lang('Basic.global.pleaseSelectA', [lang('T30Activities.user')]) ?></option>

						<?php foreach ($userList as $item) : ?>
							<option value="<?=$item->id ?>"<?=$item->id==$t30Activity->user ? ' selected':'' ?>>
								<?=$item->nama ?>
							</option>
						<?php endforeach; ?>
						</select>
					</div><!--//.col -->
				</div><!--//.form-group -->
			</div><!--//.col -->

		</div><!-- //.row -->