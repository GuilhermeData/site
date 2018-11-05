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