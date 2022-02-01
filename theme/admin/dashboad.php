<?php $this->layout("admin/_theme", [
	'title' => isset($title) ? $title : '', 
	'user' => isset($user) ? $user : ''
]) ?>

<!-- <?php var_dump(isset($classNavigate), $classNavigate);?> -->

<?php if(isset($message)): ?>
	<div class="row">
		<div class="col alert alert-info">
		  <span class="text-white"><?= $message?></span>
		</div>
	</div>
<?php  endif; ?>


