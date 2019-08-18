<?php $this->load->view('commons/cabecalho'); ?>

<div class="container">
	<div class="page-header">
		<h1>Teste Unilab</h1>
	</div>
	<?php if ($this->session->flashdata('error') == TRUE): ?>
		<div class="alert alert-warning"><?php echo $this->session->flashdata('error'); ?></div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('success') == TRUE): ?>
		<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
	<?php endif; ?>

	<form method="post" action="<?=base_url('atualizar')?>" enctype="multipart/form-data">

		<div class="col-md-4">
			<div class="form-group">
				<label>Marca:</label>
				<input type="text" name="nome" class="form-control" value="<?=$contato['nome']?>" required/>
			</div>
		</div>

 	    <div class="col-md-4">
			<div class="form-group">
				<label>Tipo:</label>
				<select name="tipo" class="form-control" value="<?=$contato['tipo']?>" required/>
                  <option value="">Escolha a op&ccedil;&atilde;o do Tipo</option>
                  <option value="Pet">Pet</option>
                  <option value="Garrafa">Garrafa</option>
                  <option value="Lata">Lata</option>
                </select>
			</div>
		</div>
		 <div class="col-md-4">
			<div class="form-group">
				<label>Sabor:</label>
				<input type="text" name="sabor" class="form-control" value="<?=$contato['sabor']?>" required/>
			</div>
		</div>
		
		 <div class="col-md-4">
			<div class="form-group">
				<label>Litragem(mL ou L):</label>
               <select name="litragem" class="form-control" value="<?=$contato['litragem']?>" required/>
                  <option value="">Escolha a op&ccedil;&atilde;o da Litragem</option>
                  <option value="250 mL">250 mL</option>
                  <option value="600 mL">600 mL</option>
                  <option value="1L">1L</option>
                </select>
				
			</div>
		</div>
		

		 <div class="col-md-4">
			<div class="form-group">
              <label>Valor(R$)</labelth>
				<input type="number" name="valor" class="form-control" value="<?=$contato['valor']?>" required/>
			</div>
		</div>
		
		 <div class="col-md-4">
			<div class="form-group">
				<label>Quantidade:</label>
				<input type="number" name="quantidade" class="form-control" value="<?=$contato['quantidade']?>" required/>
			</div>
		</div>

		

	<div class="col-md-4">
			<label><em>Todos os campos são obrigatórios.</em></label>
			<div class="clearfix"></div>
			<input type="hidden" name="id" value="<?=$contato['id']?>"/>
			<input type="submit" value="Salvar" class="btn btn-success" />
            &nbsp;
			<a class='btn btn-primary' href="JavaScript: window.history.back();">Retornar</a>

		</div>
	</form>

</div>

<?php $this->load->view('commons/rodape'); ?>
