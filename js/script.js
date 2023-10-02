document.getElementById('form').addEventListener('submit', function(event) {
  event.preventDefault();

  const formData = new FormData(this);

  fetch('orcamento.php', {
      method: 'POST',
      body: formData
  })
  .then(response => response.json())
  .then(data => {
      // Manipule os dados recebidos do PHP e exiba-os na tela
      const modalBody = document.getElementById('modal-body')

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

      modalBody.classList.remove('hidden')
      document.getElementById('form').reset();
  })
  .catch(error => {
      console.error('Erro:', error);
  });
});




