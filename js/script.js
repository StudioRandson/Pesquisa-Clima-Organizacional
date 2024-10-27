   // Função para alternar as seções
   let currentSection = 0;
   const sections = document.querySelectorAll(".pergunta");

   function proximo() {
       // Remove a classe 'active' da seção atual
       sections[currentSection].classList.remove("active");
       currentSection++;

       // Adiciona a classe 'active' à próxima seção, se existir
       if (currentSection < sections.length) {
           sections[currentSection].classList.add("active");
       }

       // Verifica se está na seção de comentários para mostrar o botão "FINALIZAR PESQUISA"
       const btnFinalizar = document.getElementById("btnFinalizar");
       const btnProximo = document.getElementById("btnProximo");

       if (currentSection === sections.length - 1) {
           btnFinalizar.style.display = "block"; // Mostra o botão "Finalizar pesquisa"
           btnProximo.style.display = "none"; // Esconde o botão "Próximo"
       } else {
           btnFinalizar.style.display = "none"; // Esconde o botão "Finalizar pesquisa"
           btnProximo.style.display = "inline-block"; // Mostra o botão "Próximo" em outras seções
       }

       verificarResposta(); // Verifica a resposta ao mudar de seção
   }

   function verificarResposta() {
       const btnProximo = document.getElementById("btnProximo");
       const radios = document.querySelectorAll('input[name="pergunta' + (currentSection + 1) + '"]');
       let checked = false;

       // Verifica se alguma opção da pergunta atual foi selecionada
       radios.forEach(radio => {
           if (radio.checked) {
               checked = true;
           }
       });

       // Habilita ou desabilita o botão "PRÓXIMO"
       btnProximo.disabled = !checked; 
   }

   // Adiciona ouvintes de evento para as perguntas
   sections.forEach((section, index) => {
       const radios = section.querySelectorAll('input[type="radio"]');
       radios.forEach(radio => {
           radio.addEventListener('change', () => {
               salvarResposta(radio.value);
               verificarResposta(); // Verifica a resposta sempre que um rádio é selecionado
           });
       });
   });

   function salvarResposta(resposta) {
       // Salva a resposta na sessão
       fetch('salvar_resposta.php', {
           method: 'POST',
           headers: {
               'Content-Type': 'application/x-www-form-urlencoded',
           },
           body: 'resposta=' + encodeURIComponent(resposta)
       });
   }

   function finalizarPesquisa() {
       // Mostra a mensagem de sucesso
       Swal.fire({
           title: 'Pesquisa Realizada Com Sucesso',
           text: "Obrigado por participar!",
           icon: 'success',
           confirmButtonText: 'INICIAR PESQUISA!',
           willClose: () => {
               // Submete o formulário
               document.getElementById('surveyForm').submit();
           }
       });
   }

   // Ajusta altura do textarea automaticamente
   const textarea = document.querySelector("textarea");
   textarea.addEventListener("keyup", e => {
       textarea.style.height = "63px";
       let scHeight = e.target.scrollHeight;
       textarea.style.height = `${scHeight}px`;
   });