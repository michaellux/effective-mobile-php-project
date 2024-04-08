<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Телефонный справочник</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Добавление контакта</h1>
        <form action="add.php" method="post">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" required>
            <label for="phone">Телефон:</label>
            <input type="tel" id="phone" name="phone" required>
            <button type="submit">Добавить</button>
        </form>
        <h2>Контакты</h2>
        <div class="contacts">
            <?php
            $contacts = json_decode(file_get_contents('contacts.json'), true);
            if (is_array($contacts) && !empty($contacts)) {
                echo "<table class='contacts-table'>";
                echo "<tr><th>Имя</th><th>Телефон</th><th>Действия</th></tr>";
                foreach ($contacts as $contact) {
                    echo "<tr><td>{$contact['name']}</td><td>{$contact['phone']}</td><td><a href='delete.php?id={$contact['id']}'>Удалить</a></td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Контактов нет</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
