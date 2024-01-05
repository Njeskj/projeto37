document.getElementById('id_produto').addEventListener('change', function () {
    var produtoId = this.value;

    // Limpar o conteúdo do span
    document.getElementById('valorVendaSpan').textContent = '';

    // Se um produto foi selecionado
    if (produtoId !== '') {
        // Fazer uma solicitação AJAX para obter o valor de venda do produto do banco de dados
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_valor_venda.php?produto_id=' + produtoId, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var valorVenda = parseFloat(xhr.responseText);

                // Exibir o valor de venda no span
                if (!isNaN(valorVenda)) {
                    document.getElementById('valorVendaSpan').textContent = valorVenda.toFixed(2);
                }

                // Atualizar o valor total ao modificar a quantidade
                atualizarValorTotal();
            }
        };
        xhr.send();
    }
});

// Adicionar um ouvinte de evento à quantidade para atualizar o valor total
document.getElementById('quantidade').addEventListener('input', function () {
    atualizarValorTotal();
});

// Função para calcular e exibir o valor total
function atualizarValorTotal() {
    var quantidade = parseFloat(document.getElementById('quantidade').value);
    var valorVenda = parseFloat(document.getElementById('valorVendaSpan').textContent);

    // Calcular o valor total
    var valorTotal = isNaN(quantidade) || isNaN(valorVenda) ? 0 : quantidade * valorVenda;

    // Exibir o valor total no campo correspondente
    document.getElementById('valor_total').value = valorTotal.toFixed(2);
}
