<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>GuilhermeData</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        
        <!-- Dependências -->
        <script type="text/javascript" src="assets/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="assets/velocity.min.js"></script>
        <script type="text/javascript" src="assets/EaselJS-0.8.2/lib/easeljs-0.8.2.min.js"></script>
        <script type="text/javascript" src="assets/TweenJS-0.6.2/lib/tweenjs-0.6.2.min.js"></script>
        <script type="text/javascript" src="assets/SoundJS-0.6.2/lib/soundjs-0.6.2.min.js"></script>
        <script type="text/javascript" src="assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/highlightjs/highlight.pack.js"></script>
        
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="css/default.css">
        <link rel="stylesheet" type="text/css" href="assets/highlightjs/styles/a11y-dark.css">
        <link rel="stylesheet" type="text/css" href="assets/fontawesome-free-5.4.2-web/css/all.min.css" />
        <!-- /. Dependências -->
        
        <!-- Arquivos do site -->
        <script type="text/javascript" src="js/robots.js"></script>
        <script type="text/javascript" src="js/helpers.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <!-- /. Arquivos do site -->
    </head>
    <body onload="init();">
        
        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right" id="menuPrincipal">
                        <li class="active sectionLink" id="link-apresentacao"><a>Apresentação</a></li>
                        <li class="sectionLink" id="link-demonstracoes"><a>Demostração</a></li>
                        <li class="sectionLink" id="link-resumo"><a>Resumo</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container section-container" id="section-apresentacao">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-md-offset-0 col-lg-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3">
                            <div class="foto"></div>
                        </div>
                        <div id="container-nome" class="col-xs-12 col-sm-9">
                            <div class="row">
                                <h2 class="titulo">José <span class="hideOnMobile">Guilherme</span> Oliveira</h2>
                                <div class="ajustado-esquerda">
                                    <p>
                                        Desenvolvedor Fullstack <br class="showOnMobile" /><i class="fa fa-heart"></i> apaixonado por JavaScript
                                    </p>
                                    <p>
                                        <i class="fas fa-envelope"></i> contato@guilhermedata.com.br
                                        <br />
                                        <i class="fa fa-icon fa-phone-square"></i> (51) 9956-47-872
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="apresentacao col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">

                    <h1></h1>
                    <p>Oi, sou brasileiro, gaúcho, técnico formado, marido da Lú e fã de games de estratégia. Tenho 27 anos de idade e os últimos 6 eu tenho dedicado ao desenvolvimento web. Eu gosto de pensar que programadores que criam plugins, apps, etc. são, além de tudo, inventores :) Inventamos soluções, experiências e, até, sensações.</p>
                    <p>Meus 6 anos de experiência se dividem em 2 grandes trabalhos: a criação de um ERP web completo para uma escola de inglês e a participação na equipe de desenvolvimento de um ERP intranet para uma grande empresa de suprimentos de informática. Além disso, claro, tenho meus estudos e experiências pessoais com desenvolvimento.</p>

                </div>
            </div>
        </div>
        
        <div class="container section-container" id="section-demonstracoes">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div>
                        <h1 class="titulo">Código em funcionamento</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-4 col-md-offset-2 col-lg-offset-2">
                    <div class="container" id="container-secreto">

                        <div id="container-porta1">
                            <div id="porta1" class="porta"></div>
                            <div id="borda1" class="borda"></div>
                        </div>
                        <div id="container-porta2">
                            <div id="borda2" class="borda"></div>
                            <div id="porta2" class="porta"></div>
                        </div>

                        <button onclick="limparTinta()" class="btn btn-primary" style="margin: 20px 0px 0px 50px;">Limpar tinta</button>
                        <button onclick="mudarSom()" class="btn btn-primary" style="margin: 20px 0px 0px 5px;"><i id="icone-volume" class="fas fa-volume-up"></i></button>
                        <button onclick="congelar()" class="btn btn-primary" style="margin: 20px 0px 0px 5px;"><i id="icone-playPause" class="fas fa-pause-circle"></i></button>

                        <div class="container-apresentacao" id="container-robots">
                            <canvas id="paintCanvas" width="320" height="430">Seu browser complica um pouco.</canvas>
                            <canvas id="robotsCanvas" width="320" height="430">Seu browser complica um pouco.</canvas>
                        </div>

                        <p style="margin-left: 50px;">Fabrica de robôs</p>
                    </div>
                </div>
                
                
                <div class="col-md-4 col-lg-4 kalamed">
                    <p class="titulo">Vamos ver como funcionam os robôs e todo o site.</p>
                    <br />
                    <p class="sub-titulo">Aqui temos:</p>
                    <br />
                    <p>> Javascript Orientado a Objetos (sem Typescript e com direito a um truque legal para heranças múltiplas DÁ UMA OLHADA!)</p>
                    <p>> Uma boa base de CreateJS</p>
                    <p>> Um pouquinho de VelocityJS</p>
                    <p>> Um pouquinho do bom e velho jQuery</p>
                    <p>> Funções matemáticas legais e úteis</p>
                </div>
            </div>
            
            <div class="row">
                
                <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
                    
                    <h1>index.js</h1>
                    
                    <pre>
                        <code class="javascript">
