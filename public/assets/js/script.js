function desativaBotao(nome) {
    $(nome).addClass('qt-loader qt-loader-mini qt-loader-right');
    $(nome).children().hide();
    $(nome).attr("disabled", true);
}

function ativarBotao(nome) {
    $(nome).removeClass('qt-loader qt-loader-mini qt-loader-right');
    $(nome).children().show();
    $(nome).attr("disabled", false);
}

function urlAtual() {
    return window.location.href;
}

function urlAbsoluta() {
    return "http://127.0.0.1:8000";
}

function selectOne() {
    $(".selectUm").select2();
}
