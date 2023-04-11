		<li class="nav-item">
			<?= anchor(route_to('jenisList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('T00Jenis.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('t00-jenis') ? ' active' : '')]); ?>
		</li>
		<li class="nav-item">
			<?= anchor(route_to('projectList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('T01Projects.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('t01-projects') ? ' active' : '')]); ?>
		</li>
		<li class="nav-item">
			<?= anchor(route_to('userList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('T02Users.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('t02-users') ? ' active' : '')]); ?>
		</li>
		<li class="nav-item">
			<?= anchor(route_to('statusList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('T03Status.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('t03-status') ? ' active' : '')]); ?>
		</li>
		<li class="nav-item">
			<?= anchor(route_to('activityList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('T30Activities.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('t30-activities') ? ' active' : '')]); ?>
		</li>
		<li class="nav-item">
			<?= anchor(route_to('detailActivityList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('T31Activityds.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('t31-activityds') ? ' active' : '')]); ?>
		</li>
