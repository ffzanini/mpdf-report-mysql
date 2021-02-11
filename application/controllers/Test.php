<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model("test_model"); 
	}

	public function index() {
		// Instancia a Classe apontando uma configuração
		$data['title'] = "Test Report";
		$data['alltests'] = $this->test_model->returnAllData();

    // que nesse caso é a orientação da página para Landscape
    $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
    // Recupera o código HTML da view sem exibí-lo na tela
    $conteudoPDF = $this->load->view('test', $data, true);
    // Informa o código HTML da view para a biblioteca
    $mpdf->WriteHTML($conteudoPDF);
    // Abre o PDF na tela
    $mpdf->Output();
	}
}
