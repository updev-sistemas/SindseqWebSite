<!--
Olá mundo!  Este código fonte foi criado por Dani Guerrato para o Tableless.
Portfolio:       www.popupdesign.com.br
E-mail:          dani@popupdesign.com.br
Divirta-se! :)
-->

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Semântica, padrões e o que você tem a ver com isto</title>

    <!--Styles-->
    <style>
        /*
Olá mundo!  Este código fonte foi criado por Dani Guerrato para o Tableless.
Portfolio:       www.popupdesign.com.br
E-mail:          dani@popupdesign.com.br
Divirta-se! :)
*/


        /* ==========================================================================
           Normatização CSS
           ========================================================================== */

        html,
        button,
        input,
        select,
        textarea {
            color: #444;
        }

        body {
            font-size: 62.5%;
        }

        img {
            vertical-align: middle;
        }

        fieldset {
            border: 0;
            margin: 0;
            padding: 0;
        }

        textarea {
            resize: vertical;
        }

        /* ==========================================================================
           Estilos Principais
           ========================================================================== */

        body {
            font-family: Helvetica, Arial, sans-serif;
            background: #f8f8f8;
        }

        .wrap{
            margin: 0 auto;
            width: 660px;
            color: #444;
        }


        h1 {
            font-size: 3.2em;
        }

        h2 {
            font-size: 2.4em;
            margin-top: 2em;
        }

        h3 {
            font-size: 1.8em;
            margin-top: 2em;
        }

        h1 a {
            text-decoration: none;
            color: #057ac5;
        }

        p {
            font-size: 1.6em;
            line-height: 2.1em;
        }

        a {
            color: #057ac5;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        figure img {
            margin-bottom: 2em;
        }

        .header {
            background: #000;
            margin: 0 auto;
            width: 100%;
            padding-top: 2em;
            padding-bottom: 2em;
            position: relative;
            overflow: hidden;
        }

        .header h1 {
            color: #FFF;
            font-size: 1.6em;
            width: 240px;
            float: left;
            display: block;
            margin: 0;
            padding: 0;
        }

        .menu ul {
            float: right;
            width: 420px;
            margin: 0;
            padding: 0;
        }

        .menu li {
            display: inline-block;
            margin-right: 2em;
        }

        .menu a {
            font-size: 1.4em;
        }

        .artigo {
            margin-top: 4em;
        }

        .footer {
            background: #000;
            padding: 1.5em 0 1.5em 0;
            margin-top: 4em;
            width: 100%;
        }

        .footer small {
            color: #CCC;
            font-size: 1.2em;
            line-height: 1.5em;
            width: 640px;
            margin: 0 auto;
            display: block;
        }


        .no-print {
            display: block;
        }

        .print {
            display: none;
        }



        /* ==========================================================================
           Estilos para impressão
           ========================================================================== */

        @media print {

            * {
                background: transparent !important;
                color: #000 !important;
                text-shadow: none !important;
                filter:none !important;
                -ms-filter: none !important;
            }

            body {
                margin:0;
                padding:0;
                line-height: 1.4em;
                font: 12pt Georgia, "Times New Roman", Times, serif;
                color: #000;
            }

            @page {
                margin: 1.5cm;
            }

            .wrap {
                width: 100%;
                margin: 0;
                float: none !important;
            }

            .no-print, nav, footer, video, audio, object, embed {
                display:none;
            }

            .print {
                display: block;
            }

            img {
                max-width: 100%;
            }

            aside {
                display:block;
                page-break-before: always;
            }

            h1 {
                font-size: 24pt;
            }

            h2 {
                font-size: 18pt;
            }

            h3 {
                font-size: 14pt;
            }

            p {
                font-size: 12pt;
                widows: 3;
                orphans: 3;
            }

            a, a:visited {
                text-decoration: underline;
            }

            a:link:after, a:visited:after {
                content: " (" attr(href) ") ";
            }

            p a {
                word-wrap: break-word;
            }

            q:after {
                content: " (" attr(cite) ")"
            }

            a:after, a[href^="javascript:"]:after, a[href^="#"]:after {
                content: "";
            }

            .page-break {
                page-break-before: always;
            }

            /*Estilos da Demo*/
            .header.print h1{
                width: 100%;
                margin-bottom: 0.5cm;
                font-size: 18pt;
            }

            .header.print:after {
                content: "Este artigo foi escrito pela designer Dani Guerrato e retirado do site Tableless.";
            }

            .artigo {
                margin-top: 0;
                border-top: 1px solid #000;
                padding-top: 1cm;
            }

            h1 a:link:after, h1 a:visited:after {
                content: "";
            }
        }
    </style>

    <!--Modernizr-->
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>

