<!DOCTYPE html>
<html lang="en">
<>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title><?= $this->renderSection('title')?></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
    <link rel="stylesheet" type="text/css" href="../../public/index.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="icon" href="<?= base_url()?>/favicon.ico" type="image/x-icon">

    <style>
        .lala{
            background-color: #53AFAF;
        }
        .btnPink{
            background: #FDCFDF;
        }

        .btnPink2{
            background: #FDCFDF;
            width:120px;
            height:43px;
        }
        
        body {
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
        .img {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            height: 32rem;
        }

        .slider-container img{
            width: 100%;
            height: 400px;
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
            font-weight: 300px;
            line-height: 1px;
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

    <header>
        <nav class="navbar navbar-light lala">
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Search">
                <button class="btn btnPink" type="submit">
                <img src="https://cdn3.iconfinder.com/data/icons/mix-and-miscellaneous/93/handrawn_search_magnify-512.png" alt="Pesquisar" height="25" width="25">
                </button>
            </form>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <div class="w3-dropdown-click">
                           <button class="btn btnPink2" onclick="myFunction()">
                                 <img src="https://cdn0.iconfinder.com/data/icons/eon-social-media-contact-info-2/32/user_people_person_users_man-256.png" alt="Pesquisar" height="25" width="25"><img>  <i class="fa fa-caret-down"></i>
                            </button>
                            <div id="demo" class="w3-dropdown-content w3-bar-block w3-card-4">
                                <a href="#" class="w3-bar-item w3-button">Meu Perfil</a>
                                <a href="#" class="w3-bar-item w3-button">Configurações</a>
                                <a href="#" class="w3-bar-item w3-button">Sair</a>
                            </div>
                    </li>
                </ul>
        </nav>

        <script>
            function myFunction() {
                var x = document.getElementById("demo");
                    if (x.className.indexOf("w3-show") == -1) {
                        x.className += " w3-show";
                    } else { 
                        x.className = x.className.replace(" w3-show", "");
                    }
            }
        </script>
    </header>
<body>
    <?= $this->renderSection('content');?>
</body>
</html>

