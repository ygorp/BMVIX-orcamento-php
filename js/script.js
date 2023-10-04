document.getElementById('form').addEventListener('submit', function(event) {
  event.preventDefault();

  const formData = new FormData(this);

  fetch('orcamentoAPI.php', {
      method: 'POST',
      body: formData
  })
  .then(response => response.json())
  .then(data => {
      // Manipule os dados recebidos do PHP e exiba-os na tela

    
      const modalBody = document.getElementById('modal-body')

      if (data.Valor_orcamento) {
        modalBody.innerHTML = `
        <h4>Nome da Empresa:</h4>
        <p>${data.Nome}</p>
        <h4>CNPJ:</h4>
        <p>${data.CNPJ}</p>
        <h4>Sistema de ponto:</h4>
        <p>${data.Sistema_de_ponto}</p>
        <h4>Valor Orçamento:</h4>
        <p>${data.Valor_orcamento}</p>

        <button>Enviar orçamento</button>
      `
      } else {
        modalBody.innerHTML = `
        <h4>Nome da Empresa:</h4>
        <p>${data.Nome}</p>
        <h4>CNPJ:</h4>
        <p>${data.CNPJ}</p>
        <h4>Sistema de ponto:</h4>
        <p>${data.Sistema_de_ponto}</p>
        <h4>Valor Orçamento:</h4>
        <p>Licença Mensal: ${data.Valor_orcamento_mensal}</p>
        <p>Licença Anual: ${data.Valor_orcamento_anual}</p>

        <button>Enviar orçamento</button>
      `
      }
      

      modalBody.classList.remove('hidden')
      document.getElementById('form').reset();
  })
  .catch(error => {
      console.error('Erro:', error);
  });
});