/* global createjs, hljs */

// Plugin para escrever esse código colorido que você está lendo
hljs.initHighlightingOnLoad();

// Precisamos de Flags. 
let movendoPortaSecreta = false;
let mudandoDeSessao = false;
let somAtivado = true;

// Nossa classe que faz a animação dos robôs
let myRobots = new Robots();

/** Ativado por um botão no HTML.
* Deixar no mudo ou deixar o som da animação rolar
*/
function mudarSom() {
    let icons = ['fa-volume-mute', 'fa-volume-up'];
    $('#icone-volume').removeClass(icons[~~somAtivado]);
    somAtivado = !somAtivado;
    $('#icone-volume').addClass(icons[~~somAtivado]);
}

/** Ativado por um botão no HTML.
* Acabar com todo o trabalho que os robôs tiveram
*/
function limparTinta() {
    myRobots.clearInk();
}

/** Ativado por um botão no HTML.
* Parar ou reiniciar a animação dos robôs
*/
function congelar() {
    toggleIcon(myRobots.togglePulse());
}

// Muda o ícone do botão da função "congelar()"
function toggleIcon(ficouParado) {
    let icons = ['fa-pause-circle', 'fa-play-circle'];
    $('#icone-playPause').removeClass(icons[~~!ficouParado]);
    $('#icone-playPause').addClass(icons[~~ficouParado]);
}

// Abre as portas e chama a função callback que vem como argumento
function abrirPortas(cb) {
    $('#container-porta1').velocity({left: -25}, 500, function() {
        $('#container-porta1').velocity({left: -155}, 500);
    });
    
    $('#container-porta2').velocity({left: 205}, 500, function() {
        $('#container-porta2').velocity({left: 335}, 500, function() {
            cb();
        });
    });
}

// Fecha e chama callback
function fecharPortas(cb) {
    $('#container-porta1').velocity({left: 0}, 0);
    $('#container-porta2').velocity({left: 180}, 0, function() {
        cb();
    });
}

/** Essa função encerra todas as animações
 * Primeiro desoculta o container onde fica tudo
 * Depois abre as portas
 * e por último inicia a animação dos robôs
 * 
 * Note que cada um dos passos chama o outro por meio de um callback, 
 * para que tudo se encadeie no tempo certo
 */
function ativarContainerSecreto() {
    
    // Apenas iniciamos qualquer animação se a última já terminou
    if(!movendoPortaSecreta) {
        
        movendoPortaSecreta = true;
        
        $('#container-secreto').velocity({opacity: 1, height: 620}, 500, ()=>{
            abrirPortas(function() {
                // Iniciamos a animação
                myRobots.pulsar();
                // Mudados o ícone de play para pause
                toggleIcon(false);
                // Depois zeramos a flag da animação da porta
                movendoPortaSecreta = false;
            });
        });
    }
}

// Caminho inverso da ativação
function desativarContainerSecreto() {
    
    if(!movendoPortaSecreta) {
        
        movendoPortaSecreta = true;
        
        fecharPortas(function() {
            $('#container-secreto').velocity({opacity: 0, height: 0}, 0, function() {
                // Paramos a animação
                myRobots.parar();
                // Novamente, mudamos o ícone
                toggleIcon(true);
                // Depois zeramos a flag da animação da porta
                movendoPortaSecreta = false;
            });
        });
    }
}

/** Isso determina que as animações comecem quando o link da demonstração for ativado
 * e que as animações parem quando o usuário estiver em outra parte do site.
 */
function acionarDemo() {
    if($('#link-demonstracoes').hasClass('active')) {
        ativarContainerSecreto();
    } else {
        desativarContainerSecreto();
    }
    
}

/** Essa função cria um efeito parecido com as abas do jQuery
 * Separando o site em 3 partes, que podem ser acessadas pelos links
 * do menu superior principal
 */
