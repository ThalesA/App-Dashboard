<?php

//classe dashboard
class Dashboard {

	public $data_inicio;
	public $data_fim;
	public $numeroVendas;
	public $totalVendas;
	public $clientes_ativos;
	public $clientes_inativos;
	public $total_despesas;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		return $this->$atributo = $valor;
	}
}

class Conexao {
	private $host = 'localhost';
	private $dbname = 'dashboard';
	private $user = 'root';
	private $pass = '';

	public function conectar() {
		try {
			$conexao = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname",
				"$this->user",
				"$this->pass"
			);

			$conexao->exec('set charset set utf8');

			return $conexao;

		} catch(PDOException $e) {
			echo '<p>'.$e->getMessege().'</p>';
		}
	}
}


class Bd {
	private $conexao;
	private $dashboard;

	public function __construct(Conexao $conexao, Dashboard $dashboard) {
		$this->conexao = $conexao->conectar();
		$this->dashboard = $dashboard;
	}

	public function getNumeroVendas() {
		$query = '
		select 
			count(*) as numero_vendas 
		from 
			tb_vendas 
		where 
			data_venda between ? and ?';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->dashboard->__get('data_inicio'));
		$stmt->bindValue(2, $this->dashboard->__get('data_fim'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->numero_vendas;
	}

	public function getTotalVendas() {
		$query = '
		select 
			SUM(total) as total_vendas 
		from 
			tb_vendas 
		where 
			data_venda between ? and ?';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->dashboard->__get('data_inicio'));
		$stmt->bindValue(2, $this->dashboard->__get('data_fim'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;
	}

	public function getClientesAtivos() {
		$query = '
		select 
			count(*) as ativos
		from 
			tb_clientes 
		where 
			cliente_ativo = ?';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->dashboard->__get('clientes_ativos'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->ativos;
	}

	public function getClientesInativos() {
		$query = '
		select 
			count(*) as inativos
		from 
			tb_clientes 
		where 
			cliente_ativo = ?';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->dashboard->__get('clientes_inativos'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->inativos;
	}

	public function getTotalDespesas() {
		$query = '
		select 
			sum(total) as total 
		from 
			tb_despesas 
		where 
			data_despesa between ? and ?';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->dashboard->__get('data_inicio'));
		$stmt->bindValue(2, $this->dashboard->__get('data_fim'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->total;
	}
}
//print_r($_POST);
//lógica do script
$dashboard = new Dashboard();

$conexao = new Conexao();

$competencia = explode('-', $_GET['competencia']);
$ano = $competencia[0];
$mes = $competencia[1];

$dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

$dashboard->__set('data_inicio', $ano.'-'.$mes.'-01');
$dashboard->__set('data_fim', $ano.'-'.$mes.'-'.$dias_do_mes);
$dashboard->__set('clientes_ativos', '1');
$dashboard->__set('clientes_inativos', '0');

$bd = new Bd($conexao, $dashboard);

$dashboard->__set('numeroVendas', $bd->getNumeroVendas());
$dashboard->__set('totalVendas', $bd->getTotalVendas());
$dashboard->__set('clientes_ativos', $bd->getClientesAtivos());
$dashboard->__set('clientes_inativos', $bd->getClientesInativos());
$dashboard->__set('total_despesas', $bd->getTotalDespesas());
echo json_encode($dashboard);

?>