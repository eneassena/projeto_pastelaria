<?php $this->layout("admin/index", ['title' => $title, 'message' => isset($message) ? $message: null]) ?>

 
<div class="container">
  
  <?= $this->insert('admin/forms/auth/login') ?>

</div>