function separaPorSecoes() {
    
    // Inicial
    $('#section-apresentacao').fadeIn(500, 'linear');
    
    $('.sectionLink').on('click', function(){
        
        if(!mudandoDeSessao) {
        
            let qual = $(this).attr('id').split('link-')[1];

            if(!$('#link-' + qual).hasClass('active')) {
                
                mudandoDeSessao = true;

                $('.sectionLink').removeClass('active');
                $('#link-' + qual).addClass('active');
                
                $('.section-container').fadeOut(0);
                $('#section-' + qual).fadeIn(500, 'linear', function(){
                    
                    mudandoDeSessao = false;
                    
                    acionarDemo();
                });
                
                // Precisamos carregar o PDF apenas quando a tela é mostrada, caso contrário o PDF é carregado minúsculo pelo navegador.
                if(qual === 'resumo') {
                    $('#div-curriculo').html('aqui o código do iframe');
                }
            }
        }
    });
}

// Pequeno controle estético que muda umas coisinhas dependendo do tamanho da tela do usuário
function onResize() {

    if($(window).width() < 768) {

        // Mobile

        if( !$('#container-nome').hasClass('text-center')) {
            $('#container-nome').addClass('text-center');
        }

        if( $('.foto').css('float') === 'right') {
            $('.foto').css('float', 'none');
        }

        $('.apresentacao').css('fontSize', 16);

        $('.showOnMobile').show();
        $('.hideOnMobile').hide();


    } else {

        // pc

        if($('#container-nome').hasClass('text-center')) {
            $('#container-nome').removeClass('text-center');
        } 

        if( $('.foto').css('float') === 'none') {
            $('.foto').css('float', 'right');
        }

        $('.apresentacao').css('fontSize', 18);

        $('.showOnMobile').hide();
        $('.hideOnMobile').show();

    }
}

/** É chamada quando o body for totalmente carregado
 * Aqui separamos o site nas sessões,
 * Pré carregamos os sons usados pelos robôs
 * Iniciamos os robôs e ativamos o controle do tamanho da tela
 */
function init() {
    
    separaPorSecoes();
    
    createjs.Sound.registerSound("sounds/explode.wav", "Explode");
    createjs.Sound.registerSound("sounds/pip2.wav", "Pip");
    createjs.Sound.registerSound("sounds/target_detected.wav", "Detected");

    myRobots.inicializar();
    
    onResize();
    $(window).resize(onResize);
}
                        </code>
                    </pre>
                    
                    <p>Esse é o arquivo que coordena tudo no site. Em especial o container secreto que abre as portas e mostra a animação dos robôs. Lobo abaixo temos o arquivo com a classe dos robôs, responsável por tudo relacionado à eles.</p>
                    
                </div>
            </div>
            
            <div class="row">
                
                <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
                    
                    <h1>robots.js</h1>
                    
                    <pre>
                        <code class="javascript">
/* global createjs */

