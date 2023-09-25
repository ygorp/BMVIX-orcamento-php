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
      document.getElementById('resultado').innerHTML = `Nome: ${data.nome}<br>CNPJ: ${data.cnpj}<br>`;
  })
  .catch(error => {
      console.error('Erro:', error);
  });
});