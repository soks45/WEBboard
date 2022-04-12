<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <header class="container">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Board</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="http://webboard/index.php">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=property">Недвижимость</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=rent">Аренда</a>
                        </li>
                    </ul>

                        <?php
                            if (!isset($_SESSION['login']) )
                            {
                                echo '<form class="d-flex" method="post">';
                                echo '<input class="form-control me-2" type="text" placeholder="Логин" name="login" aria-label="Логин"/>';
                                echo '<input class="form-control me-2" type="password" placeholder="Пароль" name="password" aria-label="Пароль"/>';
                                echo '<button class="btn btn-outline-success" type="submit">Войти</button>';
                                echo '</form>';
                            }
                            else {;
                                echo '<a class="nav-link" style="color: aliceblue;" href="#">Привет, ' . $_SESSION['first_name'] . ' ' . $_SESSION['second_name'] . '</a>';
                                echo '<a class="btn btn-outline-success my-2 my-sm-0" href="index.php?logout=1">Выйти</a>';
                            }
                        ?>
                </div>
            </div>
        </nav>
    </header>