function Robots()
{
    // Isso é importante para usar o this de Robots dentro de funções que estão dentro de funções
    const __this = this;
    
    // Só para relembrar: tudo que é declarado como variável normal dentro da classe (usando let, const ou var, e funções declaradas normalmente)
    // fica como um atributo privado da classe, quando comparamos com OO em linguagens como o PHP, por exemplo
    let stage = {};
    let paintStage = {};
    
    let universe = {};
    let placa = {};
    let tintas = [];
    let timeToCreateNewBot = 240;
    let next_id = 0;
    // Arrow functions :)
    const getNewId = () => next_id++;
    
    // Já aquilo que declaramos como parâmetro de this, fica como atributo público da classe.
    this.pulseEvent = null;
    this.somAtivado = true;
    
    this.togglePulse = function() {
        if(__this.pulseEvent) {
            __this.parar();
            return true;
        } else {
            __this.pulsar();
            return false;
        }
    };
    
    this.clearInk = function() {
        paintStage.removeAllChildren();
        placa = new Placa(paintStage);
        tintas = [];
        paintStage.update();
    };
    
    this.pulsar = function() {
        __this.parar();
        if(!__this.pulseEvent) {
            __this.pulseEvent = createjs.Ticker.addEventListener("tick", function() {

                timeToCreateNewBot--;
                if(timeToCreateNewBot === 0) {
                    let idBot = getNewId();
                    universe[idBot] = new Bot(stage, paintStage, idBot, 140, 415);
                    timeToCreateNewBot = 240;
                }

                for(let id in universe) {
                    if(universe[id].autoUpdateOneTick)
                        universe[id].autoUpdateOneTick(placa, universe, tintas);
                }
                stage.update();
            });
        }
        paintStage.update();
    };
    
    this.parar = function() {
        createjs.Ticker.removeEventListener("tick", __this.pulseEvent);
        __this.pulseEvent = null;
    };
    
    this.inicializar = function() {
        stage = new createjs.Stage("robotsCanvas");
        paintStage = new createjs.Stage("paintCanvas");
        createjs.Ticker.setFPS(60);
        
        criarElementos();
    };
    
    function criarElementos() {
        
        __this.clearInk();
        
        let idBot1 = getNewId();
        universe[idBot1] = new Bot(stage, paintStage, idBot1, 100, 300);
        
        let idBot2 = getNewId();
        universe[idBot2] = new Bot(stage, paintStage, idBot2, 200, 300);
        
        universe[getNewId()] = new FabricaDeRobos(stage);
    }
    
    /** Aqui temos as CLASSES ABSTRATAS
     * Preste atenção que aqui começa a grande sacada das heranças múltiplas
     */
    
    /** Entidade() nunca vai ser instanciada com o new, pois é uma classe abstrata
    * ela serve apenas para entregar seus atributos de herança para classes concretas
    */
    function Entidade()
    {
        this.posicaoX = 0;
        this.posicaoY = 0;

        this.setX = function(n) {
            this.posicaoX = n;
            if(this.s) {
                this.s.x = n;
            }
            return n;
        };

        this.setY = function(n) {
            this.posicaoY = n;
            if(this.s) {
                this.s.y = n;
            }
            return n;
        };
    }
    
    /** Mais uma CLASSE ABSTRATA que também nunca será instanciada sozinha
     */
    function ComMovimento()
    {
        this.destinoX = 0;
        this.destinoY = 0;

        this.velocidade = 3;

        this.unidadeDeMovimentoX = 1;
        this.unidadeDeMovimentoY = 1;

        this.estaParado = function() {
            return (this.destinoX === this.posicaoX && this.destinoY === this.posicaoY);
        };

        this.pararMovimento = function() {
            this.destinoX = this.posicaoX;
            this.destinoY = this.posicaoY;
        };

        this.escolherDestino = function(x, y) {

            let catetoA = Math.abs(x - this.posicaoX);
            let catetoB = Math.abs(y - this.posicaoY);
            let total =  catetoA + catetoB;

            this.unidadeDeMovimentoX = catetoA / total;
            this.unidadeDeMovimentoY = catetoB / total;

            this.destinoX = x;
            this.destinoY = y;
        };

        this.atualizarPosicaoUmTick = function() {
            if(this.destinoX > this.posicaoX) {
                this.setX(this.posicaoX + (this.unidadeDeMovimentoX * this.velocidade));
                if(this.destinoX < this.posicaoX) {
                    this.setX(this.destinoX);
                }
            }

            if(this.destinoX < this.posicaoX) {
                this.setX(this.posicaoX - (this.unidadeDeMovimentoX * this.velocidade));
                if(this.destinoX > this.posicaoX) {
                    this.setX(this.destinoX);
                }
            }

            if(this.destinoY > this.posicaoY) {
                this.setY(this.posicaoY + (this.unidadeDeMovimentoY * this.velocidade));
                if(this.destinoY < this.posicaoY) {
                    this.setY(this.destinoY);
                }
            }

            if(this.destinoY < this.posicaoY) {
                this.setY(this.posicaoY - (this.unidadeDeMovimentoY * this.velocidade));
                if(this.destinoY > this.posicaoY) {
                    this.setY(this.destinoY);
                }
            }
        };
    };
    
    /** Aqui temos as CLASSES que serão instanciadas
     * 
     * O grande pulo do gato está no apply ali no início.
     * 
     * Quando fazemos isso todas as propriedades e métodos da classe abstrata Entidade()
     * passam a ser incorporados no novo objeto criado por new Placa()
     */
    function Placa(stage)
    {
        // pulo do gato ;)
        Entidade.apply(this);

        const _this = this;

        this.width = 0;
        this.height = 0;

        this.setWidth = function(n) {
            this.width = n;
            return n;
        };

        this.setHeight = function(n) {
            this.height = n;
            return n;
        };

        let txt = new createjs.Text("", "16px Montserrat", "#FFF");

        txt.text = "PaintBots!\n\n";
        txt.text += "Robôs de alta tecnologia treinados para pintar com tinta branca qualquer placa onde esteja escrito: Hello World";

        txt.lineWidth = 220;
        txt.lineHeight = 18;
        txt.textBaseline = "top";
        txt.textAlign = "left";

        let pad = 20;
        let borderWidth = 2;

        txt.y = pad + borderWidth + 20;
        txt.x = pad + borderWidth + 30;
        stage.addChild(txt);

        // use getBounds to dynamically draw a background for our text:
        let bounds = txt.getBounds();
        let bg = new createjs.Shape();
        bg.graphics.beginLinearGradientFill(["#00C","#00A"], [0, 1], 0, 20, 0, 120)
        .drawRoundRectComplex(
            txt.x - pad + bounds.x, 
            txt.y - pad + bounds.y, 
            bounds.width + (pad * 2), 
            bounds.height + (pad * 3),
            16, 16, 16, 16);

        stage.addChildAt(bg, 0);

        let bgBorder = new createjs.Shape();
        bgBorder.graphics.beginFill("#000").drawRoundRectComplex(
            _this.setX(txt.x - pad + bounds.x - borderWidth), 
            _this.setY(txt.y - pad + bounds.y - borderWidth), 
            _this.setWidth(bounds.width + (pad * 2) + (borderWidth * 2)), 
            _this.setHeight(bounds.height + (pad * 3) + (borderWidth * 2)),
            16, 16, 16, 16);
        stage.addChildAt(bgBorder, 0);
    }

    function FabricaDeRobos(stage)
    {
        Entidade.apply(this);

        var bitmap = new createjs.Bitmap("img/factory.png");

        bitmap.scaleX = 0.3;
        bitmap.scaleY = 0.3;

        bitmap.y = 280;
        bitmap.x = 30;

        stage.addChild(bitmap);
    }

    function manchaDeTinta(stage, tintas, x, y)
    {
        let max = 1000;
        let area1 = gerarNumero(2, 4, true);

        while(--area1 >= 0) {
            let s = new createjs.Shape();
            s.graphics.beginFill('#FFF').drawCircle(0, 0, 1);
            s.x = x + gerarNumero(-15, 15, true);
            s.y = y + gerarNumero(-15, 15, true);
            createjs.Tween.get(s).to({scaleX: gerarNumero(10, 20, true), scaleY: gerarNumero(10, 20, true)}, 40);
            tintas.push(s);
            if(tintas.length > max) {
                stage.removeChild(tintas.splice(0,1)[0]);
            }
            stage.addChild(s);
        }

        let area2 = gerarNumero(3, 8, true);

        while(--area2 >= 0) {
            let s = new createjs.Shape();
            s.graphics.beginFill('#FFF').drawCircle(0, 0, 1);
            s.x = x + gerarNumero(-30, 30, true);
            s.y = y + gerarNumero(-30, 30, true);
            createjs.Tween.get(s).to({scaleX: gerarNumero(5, 12, true), scaleY: gerarNumero(5, 12, true)}, 40);
            tintas.push(s);
            if(tintas.length > max) {
                stage.removeChild(tintas.splice(0,1)[0]);
            }
            stage.addChild(s);
        }

        let area3 = gerarNumero(6, 16, true);

        while(--area3 >= 0) {
            let s = new createjs.Shape();
            s.graphics.beginFill('#FFF').drawCircle(0, 0, 1);
            s.x = x + gerarNumero(-40, 40, true);
            s.y = y + gerarNumero(-40, 40, true);
            createjs.Tween.get(s).to({scaleX: gerarNumero(3, 8, true), scaleY: gerarNumero(3, 8, true)}, 40);
            tintas.push(s);
            if(tintas.length > max) {
                stage.removeChild(tintas.splice(0,1)[0]);
            }
            stage.addChild(s);
        }

        setTimeout(()=>{
            stage.update();
        },60);
    }
    
    /** Aqui temos uma herança múltipla!!
     * A classe Bot tem todos os parâmetros e métodos de uma Entidade() ComMovimento() ;)
     * Pense nas grandes abstrações e coisas legais que podemos fazer com isso.
     */
    function Bot(stage, paintStage, id_in_universe, x, y)
    {
        Entidade.apply(this);
        ComMovimento.apply(this);
        
        // note que esse this interno tem apenas um underline na frente, 
        // para diferenciar do this de Robots, que tem dois underlines
        const _this = this;

        this.stage = stage;
        this.paintStage = paintStage;
        this.id = id_in_universe;

        this.bodyColor = 'rgba(154, 126, 126, 1)'; //#9a7e7e
        this.raio = 10;
        this.alvoEscolhido = null;
        this.autoDestruir = false;
        this.processoAutoDestruicaoIniciado = false;

        this.s = new createjs.Container();

        this.corpo = criarCorpo();
        this.cabeca = criarCabeca('green');
        this.tanqueDeTinta = criarTanqueDetinta();
        this.texto = escreverNoTanqueDeTinta();
        this.conector1 = criarConector(-2);
        this.conector2 = criarConector(2);

        this.s.addChild(this.corpo, this.cabeca, this.tanqueDeTinta, this.conector1, this.conector2, this.texto);

        this.escolherDestino(this.setX(x)+80, this.setY(y));
        stage.addChild(this.s);
        stage.setChildIndex(this.s, 0);

        this.autoUpdateOneTick = function(placa, universe, tintas) {

            if(_this.atualizarPosicaoUmTick) {
                _this.atualizarPosicaoUmTick();
            }

            // Procura alvos
            if(!_this.alvoEscolhido) {
                verificarPlaca(placa);
            } else {
                verificarAutoDestruicao(universe, tintas);
            }
        };

        function atacar() {

            _this.pararMovimento();

            // sound
            if(__this.somAtivado)
            createjs.Sound.play("Detected").volume = 1;

            // Animação de ataque
            _this.cabeca.graphics.beginFill('red').drawCircle(0, 0, _this.raio / 3);

            setTimeout(()=>{
                _this.cabeca.graphics.beginFill('green').drawCircle(0, 0, _this.raio / 3);
            },50);

            setTimeout(()=>{
                _this.cabeca.graphics.beginFill('red').drawCircle(0, 0, _this.raio / 3);
            },100);

            setTimeout(()=>{
                _this.cabeca.graphics.beginFill('green').drawCircle(0, 0, _this.raio / 3);
            },150);

            setTimeout(()=>{
                _this.cabeca.graphics.beginFill('red').drawCircle(0, 0, _this.raio / 3);
            },200);

            setTimeout(()=>{
                _this.cabeca.graphics.beginFill('green').drawCircle(0, 0, _this.raio / 3);
            },250);

            setTimeout(()=>{
                _this.cabeca.graphics.beginFill('red').drawCircle(0, 0, _this.raio / 3);
            },300);

            let padding = 20;

            setTimeout(()=>{
                _this.escolherDestino(
                    gerarNumero(
                        _this.alvoEscolhido.posicaoX + padding, 
                        _this.alvoEscolhido.posicaoX + _this.alvoEscolhido.width - padding), 

                    gerarNumero(
                        _this.alvoEscolhido.posicaoY + padding, 
                        _this.alvoEscolhido.posicaoY + _this.alvoEscolhido.height - padding));

                _this.autoDestruir = true;
            },1000);
        }

        function estaSobre(sensores, x, y, w, h) {
            let retorno = false;
            sensores.map(item=>{
                if(item[0] >= x && item[0] <= (x + w) &&
                        item[1] >= y && item[1] <= (y + h)) {

                    retorno = true;
                }
            });
            return retorno;
        }

        function verificarPlaca(placa) {

            // sensores
            let sensores = [
                [_this.posicaoX, _this.posicaoY - _this.raio], // topo
                [_this.posicaoX, _this.posicaoY + _this.raio], // baixo
                [_this.posicaoX - _this.raio, _this.posicaoY], // esquerda
                [_this.posicaoX + _this.raio, _this.posicaoY] // direita
            ];

            // Vejo se está sobre uma placa

            if(estaSobre(
                sensores,
                placa.posicaoX, 
                placa.posicaoY, 
                placa.width, 
                placa.height)) {

                _this.alvoEscolhido = placa;
                atacar();
            }
        }

        function verificarAutoDestruicao(universe, tintas) {
            if(_this.autoDestruir && _this.estaParado() && !_this.processoAutoDestruicaoIniciado) {

                // Animação de autoDestruição
                setTimeout(()=>{
                    _this.s.addChild(criarContador(1));
                    // sound
                    if(__this.somAtivado)
                    createjs.Sound.play("Pip").volume = 1;
                },200);

                setTimeout(()=>{
                    _this.s.addChild(criarContador(2));
                    // sound
                    if(__this.somAtivado)
                    createjs.Sound.play("Pip").volume = 1;
                },400);

                setTimeout(()=>{
                    _this.s.addChild(criarContador(3));
                    // sound
                    if(__this.somAtivado)
                    createjs.Sound.play("Pip").volume = 1;
                },500);

                setTimeout(()=>{

                    _this.s.addChild(criarContador(4));
                    // sound
                    if(__this.somAtivado)
                    createjs.Sound.play("Pip").volume = 1;

                    let explode = new createjs.Shape();
                    explode.graphics.beginFill('red').drawCircle(0, 0, _this.raio / 4);
                    _this.s.addChild(explode);

                    createjs.Tween.get(explode).to({scaleX: 1, scaleY: 7, alpha: 0}, 50);

                    setTimeout(()=>{
                        createjs.Tween.get(_this.tanqueDeTinta).to({scaleX: 1.5, scaleY: 1.5, alpha: 0}, 100);
                        createjs.Tween.get(_this.cabeca).to({scaleX: 2, scaleY: 3, alpha: 0}, 100);
                        createjs.Tween.get(_this.corpo).to({scaleX: 0.4, scaleY: 0.6, alpha: 0}, 100);
                        createjs.Tween.get(_this.conector1).to({scaleX: 2, scaleY: 2, alpha: 0}, 100);
                        createjs.Tween.get(_this.conector2).to({scaleX: 2, scaleY: 2, alpha: 0}, 100);

                        // Sound
                        if(__this.somAtivado)
                        createjs.Sound.play("Explode").volume = 1;

                    },50);

                    setTimeout(()=>{
                        byebye(universe, tintas);
                    },150);

                },550);

                _this.processoAutoDestruicaoIniciado = true;
            }
        }

        function byebye(universe, tintas) {
            if(universe[_this.id]) {
                _this.stage.removeChild(_this.s);
                _this.s.removeAllChildren();
                manchaDeTinta(_this.paintStage, tintas, _this.posicaoX, _this.posicaoY);
                delete universe[_this.id];
            }
        }

        function criarCorpo() {
            let corpo = new createjs.Shape();
            corpo.graphics.beginFill(_this.bodyColor).drawPolyStar(0, 0, _this.raio, 8, 0, -90);
            corpo.graphics.beginStroke('black').drawPolyStar(0, 0, _this.raio, 8, 0, -90);

            return corpo;
        } 

        function criarCabeca(color) {
            let cabeca = new createjs.Shape();
            cabeca.graphics.beginFill(color).drawCircle(0, 0, _this.raio / 3);
            cabeca.graphics.beginStroke('#CCC').drawCircle(0, 0, _this.raio / 3);

            return cabeca;
        }

        function criarTanqueDetinta() {
            let tanqueDeTinta = new createjs.Shape();
            tanqueDeTinta.graphics.beginStroke('black').drawRoundRectComplex(-17, -(_this.raio), 8, _this.raio*2, 5, 5, 0, 0);
            tanqueDeTinta.graphics.beginFill('white').drawRoundRectComplex(-17, -(_this.raio), 8, _this.raio*2, 5, 5, 0, 0);

            return tanqueDeTinta;
        }

        function escreverNoTanqueDeTinta() {

            let txt = new createjs.Text("", "6px Arial", "#000");

            txt.text = "I\nN\nK";
            txt.lineWidth = 8;
            txt.lineHeight = 6;
            txt.textBaseline = "top";
            txt.textAlign = "center";
            txt.y =  -(_this.raio)+1;
            txt.x = -13;
            return txt;
        }

        function criarConector(num) {
            let conector = new createjs.Shape();

            let posicaoInicial =  {x: -_this.raio - 5, y: -_this.raio};
            let controleBezier1 =  {x: gerarNumero(-10, -8), y: gerarNumero(-20, -15)};
            let controleBezier2 =  {x: gerarNumero(-5, -8), y: gerarNumero(-15, -11)};
            let posicaoFinal = {x: num, y: -_this.raio};

            conector.graphics.setStrokeStyle(1, 'round', 'round');
            conector.graphics.beginStroke("#000");

            conector.graphics.moveTo(posicaoInicial.x, posicaoInicial.y);
            conector.graphics.bezierCurveTo( 
                controleBezier1.x, controleBezier1.y, 
                controleBezier2.x, controleBezier2.y, 
                posicaoFinal.x, posicaoFinal.y);

            return conector;
        }

        function criarContador(num) {
            let contador = new createjs.Shape();
            contador.graphics.beginFill('red').drawRect(
                    -_this.raio + (_this.raio/2 * (num -1)), 
                    - (_this.raio*2), 
                    _this.raio/2, 
                    _this.raio/2);


            contador.graphics.beginStroke('#ccc').drawRect(
                    -_this.raio + (_this.raio/2 * (num -1)), 
                    - (_this.raio*2), 
                    _this.raio/2, 
                    _this.raio/2);

            return contador;
        }

        // Autowalk
        setInterval(()=>{
            if(!_this.alvoEscolhido) {
                _this.escolherDestino(gerarNumero(20, stage.canvas.width-20), gerarNumero(20, stage.canvas.height-20));
            }
        },gerarNumero(2000, 3000));
    }
}
                        </code>
                    </pre>
                    
                    <p>Perceba que eu declarei as classes abstratas e concretas dentro de uma outra classe 'mãe' chamada Robots, para que as variáveis 'globais' (somAtivado, por exemplo) usadas pelos objetos fiquem 'confinadas' dentro de um universo próprio, sem poluir o escopo global do site. Isso também permite que tenhamos várias instâncias diferentes de Robots ao mesmo tempo, cada uma com as próprias configurações funcionando independentemente.</p>
                </div>
            </div>
            
            <div class="row">
                
                <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
                    
                    <h1>helpers.js</h1>
                    
                    <pre>
                        <code class="javascript">