<header class="header no-print">
    <div class="wrap">
        <h1>Demo CSS para a impressão</h1>
        <nav class="menu">
            <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
            </ul>
        </nav>
    </div>
</header>

<header class="header print">
    <h1>Demo CSS para a impressão</h1>
</header>

<div class="wrap">
    <article class="artigo">
        <figure class="img-post"><a href="http://tableless.com.br/semantica-padroes-e-o-que-voce-tem-a-ver-com-isto/"><img src="http://tableless.com.br/wp-content/uploads/2013/12/featured-image.jpg" itemprop="image" alt="Imagem post: Semântica, padrões e o que você tem a ver com isto"></a></figure>

        <h1><a href="http://tableless.com.br/semantica-padroes-e-o-que-voce-tem-a-ver-com-isto/">Semântica, padrões e o que você tem a ver com isto</a></h1>
        <p>Entenda de uma vez por todas o que é web semântica e compare as principais diferenças entre alguns elementos de HTML.</p>
        <p>O HTML é uma linguagem simples de aprender, mas muito difícil de dominar. Segundo a documentação da W3C existem atualmente 107 elementos de HTML5. Muitos deles ainda causam certa confusão entre os desenvolvedores ou por possuírem funções muito parecidas, comportamentos visuais praticamente idênticos ou ainda por serem simplesmente desconhecidos pela comunidade. Alguns elementos ainda são chamados de &#8220;mais semânticos&#8221; que outros. Mas o que isto quer dizer afinal? </p>
        <p>No post de hoje vamos fazer uma breve comparação entre alguns destes elementos para que você tenha sempre a carta certa na manga na hora certa e possa atribuir significado de maneira efetiva.</p>

        <h2>O que é web semântica?</h2>
        <p>A explicação curta: semântica é o estudo do significado. Poderíamos parar por aqui. Mas não vamos.</p>
        <p>A explicação longa e contextualizada: a web semântica é um movimento colaborativo para organizar a informação de maneira acessível para computadores e máquinas através de padrões de formatação de dados. Quem cunhou este termo foi  Tim Berners-Lee, o inventor do protocolo WWW. Isto parte de um esforço para fazer a informação ser facilmente encontrada e compreendida por mecanismos de busca, ser acessível para pessoas com deficiências visuais utilizando leitores de voz e, em um futuro utópico, ser &#8220;compreendida&#8221; pelos computadores. Assim tarefas chatas, burocráticas e que levam muito tempo para serem realizadas poderão ser feitas por máquinas.</p>
        <p>Você pode estar pensando:  o que eu tenho a ver com isto? A resposta é bem simples: tudo. Ainda não possuímos computadores com inteligências artificiais que possam despreender significado da informação na internet, mas podemos marcar o conteúdo de forma que as máquinas possam compreender o contexto de cada bloco de informação e assim atribuir uma &#8220;etiqueta&#8221; de significado. Por exemplo, ao utilizar a tag &lt;nav&gt; estamos dizendo para todos os sistemas do mundo  &#8221;Ei, a navegação está bem aqui&#8221;. Ou ao marcar um título com a tag h1 você está na verdade dizendo &#8220;Cara, este é o título MAIS IMPORTANTE deste artigo&#8221;. Não importa se o texto está em chinês, russo ou português um h1 sempre será um título. E isto é só a ponta do iceberg. Usando meta-dados como schema ou o Facebook Open Graph podemos dizer para o computador não apenas que aquele h1 é um título, como qual é o assunto daquele dado. Assim podemos dizer que &#8220;O HOBBIT&#8221; é o título de um filme. Graças a este tipo de meta informação você já pode, no estado atual de organização da informação, pedir ao seu mecanismo de busca favorito que encontre a próxima seção deste filme ou que mostre uma lista de lojas que possuem o blu-ray em promoção. No futuro você poderá saber tudo o que existe na internet sobre &#8220;O HOBBIT&#8221; sem precisar mineirar a informação clicando manualmente de página em página.  Mas isto já vai além do escopo deste artigo… Em resumo saber qual é o contexto semântico de um determinado elemento não é cagação de regra. Marcação de texto semântica é um pequeno esforço para ajudar pessoas como eu e você a encontrarem, compartilharem, reutilizarem e combinarem dados.</p>

        <h2>Uma questão de força e ênfase</h2>
        <p>A linguagem falada possuí algumas diferenças sutis que são muito difíceis de transmitir por escrito. Eu posso dizer &#8220;Eu amo sorvetes&#8221; e isto ter um significado completamente diferente conforme o tom da minha voz. É possível que esta seja uma afirmação simples e sem emoção, eu posso gritar a plenos pulmões para transmitir ao mundo meu amor ou eu posso estar sendo irônica o tempo todo e, neste caso, o que eu quero realmente comunicar é que eu odeio sorvetes. Tudo vai depender do volume, força, ênfase e humor transmitido pela minha voz.</p>
        <p>Da mesma maneira em HTML possuímos tags que, embora visualmente produzam resultados idênticos, possuem significados diferentes. É claro que não podemos contar com o refinamento e sofisticação de uma língua falada. É como se você só tivesse 107 etiquetas para marcar todo o conteúdo do mundo. Por que, enfim, é exatamente isto que estamos fazendo aqui na realidade. Mas, conhecendo melhor o significado de cada etiqueta podemos transmitir melhor estas mudanças de tom, certo?</p>

        <h3>&lt;b&gt; vs. &lt;strong&gt;</h3>
        <p>Aparentemente as tags &lt;b&gt; e &lt;strong&gt; fazem a mesma coisa: ambas deixam um texto em negrito. Mas existe uma diferença semântica aqui. O elemento &lt;b&gt; é utilizado para separar um conteúdo que, embora seja estilisticamente distinto e você deseje chamar atenção para ele, não possui um significado ou importância maior em relação ao texto normal. Isto pode servir para palavras-chaves, nomes de produtos e serviços, etc.</p>
        <p>Já o &lt;strong&gt; serve para marcar textos com maior importância.  Textos strong serão lidos pelos leitores de tela com uma voz mais forte (EU AMO SORVETEEEE). Este destaque não precisa necessariamente ser comunicado visualmente através do negrito. Utilizando CSS você pode criar contraste através da cor do texto, peso, forma, tamanho, background, etc. Tudo depende do que funciona melhor para o seu layout.</p>

        <h3>&lt;em&gt; vs. &lt;i&gt;</h3>
        <p>A mesma confusão acontece entre as tags &lt;em&gt; e &lt;i&gt;. Embora o efeito visual das duas por padrão seja o mesmo &#8211; deixar o texto em itálico &#8211; existe uma diferença de significado. A tag &lt;em&gt; indica um texto com maior ênfase (eu AMO sorvete). Enquanto &lt;i&gt; é utilizado para textos que teriam uma voz alternativa. Isto pode ser uma referência a um humor diferente do restante do texto (uma expressão irônica, por exemplo), ou até mesmo para identificar um termo técnico, cientifico ou idiomático.</p>
        <p>É possível combinar o &lt;i&gt; com atributos lang para indicar expressões em outras línguas. Eu amo &lt;i lang=&#8221;it&#8221;&gt;gelato&lt;/i&gt;.</p>

        <h3>Outros tons</h3>
        <p>Ainda no campo de ênfase existe ainda a tag &lt;mark&gt;. Ela é utilizada para destacar uma informação. Seria o equivalente a você pegar uma caneta marca texto amarelo berrante e grifar um dado importante. E este é exatamente o visual padrão desta tag.</p>
        <p>Já se o objetivo é marcar um fato desatualizado ou não mais relevante você pode utilizar a tag &lt;s&gt;. Mudanças de preço do tipo de R$100 por R$20 são um bom exemplo de uso.</p>

        <h2>Uma citação para cada situação</h2>
        <p>As tags &lt;blockquote&gt; e &lt;q&gt; também causam uma certa confusão. O elemento &lt;blockquote&gt; é para blocos de citação de uma outra fonte. Já o &lt;q&gt; é para citações curtas inseridas no meio de um texto, sem quebras de parágrafo.</p>
        <p>Por que não simplesmente utilizar aspas? Bem, aspas não significam citações em todos os contextos. Você pode utilizar como um recurso para diferenciar uma expressão idiomática, demonstrar um bloco de texto dito por um personagem em uma narração ou simplesmente &#8220;por que você quis&#8221;. Talvez um leitor atento saiba diferenciar cada uso, mas um computador não sabe. Então para não haver dúvidas que se trata de uma citação utilize &lt;blockquote&gt; ou &lt;q&gt;.</p>
        <p>O &lt;cite&gt;  soa como citação mas não é não. A função dele é indicar um título de um trabalho como um livro, um filme ou um artigo como este que você está lendo. Você pode combinar estas tags. Por exemplo, utilizar um cite para referenciar a obra que você utilizou no blockquote ou ainda usar o cite como um atributo para especificar um link para o trabalho original. Este link não ficará visível para os usuários, mas pode servir para controle interno e para avisar mecanismos de busca a origem da informação.</p>

        <h2>Nem tudo é o que parece</h2>
        <h3>&lt;small&gt;</h3>
        <p>Ao contrário do que o nome indica &lt;small&gt; não é para textos pequenos. A função do small é marcar comentários curtos de natureza distinta do assunto principal como disclaimers, licença de uso, atribuição de crédito&#8230; Anúncios do tipo &#8220;O ministério da saúde adverte&#8221; e aquelas letras pequeninas no final de um contrato são &lt;small&gt;.</p>

        <h3>&amp;nbsp;</h3>
        <p>Muita gente utiliza este atributo simplesmente para indicar divs vazias. Mas a função do &amp;nbsp; vai além disto. O conceito aqui é criar um espaço em branco que não irá quebrar em uma nova linha. Isto é útil para palavras que não devem aparecer separadas como indicações de tempo, unidades de medidas ou nomes próprios.</p>

        <h2>Um desafio diário</h2>
        <p>A princípio parece tudo bem simples: p é de parágrafo, h é para título e divs separam tudo. Mas as coisas nunca são o que parecem. Cada elemento tem seu uso e peculiaridade. . Eu sei que você pode estar pensando &#8220;eu faço isto a anos, eu já sei HTML&#8221;. Mas você já leu com calma a documentação de cada elemento? Eu vou ser a primeira a admitir que não li tudo não. É gigante! Existe muito a aprender. Vire mexe eu descubro um elemento &#8220;novo&#8221;. Meu conselho aqui é: dedique um tempinho do seu dia para estudar HTML. Podem ser 5 minutinhos. Quando estiver em uma fila entediante. São mais de 100 tags. Você poderia passar meses fazendo isto e não zerar tudo. Garanto que você vai descobrir muita coisa nova.</p>

        <h2>Da necessidade de padrões</h2>
        <p>Antes de me meter a estudar design cursei Letras por alguns anos. Acabei desistindo do curso por uma questão de afinidade, mas linguística sempre foi um assunto fascinante para mim. E no final desenvolvimento web tem muito mais paralelos com esta área do conhecimento humano do que parecia a princípio. A principal lição que podemos pegar emprestado é que a língua é um organismo vivo e não pode ser controlado. Na prática isto significa que se todo mundo passar a utilizar uma tag x para uma determinada função, não importa muito o significado original &#8220;dicionarizado&#8221;.  Os padrões terão que ser modificados para contemplar este uso.</p>
        <p>Da mesma maneira que o significado de uma palavra ou símbolo pode se modificar ao longo do tempo o mesmo pode ocorrer com linguagens de marcação de texto. Nem eu, nem a W3C, nem o Google, nem ninguém tem o poder de impor significado a nada. No final toda a linguagem, e o HTML não está excluído disto, é essencialmente arbitrária. Mas, porém, todavia, se não existir um esforço para a criação de algum padrão cada um vai falar uma variação divergente e ninguém vai se comunicar. Da mesma forma que as vezes é preciso aprender novas regras de gramática, teremos que criar e aprender novos padrões para se adequar as nossas necessidades como desenvolvedores. Ou evoluir e modificar os antigos. Com a diferença que quem escolhe as regras do jogo não são um punhado de intelectuais elitistas em roupas engraçadas. Somos eu, você, e qualquer um que tiver novas e boas idéias para contribuir para a comunidade de desenvolvimento.</p>
        <p>Pode parecer um esforço inútil colocar ordem no amontoado gigantesco de dados que é a web. Mas é só através deste tipo de iniciativa que teremos comunicação efetiva e transmissão de informação acessível. E estaremos nós, homens e máquinas, enfim falando a mesma língua.</p>

        <h3>Saiba mais</h3>
        <p><a title="HTML5" href="http://www.w3.org/html/wg/drafts/html/CR/">HTML5 &#8211; W3c </a><br />
            <a title="Periodic Table of the Elements" href="http://joshduck.com/periodic-table.html">Periodic Table of the Elements</a></p>
    </article>
</div>

<footer class="footer">
    <small>Este arquivo é parte da demomonstração de <i>CSS para impressão</i> e foi originalmente escrito pela <a href="http://www.popupdesign.com.br">Dani Guerrato</a> e publicado para o <a href="http://tableless.com.br">Tableless</a>.</small>
</footer>

</body>
</html>