<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Passo 2</title>
</head>
<body>
    <h1>Cadastro - Passo 2: Pagamento e Confirmação</h1>
    
    <form action="processar.php" method="GET">
        
        <input type="hidden" name="data_nasc" value="<?php echo isset($_GET['data_nasc']) ? htmlspecialchars($_GET['data_nasc']) : ''; ?>">
        <input type="hidden" name="celular" value="<?php echo isset($_GET['celular']) ? htmlspecialchars($_GET['celular']) : ''; ?>">
        <input type="hidden" name="rua" value="<?php echo isset($_GET['rua']) ? htmlspecialchars($_GET['rua']) : ''; ?>">
        <input type="hidden" name="numero" value="<?php echo isset($_GET['numero']) ? htmlspecialchars($_GET['numero']) : ''; ?>">
        <input type="hidden" name="complemento" value="<?php echo isset($_GET['complemento']) ? htmlspecialchars($_GET['complemento']) : ''; ?>">
        <input type="hidden" name="cep" value="<?php echo isset($_GET['cep']) ? htmlspecialchars($_GET['cep']) : ''; ?>">
        <input type="hidden" name="cidade" value="<?php echo isset($_GET['cidade']) ? htmlspecialchars($_GET['cidade']) : ''; ?>">
        <input type="hidden" name="estado" value="<?php echo isset($_GET['estado']) ? htmlspecialchars($_GET['estado']) : ''; ?>">
        <input type="hidden" name="end_principal" value="<?php echo isset($_GET['end_principal']) ? htmlspecialchars($_GET['end_principal']) : ''; ?>">

        <fieldset>
            <legend>Confirmação dos Dados Pessoais</legend>
            <p><em>Verifique os dados preenchidos no passo anterior:</em></p>

            <label for="resumo_nome">Nome Completo:</label>
            <input type="text" id="resumo_nome" name="nome" value="<?php echo isset($_GET['nome']) ? htmlspecialchars($_GET['nome']) : ''; ?>" readonly>
            <br><br>

            <label for="resumo_cpf">CPF:</label>
            <input type="text" id="resumo_cpf" name="cpf" value="<?php echo isset($_GET['cpf']) ? htmlspecialchars($_GET['cpf']) : ''; ?>" readonly>
            <br><br>

            <label for="resumo_email">E-mail:</label>
            <input type="email" id="resumo_email" name="email" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>" readonly>
            <br><br>

            <label for="resumo_cidade">Cidade/Estado:</label>
            <input type="text" id="resumo_cidade" name="cidade_estado" 
                   value="<?php 
                        $cidade = isset($_GET['cidade']) ? htmlspecialchars($_GET['cidade']) : '';
                        $estado = isset($_GET['estado']) ? htmlspecialchars($_GET['estado']) : '';
                        echo $cidade . ' - ' . $estado; 
                   ?>" readonly>
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
        <button type="button" onclick="history.back()">Voltar e Corrigir</button>
        <button type="reset">Limpar Cartão</button>
        <button type="submit">Enviar Cadastro Final</button>
    </form>
</body>
</html>