<?php include("cabecalho.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>Sistema Flowers</title>
  <style>
    /* ... (seu CSS aqui) ... */
    /* Estilo para o header fixo */
.fixed-header {
  position: fixed;
  top: 0;
  width: 100%;
  background-color: #333; /* Cor de fundo do header (ajuste conforme desejar) */
  z-index: 999; /* Certifique-se de que o header tenha uma z-index maior que outros elementos da página para que fique sobreposto a eles */
}

    #sobre_prod {			border: 25px solid #903;
    background: #903;
    margin: 0;
    padding:0;
}
#sobre {
    list-style: none; 
    margin: 10px;
     display: inline;
}
#sobre a {
    padding: 20px 40px; 
    margin:0;
    border: 0px solid #f00; 
    background: #903;
    text-decoration: none;
    color:#FFF;
/* cantos arredondados */
    -webkit-border-radius:5px;
    -moz-border-radius:5px;
     border-radius:5px;
}
#sobre a:hover {
    background: #CCC;
    color: #000; 
     border-color: #000;
}
#slider_horizontal {
	display: block;
	width: 100%;
	overflow-x: scroll;
	margin-top: 20px;
	padding: 5px;
	box-sizing: border-box;
	
}
#slider_horizontal::-webkit-scrollbar {
	display: none;
}
#container_slider {
	display: block;
	white-space: nowrap;

}
.horizontal_slider::-webkit-scrollbar {
	display: none;
}
	

	.slider_container {
		display: block;
		white-space: nowrap;

	}
.item {

    display: inline-block;
    margin-right: 10px;
}
.imagens{
    width: 100px;
    height: 100px;
    margin: 10px;

}
h2 {
    text-align: left;
    font-size: 16px;font-size: 16px;
    color: #000;
   
}
h3 {
    text-align: left;
    font-size: 16px;
}
.preço{
    font-size: 16px;
    text-align: justify;
    margin-top: 10px;
}
#informarcaoProdutos{
    font-size: 16px;
    text-align: justify;
    margin-top: 10px;
}
#ilustrativa{
    font-size: 16px;

}
#tabelaCatalogo{
    margin-left: 15px;
    margin-top: -120px;
    background-image: linear-gradient(to right, rgb(172, 16, 130), rgb(90,20,220));
    width: 98.5%;
    border: none;
    padding: 15px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    border-radius: 10px;

}
@media (max-width: 400px) {
  .horizontal_slider {
	display: block;
	width: 100%;
	overflow-x: scroll;
	margin-top: 20px;
	padding: 5px;
	box-sizing: border-box;
	
}
.horizontal_slider::-webkit-scrollbar {
	display: none;
}

.slider_container {
	display: block;
	white-space: nowrap;

}
}
  </style>
</head>
<body>

  <header class="fixed-header">
  <?php include("cabecalho.php")?>
  <br>
    <nav>
      <div class="horizontal_slider" id="slider_horizontal">
        <div class="slider_container" id="container_slider">
          <ul id="sobre_prod" align="center">
            <!--MAQUIAGEM-Marcas-Rosto-Boca-Olhos-Pincéis-Skincare-Acessórios-Promoção-LANÇAMENTO-->
            <div class="item">
              <li class="sobre"><a href="#section1">Makes</a></li>
            </div>
            <div class="item">
              <li class="sobre"><a href="#rosto">Rosto</a></li>
            </div>
            <!-- Outros links ... -->
          </ul>
        </div>
      </div>
    </nav>
  </header>
