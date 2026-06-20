<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Passo 2</title>
</head>
<body>
    <h1>Cadastro - Passo 2: Pagamento</h1>
    
    <form action="processar.php" method="GET">
        <fieldset>
            <legend>Confirmação dos Dados Pessoais</legend>
            <p> <i>Verifique os dados preenchidos no passo anterior: </i><p>
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" placeholder="Ex: João da Silva" required>
            <br><br>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="123.456.789-00" title="Formato: 123.456.789-00" required>
            <br><br>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="exemplo@email.com" required>
            <br><br>
            <label for="cidade">Cidade/Estado:</label>
            <input type="text" id="cidade" name="cidade" placeholder="Goiânia - GO" required>
        </fieldset>
        <fieldset>
            <legend>Dados do Cartão de Crédito</legend>
            <label for="nome_cartao">Nome Impresso no Cartão:</label>
            <input type="text" id="nome_cartao" name="nome_cartao" placeholder="JOAO DA SILVA" required>
            <br><br>
            <label for="num_cartao">Número do Cartão:</label>
            <input type="text" id="num_cartao" name="num_cartao" pattern="\d{16}" placeholder="1234567812345678" title="Apenas os 16 números, sem espaços" required>
            <br><br>
            <label for="validade">Validade (MM/AA):</label>
            <input type="text" id="validade" name="validade" pattern="(0[1-9]|1[0-2])\/\d{2}" placeholder="12/30" title="Formato: MM/AA" required>
            <br><br>
            <label for="cvv">Código de Segurança (CVV):</label>
            <input type="text" id="cvv" name="cvv" pattern="\d{3,4}" placeholder="123" title="3 ou 4 dígitos numéricos" required>
        </fieldset>
        <br>
        <button type="button" onclick="history.back()">Voltar</button>
        <button type="reset">Limpar</button>
        <button type="submit">Enviar Cadastro Final</button>
    </form>
</body>
</html>