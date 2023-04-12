<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title><?= $this->renderSection('title')?></title>
    <link rel="stylesheet" type="text/css" href="../../public/index.css"/>
    <style>
        .lala{
            background-color: #53AFAF;
        }
        .btnPink{
            background: #FDCFDF;
        }
        body {
        padding-top: 3rem;
        padding-bottom: 3rem;
        color: #5a5a5a;
        }
        .carousel {
            margin-bottom: 4rem;
        }
        .carousel-caption {
            bottom: 3rem;
            z-index: 10;
        }
        .carousel-item {
            height: 32rem;
        }
        .carousel-item > img {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            height: 32rem;
        }
        .marketing .col-lg-4 {
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .marketing h2 {
            font-weight: 400;
        }
        .marketing .col-lg-4 p {
            margin-right: .75rem;
            margin-left: .75rem;
        }
        
        .featurette-divider {
            margin: 5rem 0; 
        }

        .featurette-heading {
            font-weight: 300;
            line-height: 1;
            letter-spacing: -.05rem;
        }
        
        
        /* RESPONSIVE CSS
        -------------------------------------------------- */
        
        @media (min-width: 40em) {

            .carousel-caption p {
            margin-bottom: 1.25rem;
            font-size: 1.25rem;
            line-height: 1.4;
            }
        
            .featurette-heading {
            font-size: 50px;
            }
        }
        
        @media (min-width: 62em) {
       }
    </style>

</head>

<body>
    <nav class="navbar navbar-light lala">
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Search">
        <button class="btn btnPink" type="submit">
        <img src="https://cdn3.iconfinder.com/data/icons/mix-and-miscellaneous/93/handrawn_search_magnify-512.png" alt="Pesquisar" height="25" width="25"><img> 
        </button>
    
    </form>
        <ul class="nav justify-content-end">

            <li class="nav-item">
                <a class="nav-link active" href="#">Quem somos nós?</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Desconectar</a>
            </li>
            <li class="nav-item">
                <button class="btn btnPink" type="submit">
                    Meu perfil
                    <img src="https://cdn0.iconfinder.com/data/icons/eon-social-media-contact-info-2/32/user_people_person_users_man-256.png" alt="Pesquisar" height="25" width="25"><img> 
                </button>
            </li>
        </ul>

        
    </nav>    
    <?= $this->renderSection('content');?>

</body>
</html>








       .featurette-heading {
            margin-top: 7rem;
            }
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-light lala">
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Search">
        <button class="btn btnPink" type="submit">
        <img src="https://cdn3.iconfinder.com/data/icons/mix-and-miscellaneous/93/handrawn_search_magnify-512.png" alt="Pesquisar" height="25" width="25"><img> 
        </button>
    
    </form>
        <ul class="nav justify-content-end">

            <li class="nav-item">
                <a class="nav-link active" href="#">Quem somos nós?</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Desconectar</a>
            </li>
            <li class="nav-item">
                <button class="btn btnPink" type="submit">
                    Meu perfil
                    <img src="https://cdn0.iconfinder.com/data/icons/eon-social-media-contact-info-2/32/user_people_person_users_man-256.png" alt="Pesquisar" height="25" width="25"><img> 
                </button>
            </li>
        </ul>

        
    </nav>    
    <?= $this->renderSection('content');?>

</body>
</html>