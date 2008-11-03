<?php
/**
 * Subview view for project list
 *
 * @var $projects  Array of projects
 */
?>
<ul id="project-list">
	<?php foreach ($projects as $project):?> 
	<li><a href="<?=url::site('project/view/'.$project->id);?>">
		<div class="client"><?=$project->client->company_name?></div>
		<div class="name"><?=$project->name?></div>
		<div class="task-count">ACTIVE TICKETS: <strong><?=count($project->find_related('tickets'));?></strong></div>
	</a></li>
	<?php endforeach?>
</ul>