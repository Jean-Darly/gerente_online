<!DOCTYPE html>
<html>

<head>
    <title>Impressão</title>
</head>

<body>
    <pre>
    @php
        if (array_key_exists('azul', $_POST)) {
            echo "O campo 'AZUL' existe no array";
        } elseif (array_key_exists('cinza', $_POST)) {
            echo "O campo 'CINZA' existe no array";
        } elseif (array_key_exists('laranja', $_POST)) {
            echo "O campo 'LARANJA' existe no array";
        }
        print_r($_POST);
        var_dump($_POST);
    @endphp
    </pre>
</body>

</html>