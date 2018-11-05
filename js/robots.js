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