//Função para criar um objeto XMLHTTPRequest
function CriaRequest() {
    try{
        request = new XMLHttpRequest();        
    }catch (IEAtual){
        
        try{
            request = new ActiveXObject("Msxml2.XMLHTTP");       
        }catch(IEAntigo){
        
            try{
                request = new ActiveXObject("Microsoft.XMLHTTP");          
            }catch(falha){
                request = false;
            }
        }
    }
    
    if (!request) 
        alert("Seu Navegador não suporta Ajax!");
    else
        return request;
}

function getDados() {
    var nome;
    var result = document.getElementById("tabela-orcamentos");
    var xmlreq = CriaRequest();
    
    result.innerHTML = '<img src="lavagem/client/progress.gif"/>';
    
    // Monta a requisição
    xmlreq.open("GET", "lavagem/server/busca.php", true);
    
    // Atribui uma função para ser executada sempre que houver uma mudança de estado
    xmlreq.onreadystatechange = function(){
        
        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) {
            
            // Verifica se o arquivo foi encontrado com sucesso
            if (xmlreq.status == 200) {
                result.innerHTML = xmlreq.responseText;
            }else{
                result.innerHTML = "Erro: " + xmlreq.statusText;
            }
        }
    };
    xmlreq.send(null);
}


