<?php
require_once('cabecalho.php');
?>
		<!-- paginas -->
		<div class="main" id="pagina">
		    
		    <div class="container">

		    	<div class="row">
		    		<div class="col">
						
						<form>
							<div class="form-group row">
								<label class="col-sm-9 col-form-label">Competência:</label>
								<div class="col-sm-3">
									<select class="form-control-plaintext" id="competencia">
										<option value="">-- Selecione </option>
										<option value="2019-08">Agosto / 2019</option>
										<option value="2019-09">Setembro / 2019</option>
										<option value="2019-10">Outubro / 2019</option>
									</select>
								</div>
							</div>
						</form>

						<hr />

		    		</div>
		    	</div>
		    	
		    	<div class="row mb-3">
		    		<div class="col-md-4">
		    			<div class="card">
							<div class="card-header">
								Número de vendas
							</div>
							<div class="card-body">
								 <h5 class="card-title" id="numeroVendas">?</h5>
							</div>
						</div>
					</div>

					<div class="col-md-4">
		    			<div class="card">
							<div class="card-header">
								Total de vendas
							</div>
							<div class="card-body">
								 <h5 class="card-title" id="totalVendas">?</h5>
							</div>
						</div>
		    		</div>

				</div>

				<div class="row mb-3">
					<div class="col-md-4">
		    			<div class="card">
							<div class="card-header">
								Clientes ativos
							</div>
							<div class="card-body">
								 <h5 class="card-title" id="clientes_ativos">?</h5>
							</div>
						</div>
					</div>

					<div class="col-md-4">
		    			<div class="card">
							<div class="card-header">
								Clientes inativos
							</div>
							<div class="card-body">
								 <h5 class="card-title" id="clientes_inativos">?</h5>
							</div>
						</div>
		    		</div>
		    	</div>

		    	<div class="row mb-3">
					<div class="col-md-4">
		    			<div class="card">
							<div class="card-header">
								Total de reclamações
							</div>
							<div class="card-body">
								 <h5 class="card-title">?</h5>
							</div>
						</div>
					</div>
					
					<div class="col-md-4">
		    			<div class="card">
							<div class="card-header">
								Total de elogios
							</div>
							<div class="card-body">
								 <h5 class="card-title">?</h5>
							</div>
						</div>
		    		</div>

		    		<div class="col-md-4">
		    			<div class="card">
							<div class="card-header">
								Total de sugestões
							</div>
							<div class="card-body">
								 <h5 class="card-title">?</h5>
							</div>
						</div>
		    		</div>
		    	</div>

		    	<div class="row mb-3">
					<div class="col-md-4">
		    			<div class="card">
							<div class="card-header">
								Total de despesas
							</div>
							<div class="card-body">
								 <h5 class="card-title" id="total_despesas">?</h5>
							</div>
						</div>
					</div>
		    	</div>
		    </div>

		</div>
<?php
require_once('rodape.php');
?>