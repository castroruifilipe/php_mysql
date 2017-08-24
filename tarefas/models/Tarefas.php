<?php

class Tarefas {

    public $mysqli;
    public $tarefas = array();
    public $tarefa;


    public function __construct($novo_mysqli) {
        $this->mysqli = $novo_mysqli;
    }

    function get_tarefas() {
        $sqlSelect = 'SELECT * FROM Tarefas';
        $resultado = $this->mysqli->query($sqlSelect);
    
        $this->tarefas = array();
        while ($tarefa = mysqli_fetch_assoc($resultado)) {
            $this->tarefas[] = $tarefa;
        }
    }

    function get_tarefa($id) {
        $sqlSelect = 'SELECT * FROM Tarefas WHERE id = ' . $id;
        $resultado = $this->mysqli->query($sqlSelect);
        $this->tarefa = mysqli_fetch_assoc($resultado);
    }

    function put_tarefa($tarefa) {
        $nome = $this->mysqli->escape_string($tarefa['nome']);
        $descricao = $this->mysqli->escape_string($tarefa['descricao']);
        $prazo = $this->mysqli->escape_string($tarefa['prazo']);

        $sqlGravar = "
            INSERT INTO Tarefas (nome, descricao, prioridade, prazo, concluida)
            VALUES ('{$nome}', '{$descricao}', {$tarefa['prioridade']}, '{$prazo}', {$tarefa['concluida']})
        ";
    
        $this->mysqli->query($sqlGravar);
    }
    
    function editar_tarefa($tarefa) {
        $sql = "UPDATE Tarefas SET
                    nome = '{$tarefa['nome']}',
                    descricao = '{$tarefa['descricao']}',
                    prioridade = {$tarefa['prioridade']},
                    prazo = '{$tarefa['prazo']}',
                    concluida = {$tarefa['concluida']}
                WHERE id = {$tarefa['id']}
        ";
    
        $this->mysqli->query($sql);
    }

    function remover_tarefa($id) {
        $sqlRemove = "DELETE FROM Tarefas WHERE id = {$id}";
    
        $this->mysqli->query($sqlRemove);
    }

    function put_anexo($anexo) {
        $sqlInsert = "INSERT INTO Anexos (tarefa, nome, ficheiro)
                      VALUES ({$anexo['tarefa_id']},
                              '{$anexo['nome']}',
                              '{$anexo['ficheiro']}'
                              )
        ";
        $this->mysqli->query($sqlInsert);
    }
    
    function get_anexos($tarefa_id) {
        $sql = "SELECT * FROM Anexos
                WHERE tarefa = {$tarefa_id}
        ";
        $resultado = $this->mysqli->query($sql);
    
        $anexos = array();
        while ($anexo = mysqli_fetch_assoc($resultado)) {
            $anexos[] = $anexo;
        }
    
        return $anexos;
    }

    function remover_tarefas_concluidas() {
        $sqlRemove = "DELETE FROM Tarefas WHERE concluida = 1";

        $this->mysqli->query($sqlRemove);
    }
}