<?= $this->extend('Themes/'.config('Basics')->theme['name'].'/AdminLayout/defaultLayout') ?>
<?= $this->section('content');  ?>

	<?=view('Themes/_commonPartialsBs/_alertBoxes') ?>


	<!-- Info boxes -->
	<div class="row">
		<div class="col-lg-3 col-6">

			<div class="small-box bg-info">
				<div class="inner">
					<h3><?= $totalNrOfJenis; ?></h3>
					<p><?=lang('T00Jenis.jenis') ?></p>
				</div>
				<div class="icon">
					<i class="far fa-question-circle"></i>
				</div>
				<?= anchor(route_to('jenisList'), lang('Basic.global.MoreInfo').'  <i class="fas fa-arrow-circle-right"></i>', ['class'=>'small-box-footer']); ?>

			</div><!-- /.small-box -->


			<div class="small-box bg-warning">
				<div class="inner">
					<h3><?= $totalNrOfActivity; ?></h3>
					<p><?=lang('T30Activities.activity') ?></p>
				</div>
				<div class="icon">
					<i class="fas fa-globe"></i>
				</div>
				<?= anchor(route_to('activityList'), lang('Basic.global.MoreInfo').'  <i class="fas fa-arrow-circle-right"></i>', ['class'=>'small-box-footer']); ?>

			</div><!-- /.small-box -->

		</div><!-- /.col -->
		<div class="col-lg-3 col-6">

			<div class="small-box bg-success">
				<div class="inner">
					<h3><?= $totalNrOfProject; ?></h3>
					<p><?=lang('T01Projects.project') ?></p>
				</div>
				<div class="icon">
					<i class="far fa-question-circle"></i>
				</div>
				<?= anchor(route_to('projectList'), lang('Basic.global.MoreInfo').'  <i class="fas fa-arrow-circle-right"></i>', ['class'=>'small-box-footer']); ?>

			</div><!-- /.small-box -->


			<div class="small-box bg-success">
				<div class="inner">
					<h3><?= $totalNrOfDetailActivity; ?></h3>
					<p><?=lang('T31Activityds.detailActivity') ?></p>
				</div>
				<div class="icon">
					<i class="far fa-bookmark"></i>
				</div>
				<?= anchor(route_to('detailActivityList'), lang('Basic.global.MoreInfo').'  <i class="fas fa-arrow-circle-right"></i>', ['class'=>'small-box-footer']); ?>

			</div><!-- /.small-box -->

		</div><!-- /.col -->
		<div class="col-lg-3 col-6">

			<div class="small-box bg-warning">
				<div class="inner">
					<h3><?= $totalNrOfUser; ?></h3>
					<p><?=lang('T02Users.user') ?></p>
				</div>
				<div class="icon">
					<i class="fas fa-globe"></i>
				</div>
				<?= anchor(route_to('userList'), lang('Basic.global.MoreInfo').'  <i class="fas fa-arrow-circle-right"></i>', ['class'=>'small-box-footer']); ?>

			</div><!-- /.small-box -->

		</div><!-- /.col -->
		<div class="col-lg-3 col-6">

			<div class="small-box bg-danger">
				<div class="inner">
					<h3><?= $totalNrOfStatus; ?></h3>
					<p><?=lang('T03Status.status') ?></p>
				</div>
				<div class="icon">
					<i class="far fa-question-circle"></i>
				</div>
				<?= anchor(route_to('statusList'), lang('Basic.global.MoreInfo').'  <i class="fas fa-arrow-circle-right"></i>', ['class'=>'small-box-footer']); ?>

			</div><!-- /.small-box -->

		</div><!-- /.col -->
	</div><!-- /.row -->

<?= $this->endSection() ?>