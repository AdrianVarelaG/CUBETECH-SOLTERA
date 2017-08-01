<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Consulta almacenes materiales'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Consulta almacenes materiales'); ?></li>
  </ol>
</section>

<?php
  echo $this->element('InventarioMateriales');
  echo $this->Html->script('InventarioMateriales.js');
?>
