<section class="content-header">
  <h1>
    Sistema de gestión
    <small><?php echo __('Clientes'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->Html->url('/Dashboard/')?>"><i class="fa fa-newspaper-o"></i> Inicio</a></li>
    <li class="active"><?php echo __('Clientes'); ?></li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Add Cliente'); ?></h3>
                    <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php echo $this->Form->create('Cliente', array('class'=>'form-horizontal')); ?>
					<div class='row'>
							<div class='col-md-12'>
								<?php

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clienteempresa_id">Empresa</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('empresa_id', array('id'=>'Clienteempresa_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clienteempresasrucusale_id">Sucursal</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('empresasurcusale_id', array('id'=>'Clienteempresasrucusale_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clientenombre">Nombre</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('nombre', array('id'=>'Clientenombre', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'onBlur'=>'validar_nombre_cliente();'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clienteuser_id">Vendedor</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('user_id', array('id'=>'Clienteuser_id', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clientetelefono">Teléfono</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('telefono', array('id'=>'Clientetelefono', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'type'=>'number', 'maxlength'=>'10'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clientecelular">Celular</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('celular', array('id'=>'Clientecelular', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'type'=>'number', 'maxlength'=>'10'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clientenombre_contacto">Nombre contacto</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('nombre_contacto', array('id'=>'Clientenombre_contacto', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clienteemail">Email</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('email', array('id'=>'Clienteemail', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clientefecha_alta">Fecha alta</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('fecha_alta', array('id'=>'Clientefecha_alta', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clienterequiere_factura"></label>';
echo'<div class="col-md-9">';
echo $this->Form->input('requiere_factura', array('options'=>array('1'=>' Si ', '2'=>' No '), 'value'=>2,  'type'=>'radio', 'id'=>'Clienterequiere_factura', 'div'=>false, 'label'=>false, 'class'=>'', 'onclick'=>'activa_requiere_factura(this.value);'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clienterazon_social">Razón social</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('razon_social', array('id'=>'Clienterazon_social', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clientecalle">Calle</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('calle', array('id'=>'Clientecalle', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clientenumero_exterior">Número exterior</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('numero_exterior', array('id'=>'Clientenumero_exterior', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clientenumero_interior">Número interior</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('numero_interior', array('id'=>'Clientenumero_interior', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clientecolonia">Colonia</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('colonia', array('id'=>'Clientecolonia', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clientecod_postal">código postal</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('cod_postal', array('id'=>'Clientecod_postal', 'div'=>false, 'label'=>false, 'class'=>'form-control'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clienterfc">Rfc</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('rfc', array('id'=>'Clienterfc', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'onBlur'=>'validar_nombre_rfc();'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clientedirepai_id">Pais</label>';
echo'<div class="col-md-9">';
echo $this->Form->input('direpai_id', array('id'=>'Clientedirepai_id', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'empty'=>'--Seleccione--', "onChange"=>"selectTagRemote('".$this->Html->url('/Clientes/estado')."', 'div-estados', this.value);"));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clientedireprovincia_id">Estado</label>';
echo'<div class="col-md-9" id="div-estados">';
echo $this->Form->input('direprovincia_id', array('id'=>'Clientedireprovincia_id', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'empty'=>'--Seleccione--'));
echo '</div>';
echo '</div>';

echo'<div class="form-group">';
echo'<label class="control-label col-md-2" for="Clientedirmunicipio_id">Municipio</label>';
echo'<div class="col-md-9" id="div-municipios">';
echo $this->Form->input('dirmunicipio_id', array('id'=>'Clientedirmunicipio_id', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'empty'=>'--Seleccione--'));
echo '</div>';
echo '</div>';
	?>
							</div>
							<div class="col-md-12">
								<div class="form-group">
	                                <div class="col-md-12">
	                                    <?php echo $this->Html->link(__('Volver'), array('action' => 'index')); ?>	                                    <input value="Guardar" class="btn btn-primary pull-right" type="submit">
	                                </div>
	                            </div>
                            </div>
					</div></form>                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<?php /* ?>	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
				<li><?php echo $this->Html->link(__('List Clientes'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresasurcusales'), array('controller' => 'empresasurcusales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresasurcusale'), array('controller' => 'empresasurcusales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Direpais'), array('controller' => 'direpais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Direpai'), array('controller' => 'direpais', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Direprovincias'), array('controller' => 'direprovincias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Direprovincia'), array('controller' => 'direprovincias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dirmunicipios'), array('controller' => 'dirmunicipios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dirmunicipio'), array('controller' => 'dirmunicipios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
<?php */ ?>