<table class="table" id="tabelaCatalogo">
  <section id="rosto">
    <!-- Conteúdo da Seção rosto -->
 <tr><td><img class="imagens" id="" src="produtos/1713_Trio_Sobrancelhas_uni_makeup.jpeg" align="left" border="">
 <strong id="nomeProduto">Uni makeup<br>Paleta Trio Sobrancelhas Eyebrow Pocket </strong><strong id="sku">Nº 1713</strong><h3 class="preço">R$15,00</h3><h3 id="informarcaoProdutos">
 <b> INFORMAÇÕES DO PRODUTO:</b>
  O Trio de Sobrancelhas Eyebrow Pocket chegou para fazer a diferença e dar praticidade a sua maquiagem.
  É um estojinho super fofo com 3 tons de sombras e 1 pincel aplicador.
 </h3></td></tr><br>

 <tr><td><img class="imagens" id="" src="produtos/1664_Po_de_Banana_da_Amar_Make.jpeg" align="left" border="">
 <strong class="nomeProduto" id="nomeProduto">Pó de Banana Amar Make </strong><strong id="sku">Nº 1664</strong><h3 class="preço">R$10,00</h3><h3 id="informarcaoProdutos">
 <b> INFORMAÇÕES DO PRODUTO:</b>
  O Pó de Banana da Amar Make é ideal para a finalização da maquiagem.<br>
  Deixa a pele sequinha, fazendo a maquiagem durar muito mais tempo e diminuindo a oleosidade da pele.<br>
  O Pó de Banana não adiciona cor e dá o chamado disfarce óptico em fotos e vídeos (não estoura no flash).
 </h3></td></tr><br>
 
 <tr><td><img class="imagens" id="" src="produtos/1775_Pó_Banana_Even.jpeg" align="left" border="">
 <strong class="nomeProduto" id="nomeProduto">Pó de Banana<br>EVEN </strong><strong id="sku">Nº 1775</strong><h3 class="preço">R$12,00</h3><h3 id="informarcaoProdutos">
 <b> INFORMAÇÕES DO PRODUTO:</b>
 O pó banana é solto e fininho, desenvolvido para todos os tipos de pele, perfeito para aquelas foto sem estourar no flash, seu tom amarelado se adapta a maquiagem deixando mais homogênea e uniforme
</h3></td></tr><br>

<tr><td><img class="imagens" id="" src="produtos/1651_Contorno_Facial_Dia_a_Dia_Mahav.jpeg" align="left" border="">
 <strong class="nomeProduto" id="nomeProduto">Contorno Facial<br>Dia a Dia Mahav </strong><strong id="sku">Nº 1651</strong><h3 class="preço">R$10,00</h3><h3 id="informarcaoProdutos">
 <b> INFORMAÇÕES DO PRODUTO:</b>
 O Contorno Facial Dia a Dia Mahav é um pó compacto fino, macio e delicado! A pigmentação é perfeita para criar os efeitos de luz e sombra de forma natural, fácil de aplicar e esfumar, sem marcar.
</h3></td></tr><br>

<tr><td><img class="imagens" id="" src="produtos/1666_Double_Shadows.jpeg" align="left" border="">
 <strong class="nomeProduto" id="nomeProduto">Double Shadows Duo<br>Para sobrancelhas </strong><strong id="sku">Nº 1666</strong><h3 class="preço">R$12,00</h3><h3 id="informarcaoProdutos">
 <b> INFORMAÇÕES DO PRODUTO:</b>
 O Contorno Facial Dia a Dia Mahav é um pó compacto fino, macio e delicado! A pigmentação é perfeita para criar os efeitos de luz e sombra de forma natural, fácil de aplicar e esfumar, sem marcar.
</h3></td></tr><br>

<tr><td><img class="imagens" id="" src="produtos/1743_Base antioxidante.jpeg" align="left" border="">
 <strong class="nomeProduto" id="nomeProduto">Base antioxidante<br>mia make </strong><strong id="sku">Nº 1743</strong><h3 class="preço">R$12,00</h3><h3 id="informarcaoProdutos">
 <b> INFORMAÇÕES DO PRODUTO:</b>
 Nossa nova base conta com ativos sofisticados que garantem hidratação em uma textura matte confortável. <br>
 Com pigmentos que evitam a oxidação da cor, sua fórmula é enriquecida com Ácido Hialurônico e Rosa Mosqueta, que juntos trazem ação multifuncional para a pele, melhorando a textura e sedosidade.
 Sua cobertura é media e permite camadas com acabamento natural.<br>
