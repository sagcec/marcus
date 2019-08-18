<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	/**
  * Marcus Paulo:: Carrega a home
  */
	public function Index()
	{
		// Recupera os contatos através do model
		$contatos = $this->contatos_model->GetAll('nome');
		// Passa os contatos para o array que será enviado à home
		$dados['contatos'] =$this->contatos_model->Formatar($contatos);
		// Chama a home enviando um array de dados a serem exibidos
		$this->load->view('home',$dados);

	}
	
	function searchBooks() {
    $postlist['bookSearch'] = $this->view_book_model->getSearchBook($this->input->post('search'));
    $this->load->view('searchbooks.php', $postlist);
    }

    function getSearchBook($searchBook) {
    if(empty($searchBook))
       return array();

         $result = $this->db->like('nome', $searchBook)
             ->or_like('tipo', $searchBook)
             ->get('contatos');

            return $result->result();
       }

	/**
  * Processa o formulário para salvar os dados
  */
	public function Salvar(){

		// Recupera os contatos através do model
		$contatos = $this->contatos_model->GetAll('nome');
		// Passa os contatos para o array que será enviado à home
		$dados['contatos'] =$this->contatos_model->Formatar($contatos);
		// Executa o processo de validação do formulário
		$validacao = self::Validar();

		// Verifica o status da validação do formulário
		// Se não houverem erros, então insere no banco e informa ao usuário
		// caso contrário informa ao usuários os erros de validação

		if($validacao){
			// Recupera os dados do formulário
			$contato = $this->input->post();
			// Insere os dados no banco recuperando o status dessa operação
			$status = $this->contatos_model->Inserir($contato);
			// Checa o status da operação gravando a mensagem na seção
			if(!$status){
				$this->session->set_flashdata('error', 'Não foi possível inserir o contato.');
			}else{
				$this->session->set_flashdata('success', 'Contato inserido com sucesso.');
				// Redireciona o usuário para a home
				redirect();
			}
		}else{
			$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
		}
		// Carrega a home
		$this->load->view('home',$dados);

	}

	/**
  * Carrega a view para edição dos dados
  */
	public function Editar(){
		// Recupera o ID do registro - através da URL - a ser editado
		$id = $this->uri->segment(2);
		// Se não foi passado um ID, então redireciona para a home
		if(is_null($id))
			redirect();

		// Recupera os dados do registro a ser editado
		$dados['contato'] = $this->contatos_model->GetById($id);

		// Carrega a view passando os dados do registro
		$this->load->view('editar',$dados);

	}

	/**
  * Processa o formulário para atualizar os dados
  */
	public function Atualizar(){

		// Realiza o processo de validação dos dados
		$validacao = self::Validar('update');

		// Verifica o status da validação do formulário
		// Se não houverem erros, então insere no banco e informa ao usuário
		// caso contrário informa ao usuários os erros de validação
		if($validacao){
			// Recupera os dados do formulário
			$contato = $this->input->post();
			// Atualiza os dados no banco recuperando o status dessa operação
			$status = $this->contatos_model->Atualizar($contato['id'],$contato);
			// Checa o status da operação gravando a mensagem na seção
			if(!$status){
				$dados['contato'] = $this->contatos_model->GetById($contato['id']);
				$this->session->set_flashdata('error', 'Não foi possível atualizar o contato.');
			}else{
				$this->session->set_flashdata('success', 'Contato atualizado com sucesso.');
				// Redireciona o usuário para a home
				redirect();
			}
		}else{
			$this->session->set_flashdata('error', validation_errors());
		}

		// Carrega a view para edição
		$this->load->view('editar',$dados);
	}

	/**
  * Realiza o processo de exclusão dos dados
  */
	public function Excluir(){
		// Recupera o ID do registro - através da URL - a ser editado
		$id = $this->uri->segment(2);
		// Se não foi passado um ID, então redireciona para a home
		if(is_null($id))
			redirect();

		// Remove o registro do banco de dados recuperando o status dessa operação
		$status = $this->contatos_model->Excluir($id);

		// Checa o status da operação gravando a mensagem na seção
		if($status){
			$this->session->set_flashdata('success', '<p>Contato excluído com sucesso.</p>');
		}else{
			$this->session->set_flashdata('error', '<p>Não foi possível excluir o contato.</p>');
		}
		// Redirecionao o usuário para a home
		redirect();
	}
	
		public function ExcluirTodos(){

		// Remove o registro do banco de dados recuperando o status dessa operação
		$status = $this->contatos_model->Excluir($id);

		// Checa o status da operação gravando a mensagem na seção
		if($status){
			$this->session->set_flashdata('success', '<p>Contatos excluídos com sucesso.</p>');
		}else{
            $checkbox = $_POST["CheckBox"] ? "Marcado (true)" : "Desmarcado (false)";
            echo $checkbox; // Imprimo a resposta.
			$this->session->set_flashdata('error', '<p>Não foi possível excluir os contatos.</p>');
		}
		// Redirecionao o usuário para a home
		redirect();
	}

	/**
  * Valida os dados do formulário
  *
  * @param string $operacao Operação realizada no formulário: insert ou update
  *
  * @return boolean
  */
	private function Validar($operacao = 'insert'){
		// Com base no parâmetro passado
		// determina as regras de validação


		switch($operacao){
			case 'insert':
			

			    $rules['nome'] = array('trim', 'required', 'min_length[3]','max_length[30]','is_unique[contatos.nome]');
  	            $rules['tipo'] = array('trim', 'required', 'min_length[3]');
				$rules['sabor'] = array('trim', 'required', 'min_length[3]');
				$rules['litragem'] = array('trim', 'required', 'min_length[1]');
				$rules['valor'] = array('trim', 'required', 'min_length[1]');
				$rules['quantidade'] = array('trim', 'required', 'min_length[1]');

				break;
			case 'update':
                $rules['nome'] = array('trim', 'required', 'min_length[3]');
                $rules['tipo'] = array('trim', 'required', 'min_length[3]');
				$rules['sabor'] = array('trim', 'required', 'min_length[3]');
				$rules['litragem'] = array('trim', 'required', 'min_length[1]');
				$rules['valor'] = array('trim', 'required', 'min_length[1]');
				$rules['quantidade'] = array('trim', 'required', 'min_length[1]');

				break;
			default:
                $rules['nome'] = array('trim', 'required', 'min_length[4]');
				$rules['tipo'] = array('trim', 'required', 'min_length[3]');
				$rules['sabor'] = array('trim', 'required', 'min_length[3]');
				$rules['litragem'] = array('trim', 'required', 'min_length[1]');
				$rules['valor'] = array('trim', 'required', 'min_length[1]');
				$rules['quantidade'] = array('trim', 'required', 'min_length[1]');

				break;
		}

		$this->form_validation->set_rules('nome', 'Nome', $rules['nome']);
		$this->form_validation->set_rules('tipo', 'Tipo', $rules['tipo']);
		$this->form_validation->set_rules('sabor', 'Sabor', $rules['sabor']);
		$this->form_validation->set_rules('litragem', 'Litragem', $rules['litragem']);
		$this->form_validation->set_rules('valor', 'Valor', $rules['valor']);
		$this->form_validation->set_rules('quantidade', 'Quantidade', $rules['quantidade']);

		// Executa a validação e retorna o status
		return $this->form_validation->run();
	}

}
