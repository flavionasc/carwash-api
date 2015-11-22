<?php
class ClienteService {
    
    public static function addCliente(){
        
        
        $db = ConnectionFactory::getDB();
        $clientes = array();
        foreach($db->clientes() as $cliente) {
           $clientes[] = array (
               'name' => $cliente['name'],
               'endereco' => $cliente['endereco'],
               'email' => $cliente['email'],
               'telefone' => $cliente['telefone'],
               'cpf' => $cliente['cpf'],
               'bairro' => $cliente['bairro'],
               'cidade' => $cliente['cidade'],
               'estado' => $cliente['estado']
           ); 
        }
        
        return $clientes;
        
        
    }
    
    public static function add($newCliente) {
        $db = ConnectionFactory::getDB();
        $cliente = $db->clientes->insert($newCliente);
        return $cliente;
    }
    
