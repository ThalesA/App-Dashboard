$(document).ready(() => {
	
	$('#documentacao').on('click', () => {
		//$('#pagina').load('documentacao.html');
		/*$.get('documentacao.html', data => {
			$('#pagina').html(data);
		});*/
		$.post('documentacao.php', data => {
			$('#pagina').html(data);
		});
	});

	$('#suporte').on('click', () => {
		//$('#pagina').load('suporte.html');
		/*$.get('suporte.html', data => {
			$('#pagina').html(data);
		});*/
		$.post('suporte.php', data => {
			$('#pagina').html(data);
		});
	});

	//ajax
	$('#competencia').on('change', (e) => {

		let competencia = $(e.target).val();
		//alert(competencia)
		$.ajax({
			type: 'GET',
			url: 'app.php',
			data: `competencia=${competencia}`,
			dataType: 'json',
			success: dados => {
				/*console.log(dados);*/
				$('#numeroVendas').html(dados.numeroVendas);
				$('#totalVendas').html(dados.totalVendas);
				$('#clientes_ativos').html(dados.clientes_ativos);
				$('#clientes_inativos').html(dados.clientes_inativos);
				$('#total_despesas').html(dados.total_despesas);
			},
			error: erro => {console.log('error')}
		});
		//método, url, dados, sucesso, erro
	});
})