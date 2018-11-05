/* global createjs, hljs */

// Plugin para escrever esse código colorido que você está lendo
hljs.initHighlightingOnLoad();

// Precisamos de Flags. 
let movendoPortaSecreta = false;
let mudandoDeSessao = false;

// Nossa classe que faz a animação dos robôs
let myRobots = new Robots();

/** Ativado por um botão no HTML.
* Deixar no mudo ou deixar o som da animação rolar
*/
function mudarSom() {
    let icons = ['fa-volume-mute', 'fa-volume-up'];
    $('#icone-volume').removeClass(icons[~~myRobots.somAtivado]);
    myRobots.somAtivado = !myRobots.somAtivado;
    $('#icone-volume').addClass(icons[~~myRobots.somAtivado]);
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
                    $('#div-curriculo').html('<iframe style="width: 800px; height: 780px" src="curriculo_jose_guilherme_oliveira.pdf" frameBorder=0></iframe>');
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