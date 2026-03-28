<?php
include_once "config/database.php";
include_once "objetos/produtos.php";

class ProdutoController {

    private $bd;
    private $produto;
    private $img_name;

    public function __construct() {
        $banco       = new Database();
        $this->bd    = $banco->conectar();
        $this->produto = new Produto($this->bd);
    }

    /* ───────── READ ───────── */
    public function index() {
        return $this->produto->lerTodos();
    }

    public function localizarProduto($id) {
        return $this->produto->buscarPorId($id);
    }

    public function pesquisarProduto($termo) {
        return $this->produto->pesquisar($termo);
    }

    /* ───────── CREATE ───────── */
    public function cadastrarProduto($dados, $arquivo) {
        $temArquivo = isset($arquivo['name']['fileToUpload'])
            && $arquivo['name']['fileToUpload'] !== ""
            && isset($arquivo['error']['fileToUpload'])
            && $arquivo['error']['fileToUpload'] === UPLOAD_ERR_OK;

        if ($temArquivo && !$this->upload($arquivo)) {
            return false;
        }

        if (!$temArquivo) {
            $this->img_name = null;
        }

        $this->produto->nome       = $dados["nome"];
        $this->produto->descricao  = $dados["descricao"];
        $this->produto->quantidade = $dados["quantidade"];
        $this->produto->preco      = $dados["preco"];
        $this->produto->categoria  = $dados["categoria"];
        $this->produto->img        = $this->img_name;

        if ($this->produto->cadastrar()) {
            header("location:index.php");
            exit();
        }
        return false;
    }

    /* ───────── UPDATE ───────── */
    public function atualizarProduto($dados, $arquivo) {
        $temArquivo = isset($arquivo['name']['fileToUpload'])
            && $arquivo['name']['fileToUpload'] !== ""
            && isset($arquivo['error']['fileToUpload'])
            && $arquivo['error']['fileToUpload'] === UPLOAD_ERR_OK;

        if ($temArquivo && !$this->upload($arquivo)) {
            return false;
        }

        if (!$temArquivo) {
            $this->img_name = $dados["img_atual"] ?? null; // ✅ só este bloco
        }

        $this->produto->id         = $dados["id"];
        $this->produto->nome       = $dados["nome"];
        $this->produto->descricao  = $dados["descricao"];
        $this->produto->quantidade = $dados["quantidade"];
        $this->produto->preco      = $dados["preco"];
        $this->produto->img        = $this->img_name;

        if ($this->produto->atualizar()) {
            header("location:index.php");
            exit();
        }
        return false;
    }

    /* ───────── DELETE ───────── */
    public function excluirProduto($id) {
        $this->produto->id = $id;
        if ($this->produto->excluir()) {
            header("location:index.php");
            exit();
        }
    }

    /* ───────── UPLOAD ───────── */
    public function upload($arquivo) {
        $target_dir   = "uploads/";
        $uploadOk     = 1;
        $target_file  = $target_dir . $arquivo["name"]['fileToUpload'];
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $random_name      = uniqid('img_', true) . '.' . $imageFileType;
        $this->img_name   = $random_name;
        $upload_file      = $target_dir . $random_name;

        // Verifica se é imagem
        if (getimagesize($arquivo['tmp_name']['fileToUpload']) === false) {
            $uploadOk = 0;
        }

        // Arquivo já existe
        if (file_exists($upload_file)) {
            $uploadOk = 0;
        }

        // Tamanho máx 500 KB
        if ($arquivo['size']['fileToUpload'] > 500000) {
            $uploadOk = 0;
        }

        // Tipos permitidos
        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
            $uploadOk = 0;
        }

        if ($uploadOk === 0) {
            return false;
        }

        return move_uploaded_file($arquivo['tmp_name']['fileToUpload'], $upload_file);
    }
}