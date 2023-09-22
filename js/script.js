document.addEventListener("DOMContentLoaded", function () {
    // Capturar o formulário
    const form = document.querySelector("form");
  
    // Adicionar um ouvinte de evento para o envio do formulário
    form.addEventListener("submit", function (e) {
      e.preventDefault();
  
      // Capturar os valores do formulário
      const nome = document.getElementById("nome").value;
      const cnpj = document.getElementById("cnpj").value;
      const relogio = document.getElementById("relogio").value;
      const facial = document.getElementById("inputCity").value;
      const restricao = document.getElementById("resticao").value;
      const app = document.getElementById("app").value;
      const controlid = document.getElementById("controlid").value;
      const utilizaBancoHoras = document.getElementById("utilizaBancoHoras").value;
      const utilizaEscala = document.getElementById("utilizaEscala").value;
      const funcionarios = document.getElementById("funcionarios").value;
  
      // Determinar a melhor opção de sistema de ponto com base nas condições
      let sistemaPonto = "";
      if (relogio === "Inmetro" && (facial || restricao)) {
        sistemaPonto = "Secullum Web Ultimate";
      } else if (relogio === "Inmetro" || controlid || app) {
        sistemaPonto = "Secullum Web Pro";
      } else if (relogio === "não Inmetro") {
        sistemaPonto = "Secullum Offline";
      } else if (controlid) {
        sistemaPonto = "RHid";
      }
  
      // Enviar os dados ao PHP para acessar o banco de dados
      // Você pode usar XMLHttpRequest ou fetch para isso
      // Aqui está um exemplo com fetch:
  
      fetch("orcamento.php", {
        method: "POST",
        body: JSON.stringify({
          nome,
          cnpj,
          sistemaPonto,
          funcionarios,
        }),
        headers: {
          "Content-Type": "application/json",
        },
      })
        .then((response) => response.json())
        .then((data) => {
          // Manipule os dados retornados (orçamento) aqui e exiba-os em um popup
          alert(`Orçamento:\n${data.nomeEmpresa}\nCNPJ: ${data.cnpj}\nSistema de Ponto: ${data.sistemaPonto}\nQuantidade de Funcionários: ${data.funcionarios}\nValor: ${data.valor}`);
        })
        .catch((error) => {
          console.error("Erro ao enviar dados ao servidor:", error);
        });
    });
  });
  