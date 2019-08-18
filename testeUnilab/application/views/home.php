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

	<form method="post" action="<?=base_url('salvar')?>" enctype="multipart/form-data" name="formulario">
  	    <div class="col-md-4">
			<div class="form-group">
				<label>Marca:</label>
				<input type="text" name="nome" class="form-control" value="<?=set_value('nome')?>" required/>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Tipo:</label>
               	<select name="tipo" class="form-control" value="<?=set_value('tipo')?>" required/>
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
				<input type="text" name="sabor" class="form-control" value="<?=set_value('sabor')?>" required/>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Litragem(mL ou L):</label>
				<select name="litragem" class="form-control" value="<?=set_value('litragem')?>" required/>
                  <option value="">Escolha a op&ccedil;&atilde;o da Litragem</option>
                  <option value="250 mL">250 mL</option>
                  <option value="600 mL">600 mL</option>
                  <option value="1L">1L</option>
                </select>
			</div>
		</div>
			<div class="col-md-4">
			<div class="form-group">
				<label>Valor:</label>
				<input type="number" name="valor"  class="form-control" value="<?=set_value('valor')?>" required/>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Quantidade:</label>
				<input type="number" name="quantidade" class="form-control" value="<?=set_value('quantidade')?>" required/>
			</div>
		</div>
		<div class="col-md-4">
			<label><em>Todos os campos são obrigatórios.</em></label>
			<div class="clearfix"></div>
			<input type="submit" value="Salvar" class="btn btn-success" />
		</div>
	 </form>
	  </div>
       <div class="col-md-12">

          <p style="text-align:right">
           <img src="<?=base_url('assets/images/unici/lupa.png')?>" height="20" width="20" title="Digite no campo para localizar os dados"/>
           &nbsp;<input id="myInput" type="text" size="25" maxlength="100" class="form-control-plaintext" placeholder="Digite para localizar...">
          </p>
		<table class="table table-striped table-hover table-bordered">
        <br>
			<thead>
				<tr>
					<th>
                     <p><input type="checkbox" id="checkTodos" name="checkTodos"> Selecionar Todos</p>

					</th>
                    <th>Marca</th>
    				<th>Tipo</th>
					<th>Sabor</th>
					<th>Litragem</th>
					<th>Valor[R$]</th>
					<th>Quantidade</th>
					<th>Operações</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php if ($contatos == FALSE): ?>
					<tr><td colspan="2">Nenhum dado encontrado</td></tr>
				<?php else: ?>
					<?php foreach ($contatos as $row): ?>
						<tr>
                            <td><input type=checkbox name="UIDL[]" value="<?= $row['id'] ?>"></td>

                         	<td><?= $row['nome'] ?></td>
							<td><?= $row['tipo'] ?></td>
							<td><?= $row['sabor'] ?></td>
							<td><?= $row['litragem'] ?></td>
							<td><?= $row['valor'] ?></td>
							<td><?= $row['quantidade'] ?></td>



							<td class="text-center">

                             <a href="<?= $row['editar_url'] ?>"><img src="<?=base_url('assets/images/unici/edit.png')?>" height="20" width="20" title="Editar dados" /></a> <a href="<?= $row['excluir_url'] ?>"><img src="<?=base_url('assets/images/unici/deletar.png')?>" height="20" width="20" title="Deletar dados" /></a> </a></td>


						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
		
		<tbody>
        <tr>
            <td colspan="3" align="center">
                <button id="anterior" disabled> &lsaquo; Anterior</button>
                 <span id="numeracao"></span>
                   <button id="proximo" disabled> Pr&oacute;ximo &rsaquo;</button>
                      <div class="col-md-4">
                         <input type="submit" value="Excluir todos" class="btn btn-warning" />
                      </div>
            </td>
        </tr>
    </tbody>
</table>
<div>
	</div>


</div><br><br>



<center><?php $this->load->view('commons/rodape'); ?></center>





</body>
</html>



