<!DOCTYPE html>
<html lang="pt-br">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
    <link rel="stylesheet" type="text/css" href="../../public/index.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="icon" href="<?= base_url()?>/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url()?>/css/formulario.css">
    <title><?= $this->renderSection('title')?></title>


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