</h3></td></tr><br>

<tr><td><img class="imagens" id="" src="produtos/1724_Corretivo alta cobertura.jpeg" align="left" border="">
 <strong class="nomeProduto" id="nomeProduto">Corretivo alta cobertura<br>Ruby rose Flawless </strong><strong id="sku">Nº 1724</strong><h3 class="preço">R$10,00</h3><h3 id="informarcaoProdutos">
 <b> INFORMAÇÕES DO PRODUTO:</b>
 Possui textura líquida, acabamento matte, alta cobertura e longa duração, deixando a pele bem sequinha sem craquelar. Indicado para todos os tipos de pele, sua fórmula é capaz de corrigir imperfeições, olheiras, marcas de expressão, espinhas e até cicatrizes.<br>
</h3></td></tr><br>

<tr><td><img class="imagens" id="" src="produtos/1746_Corretivo_lua_e_neve.jpeg" align="left" border="">
 <strong class="nomeProduto" id="nomeProduto">Corretivo<br>lua & neve </strong><strong id="sku">Nº 1746</strong><h3 class="preço">R$10,00</h3><h3 id="informarcaoProdutos">
 <b> INFORMAÇÕES DO PRODUTO:</b>
 Possui textura líquida, alta cobertura e longa duração.<br>
</h3></td></tr><br>

<tr><td><img class="imagens" id="" src="produtos/1642_Corretivo líquido.jpeg" align="left" border="">
 <strong class="nomeProduto" id="nomeProduto">Corretivo líquido<br>Isis Rezende make UP </strong><strong id="sku">Nº 1642</strong><h3 class="preço">R$12,00</h3><h3 id="informarcaoProdutos">
 <b> INFORMAÇÕES DO PRODUTO:</b>
 Alta cobertura, possui vitamina E Não craquela<br>
</h3></td></tr><br>

<tr><td><img class="imagens" id="" src="produtos/1768_Multifuncional 3 em 1 Batom Blush e Sombra.jpeg" align="left" border="">
 <strong class="nomeProduto" id="nomeProduto">Multifuncional 3 em 1 Batom, Blush e Sombra <br>Mia Make Meu Astral
  </strong><strong id="sku">Nº 1768</strong><h3 class="preço">R$13,00</h3><h3 id="informarcaoProdutos">
 <b> INFORMAÇÕES DO PRODUTO:</b>
 O Multifuncional Meu Astral é a escolha perfeita para quem procura praticidade e diversão na hora da maquiagem. 
Sua fórmula tem secagem rápida e é fácil de esfumar. Utilize nos lábios, bochechas e pálpebras e se divirta.<br>
</h3></td></tr><br>

<tr><td><img class="imagens" id="" src="produtos/1698_Blush Líquido Dely Dely Produto 3 em 1 Blush Batom e Sombra Intense Colors.jpeg" align="left" border="">
 <strong class="nomeProduto" id="nomeProduto">Blush Líquido Dely Dely Produto 3 em 1 Blush Batom e Sombra Intense Colors <br>Dely Dely 
  </strong><strong id="sku">Nº 1698</strong><h3 class="preço">R$13,00</h3><h3 id="informarcaoProdutos">
 <b> INFORMAÇÕES DO PRODUTO:</b>
 Produtinho maravilhoso super prático para facilitar a sua maquiagem: você pode utilizá-lo como batom, blush e sombra!
Super pigmentado e não transfere.<br>
</h3></td></tr><br>

</section>
</table>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const links = document.querySelectorAll(".sobre a");

      links.forEach((link) => {
        link.addEventListener("click", smoothScroll);
      });

      function smoothScroll(event) {
        event.preventDefault();
        const targetId = event.currentTarget.getAttribute("href");
        const targetPosition = document.querySelector(targetId).offsetTop;

        window.scroll({
          top: targetPosition,
          behavior: "smooth",
        });
      }
    });
  </script>
</body>
</html>