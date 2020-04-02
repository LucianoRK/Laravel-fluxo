function myMasks(){
    $('.cepMask').mask('00000-000');
    $('.cpfMask').mask('000.000.000-00');
    $('.cnpjMask').mask('00.000.000/0000-00');
    $('.celularMask').mask('(00) 0 0000-0000');
    $('.telefoneMask').mask('(00) 00000-0000');
    $('.valorMask').mask('#.##0,00', {
        reverse: true
    });
}