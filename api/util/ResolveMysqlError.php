<?php
// util : resolve

/*
	Projeto: FlexPeak Tecnologia e Assessoria.
	Project Owner: FlexPeak Tecnologia e Assessoria.
	Desenvolvedor: Adelson Guimaraes Monteiro.
	Data de início: 2019-08-12T13:13:55.520Z.
	Data Atual: 12/08/2019.
*/

	/*resolve mysql erro*/
	function resolve ( $cod, $msgerror, $class, $metodo ) {
		$msg = "<strong>Atenção!</strong> Ocorreu um erro, por favor contate o suporte.";

		switch ( $cod ) {
			case '0001':
				$msg .= "<br><strong>[Código]:</strong> ". $cod;
				$msg .= "<br><strong>[Ocorrência]:</strong> Impossível remover este dado, existem ".$msgerror." registro(s) depente(s).";
				$msg .= "<br><strong>[Classe]:</strong> " . $class;
				$msg .= "<br><strong>[Metodo]:</strong> " . $metodo;
				// $msg .= "<br><strong>[Log]:</strong>: " . $msgerror;
				break;

			case '1054':
				$msg .= "<br><strong>[Código]:</strong> ". $cod;
				$msg .= "<br><strong>[Ocorrência]:</strong> Tentativa manipulação em um campo inexistente.";
				$msg .= "<br><strong>[Classe]:</strong> " . $class;
				$msg .= "<br><strong>[Metodo]:</strong> " . $metodo;
				$msg .= "<br><strong>[Log]:</strong>: " . $msgerror;
				break;

			case '1146':
				$msg .= "<br><strong>[Código]:</strong> ". $cod;
				$msg .= "<br><strong>[Ocorrência]:</strong> Tentativa acesso a uma tabela inexistente.";
				$msg .= "<br><strong>[Classe]:</strong> " . $class;
				$msg .= "<br><strong>[Metodo]:</strong> " . $metodo;
				$msg .= "<br><strong>[Log]:</strong> " . $msgerror;
				break;

			case '1452':
				$msg .= "<br><strong>[Código]:</strong> ". $cod;
				$msg .= "<br><strong>[Ocorrência]:</strong> Tentativa de cadastro de uma chave estrangeira inexistente.";
				$msg .= "<br><strong>[Classe]:</strong> " . $class;
				$msg .= "<br><strong>[Metodo]:</strong> " . $metodo;
				$msg .= "<br><strong>[Log]:</strong> " . $msgerror;
				break;

			case '1451':
				$msg .= "<br><strong>[Código]:</strong> ". $cod;
				$msg .= "<br><strong>[Ocorrência]:</strong> Tentativa de exclusão de dados que contém dependentes.";
				$msg .= "<br><strong>[Classe]:</strong> " . $class;
				$msg .= "<br><strong>[Metodo]:</strong> " . $metodo;
				$msg .= "<br><strong>[Log]:</strong> " . $msgerror;
				break;

			case '1064':
				$msg .= "<br><strong>[Código]:</strong> ". $cod;
				$msg .= "<br><strong>[Ocorrência]:</strong> Erro de Sintax no código SQL.";
				$msg .= "<br><strong>[Classe]:</strong> " . $class;
				$msg .= "<br><strong>[Metodo]:</strong> " . $metodo;
				$msg .= "<br><strong>[Log]:</strong> " . $msgerror;
				break;

			default:
				$msg .= "<br><strong>[Código]:</strong> ". $cod;
				$msg .= "<br><strong>[Ocorrência]:</strong>: Indefinida.";
				$msg .= "<br><strong>[Classe]:</strong> " . $class;
				$msg .= "<br><strong>[Metodo]:</strong> " . $metodo;
				$msg .= "<br><strong>[Log]:</strong> " . $msgerror;
				break;

		}
		return $msg;
	}

// Classe gerada com BlackCoffeePHP 2.0 - by Adelson Guimarães
?>