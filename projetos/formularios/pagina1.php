<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Passo 1</title>
</head>
<body>
    <h1>Cadastro - Passo 1: Dados Pessoais</h1>
    <form action="pagina2.php" method="GET">
        
        <fieldset>
            <legend>Dados Pessoais</legend>
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" placeholder="Ex: João da Silva" required>
            <br><br>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="123.456.789-00" title="Formato: 123.456.789-00" required>
            <br><br>

            <label for="data_nasc">Data de Nascimento:</label>
            <input type="date" id="data_nasc" name="data_nasc" required>
        </fieldset>

        <fieldset>
            <legend>Contato</legend>
            <label for="celular">Celular:</label>
            <input type="tel" id="celular" name="celular" pattern="\(\d{2}\)\s\d{4,5}-\d{4}" placeholder="(00) 90000-0000" title="Formato: (00) 90000-0000" required>
            <br><br>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="exemplo@email.com" required>
        </fieldset>

        <fieldset>
            <legend>Endereço</legend>
            <label for="rua">Rua/Avenida:</label>
            <input type="text" id="rua" name="rua" placeholder="Ex: Av. Brasil" required>
            <br><br>

            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero" placeholder="123" required>
            <br><br>

            <label for="complemento">Complemento:</label>
            <input type="text" id="complemento" name="complemento" placeholder="Apto 45">
            <br><br>

            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" pattern="\d{5}-\d{3}" placeholder="12345-678" title="Formato: 12345-678" required>
            <br><br>

            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" placeholder="Sua Cidade" required>
            <br><br>

            <label for="estado">Estado (UF):</label>
            <select id="estado" name="estado" required>
                <option value="">Selecione...</option>
                <option value="GO">Goiás</option>
                <option value="SP">São Paulo</option>
                <option value="RJ">Rio de Janeiro</option>
                </select>
            <br><br>

            <input type="checkbox" id="end_principal" name="end_principal" value="sim">
            <label for="end_principal">Definir como endereço principal</label>
        </fieldset>
        
        <br>
        <button type="reset">Limpar</button>
        <button type="submit">Próximo</button>

    </form>
</body>
</html>