<style>
    body {
        text-align: center;
    }
    input {
        display: block;
        margin: 1em auto;
        text-align: center;
        background: rgba(255,255,255,.3);
    }
    input::placeholder {
        color: lightgray;
    }
    input[type=submit] {
        padding: 0.5em;
    }
</style>

<h1>Acesso Restrito</h1>

<form action="" method="post">
    <input type="text" name="username" placeholder="Nome de Usuário" autofocus autocomplete="off" value="<?= $un ?>">
    <input type="password" name="password" placeholder="Senha" value="<?= $pw ?>">

    <input type="submit" value="Logar">
</form>