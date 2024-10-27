<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Pesquisa de Clima Organizacional</title>
    <link rel="stylesheet" href="css/sty.css">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Include SweetAlert2 CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <form id="surveyForm" action="processa_respostas.php" method="post" onsubmit="return validarFormulario()">
      
      <!-- Pergunta 1 -->
      <section id="pergunta1" class="pergunta active">
          <div class="main-container">
              <h2>1. Eu considero a empresa um bom lugar para trabalhar?</h2>
              <div class="radio-buttons">
                  <label class="custom-radio">
                      <input type="radio" name="pergunta1" value="ruim" required onchange="salvarResposta(this.value); verificarResposta()" />
                      <span class="radio-btn"><i class="las la-check"></i>
                      <div class="hobbies-icon"><i class="lar la-tired"></i><p>Ruim</p></div></span>
                  </label>
                  <label class="custom-radio">
                      <input type="radio" name="pergunta1" value="regular" onchange="salvarResposta(this.value); verificarResposta()" />
                      <span class="radio-btn"><i class="las la-check"></i>
                      <div class="hobbies-icon"><i class="lar la-meh-blank"></i><p>Regular</p></div></span>
                  </label>
                  <label class="custom-radio">
                      <input type="radio" name="pergunta1" value="bom" onchange="salvarResposta(this.value); verificarResposta()" />
                      <span class="radio-btn"><i class="las la-check"></i>
                      <div class="hobbies-icon"><i class="lar la-smile-beam"></i><p>Bom</p></div></span>
                  </label>
                  <label class="custom-radio">
                      <input type="radio" name="pergunta1" value="otimo" onchange="salvarResposta(this.value); verificarResposta()" />
                      <span class="radio-btn"><i class="las la-check"></i>
                      <div class="hobbies-icon"><i class="lar la-grin-hearts"></i><p>Ótimo</p></div></span>
                  </label>
              </div>
          </div>
      </section>

      <!-- Pergunta 2 -->
      <section id="pergunta2" class="pergunta">
          <div class="main-container">
              <h2>2. Qual seu nível de satisfação com a função que desempenha?</h2>
              <div class="radio-buttons">
                  <label class="custom-radio">
                      <input type="radio" name="pergunta2" value="ruim" required onchange="salvarResposta(this.value); verificarResposta()" />
                      <span class="radio-btn"><i class="las la-check"></i>
                      <div class="hobbies-icon"><i class="lar la-tired"></i><p>Ruim</p></div></span>
                  </label>
                  <label class="custom-radio">
                      <input type="radio" name="pergunta2" value="regular" onchange="salvarResposta(this.value); verificarResposta()" />
                      <span class="radio-btn"><i class="las la-check"></i>
                      <div class="hobbies-icon"><i class="lar la-meh-blank"></i><p>Regular</p></div></span>
                  </label>
                  <label class="custom-radio">
                      <input type="radio" name="pergunta2" value="bom" onchange="salvarResposta(this.value); verificarResposta()" />
                      <span class="radio-btn"><i class="las la-check"></i>
                      <div class="hobbies-icon"><i class="lar la-smile-beam"></i><p>Bom</p></div></span>
                  </label>
                  <label class="custom-radio">
                      <input type="radio" name="pergunta2" value="otimo" onchange="salvarResposta(this.value); verificarResposta()" />
                      <span class="radio-btn"><i class="las la-check"></i>
                      <div class="hobbies-icon"><i class="lar la-grin-hearts"></i><p>Ótimo</p></div></span>
                  </label>
              </div>
          </div>
      </section>

      <section id="pergunta3" class="pergunta">
          <div class="main-container">
              <h2>3. Suas sugestões de melhoria e opiniões construtivas são ouvidas pela empresa?</h2>
              <div class="radio-buttons">
                  <label class="custom-radio">
                      <input type="radio" name="pergunta3" value="ruim" required onchange="salvarResposta(this.value); verificarResposta()" />
                      <span class="radio-btn"><i class="las la-check"></i>
                      <div class="hobbies-icon"><i class="lar la-tired"></i><p>Ruim</p></div></span>
                  </label>
                  <label class="custom-radio">
                      <input type="radio" name="pergunta3" value="regular" onchange="salvarResposta(this.value); verificarResposta()" />
                      <span class="radio-btn"><i class="las la-check"></i>
                      <div class="hobbies-icon"><i class="lar la-meh-blank"></i><p>Regular</p></div></span>
                  </label>
                  <label class="custom-radio">
                      <input type="radio" name="pergunta3" value="bom" onchange="salvarResposta(this.value); verificarResposta()" />
                      <span class="radio-btn"><i class="las la-check"></i>
                      <div class="hobbies-icon"><i class="lar la-smile-beam"></i><p>Bom</p></div></span>
                  </label>
                  <label class="custom-radio">
                      <input type="radio" name="pergunta3" value="otimo" onchange="salvarResposta(this.value); verificarResposta()" />
                      <span class="radio-btn"><i class="las la-check"></i>
                      <div class="hobbies-icon"><i class="lar la-grin-hearts"></i><p>Ótimo</p></div></span>
                  </label>
              </div>
          </div>
      </section>

      <section id="pergunta4" class="pergunta">
          <div class="main-container">
              <h2>4. Gostaria de deixar algum elogio, crítica ou sugestão?</h2>
              <div class="radio-buttons">
                  <label class="custom-radio">
                      <input type="radio" name="pergunta4" value="ruim" required onchange="salvarResposta(this.value); verificarResposta()" />
                      <span class="radio-btn"><i class="las la-check"></i>
                      <div class="hobbies-icon"><i class="lar la-tired"></i><p>Ruim</p></div></span>
                  </label>
                  <label class="custom-radio">
                      <input type="radio" name="pergunta4" value="regular" onchange="salvarResposta(this.value); verificarResposta()" />
                      <span class="radio-btn"><i class="las la-check"></i>
                      <div class="hobbies-icon"><i class="lar la-meh-blank"></i><p>Regular</p></div></span>
                  </label>
                  <label class="custom-radio">
                      <input type="radio" name="pergunta4" value="bom" onchange="salvarResposta(this.value); verificarResposta()" />
                      <span class="radio-btn"><i class="las la-check"></i>
                      <div class="hobbies-icon"><i class="lar la-smile-beam"></i><p>Bom</p></div></span>
                  </label>
                  <label class="custom-radio">
                      <input type="radio" name="pergunta4" value="otimo" onchange="salvarResposta(this.value); verificarResposta()" />
                      <span class="radio-btn"><i class="las la-check"></i>
                      <div class="hobbies-icon"><i class="lar la-grin-hearts"></i><p>Ótimo</p></div></span>
                  </label>
              </div>
          </div>
      </section>

      <!-- Comentário -->
      <section id="comentario" class="pergunta">
          <div class="wrapper">
              <h4>Gostaria de Expressar algum elogio, crítica ou melhoria para a Empresa! (Opcional).</h4>
              <textarea name="comentario" spellcheck="false" placeholder="Até 500 Caracteres..."></textarea>
          </div>
      </section>

      <!-- Footer fixo com o botão -->
      <div class="footer-fixo">
          <button id="btnProximo" class="btn btn-primary" type="button" onclick="proximo()" disabled>
              PRÓXIMO <i class="fas fa-arrow-right"></i>
          </button>
          <button id="btnFinalizar" class="btn btn-success btn-centralizado" type="button" style="display: none;" onclick="finalizarPesquisa()">
              FINALIZAR PESQUISA <i class="fas fa-check"></i>
          </button>
      </div>
    </form>

    <script src="js/script.js"></script>


<style>
    .pergunta { display: none; }
    .pergunta.active { display: block; }
    
    /* Estilo do footer fixo */
    .footer-fixo {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #f8f9fa;
        padding: 10px;
        text-align: center;
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
    }

    .footer-fixo .btn {
        width: 200px;
    }

    .btn-centralizado {
        margin: 0 auto; /* Centraliza o botão */
        display: inline-block; /* Permite o uso do margin auto */
    }
</style>

</body>
</html>
