// Função para abrir o modal com as informações do orçamento
function openModal(data) {
    var modal = document.getElementById("myModal");
    var modalContent = document.getElementById("modalContent");
    
    // Montar o conteúdo do modal com base nos dados recebidos
    var html = "<p><strong>Nome:</strong> " + data.nome + "</p>";
    html += "<p><strong>CNPJ:</strong> " + data.cnpj + "</p>";
    html += "<p><strong>Sistema de Ponto:</strong> " + data.sistema_ponto + "</p>";
    html += "<p><strong>Valor do Orçamento:</strong> R$" + data.valor_orcamento.toFixed(2) + "</p>";
  
    modalContent.innerHTML = html;
  
    modal.style.display = "block";
  }
  
  // Função para fechar o modal
  function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
  }
  
  // Evento para fechar o modal quando clicar no botão "X"
  var closeButton = document.getElementById("closeModal");
  if (closeButton) {
    closeButton.onclick = closeModal;
  }
  
  // Evento para fechar o modal quando clicar fora dele
  window.onclick = function(event) {
    event.preventDefault()
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  
  // Função para processar os dados do formulário
  function processarFormulario() {
    var nome = document.getElementById("nome").value;
    var cnpj = document.getElementById("cnpj").value;
    var modelo = document.getElementById("modelo").value;
    var facial = document.getElementById("facial").value;
    var restricao = document.getElementById("restricao").value;
    var app = document.getElementById("app").value;
    var funcionarios = parseInt(document.getElementById("funcionarios").value);
  
    var tipoSistema = '';
  
    
  
    if (modelo === 'idclass' || modelo === 'idface' || modelo === 'idflex' && app === 'sim') {
      tipoSistema += 'secullum web pro';
    } else if (modelo === 'idclass' || modelo === 'idface' || modelo === 'idflex' && app === 'sim' && (facial === 'sim' || restricao === 'sim')) {
      tipoSistema += 'secullum web ultimate';
    } else if (modelo === 'outro') {
      tipoSistema = 'Secullum offline';
    }

    if ((tipoSistema === 'secullum web pro' || tipoSistema === 'secullum web ultimate') && funcionarios <= 10) {
        var valorPorFuncionario = 100;
    }

  
    var data = {
      nome: nome,
      cnpj: cnpj,
      sistema_ponto: tipoSistema,
      valor_orcamento: valorPorFuncionario * funcionarios
    };
  
    openModal(data); // Abre o modal com os dados processados
  }