function gerarNumero(min, max, round = false) {
    let num = Math.random() * (max - min) + min;
    return round ? Math.round(num) : num;
}

function maximo(num, max) {
    return num > max ? max : num;
}

function criarPontosLinhaBezierCubicaVertical(posicaoInicial, inclinacao1, inclinacao2, posicaoFinal) {
    return [
        {x: posicaoInicial.x, y: posicaoInicial.y}, 
        {x: posicaoInicial.x + inclinacao1.x, y: posicaoInicial.y + inclinacao1.y}, 
        {x: posicaoInicial.x + inclinacao2.x, y: posicaoInicial.y + inclinacao2.y}, 
        {x: posicaoFinal.x, y: posicaoFinal.y}];
}

function curvaQuadraticaByBezier(t, p0, p1, p2) {
    let u = 1 - t;
    let uu = u * u;
    let tt = t * t;
    
    let b = {x: 0, y: 0};
    b.x = uu*p0.x + 2*u*t*p1.x + tt*p2.x;
    b.y = uu*p0.y + 2*u*t*p1.y + tt*p2.y;
    return b;
} 

function curvaCubicaByBezier(t, p0, p1, p2, p3) {
    let u = 1 - t;
    let uu = u * u;
    let tt = t * t;
    let uuu = u * u * u;
    let ttt = t * t * t;
    
    let b = {x: 0, y: 0};
    b.x = uuu*p0.x + 3*uu*t*p1.x + 3*u*tt*p2.x + ttt*p3.x;
    b.y = uuu*p0.y + 3*uu*t*p1.y + 3*u*tt*p2.y + ttt*p3.y;
    return b;
}
                        </code>
                    </pre>
                    
                    <p>Aqui temos um arquivo com funções utilizadas em todo canto do sistema. Eu poderia ter declarado essas funções e variáveis lá no index.js, mas resolvi separar por uma questão de organização, pois são funções matemáticas genéricas que podem ser usadas em mais de um projeto.</p>
                    
                </div>
            </div>
            
            <div class="row">
                
                <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
                    
                    <h1>index.php</h1>
                    
                    <pre>
                        <code class="javascript">
 // Pressione Ctrl + U
                        </code>
                    </pre>
                    
                    <p>Para ver o conteúdo do index.php olhe o código fonte da página. Ali você verá todas as dependências que usei para fazer o site e como tudo está estruturado.</p>
                </div>
            </div>
            
            <div class="row">
                
                <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
                    <h1>Resumindo</h1>
                    <p>Temos o index.php com todas as dependências linkadas no header do seu html, e fora as dependências existem apenas mais três arquivos que formam o sistema:</p>
                    <ul>
                        <li>index.js</li>
                        <li>robots.js</li>
                        <li>helpers.js</li>
                    </ul>
                    <p>Vou deixar o site completo lá no Github <a target="_blank" href="https://github.com/GuilhermeData/site">(GuilhermeData/site)</a>, dá uma chegada lá para ver a estrutura das pastas e as imagens e sons que eu usei, e já confere meu outro projeto <a target="_blank" href="https://github.com/GuilhermeData/bulletpool">(GuilhermeData/bulletpool)</a>, que está no começo ainda mas a ideia é que se torne um modelo para criação de jogos de navegador multiplayer, usando socket.io.</p>
                    
                </div>
            </div>
        </div>
        
        <div class="container section-container" id="section-resumo">
            <div class="row">
                <div class="col-md-8 col-md-offset-2" id="div-curriculo"></div>
            </div>
        </div>
        
        <footer></footer>
    </body>
</html>
