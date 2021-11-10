<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

    body{
        color:#525d6a;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size:16px;
        background-color:#cccaca;
    }

    .container{
        background-color:#fff;
        width:50%;
        margin:auto;
        position:relative;
    }
    
    .text-success {
    color: #198754!important;
    }
    .text-warning {
    color: #ffc107!important;
    }
    .text-danger {
    color: #dc3545!important;
    }

    .img-app{
    height: auto;
    width: 100px;
    margin-left:-1rem;
        
    }

    .mt-2{
        margin-top:2rem;
    }

    .footer{
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        padding: 50px 50px ;
        margin-top:5rem;
        text-align:center;
    


    }

    .copy{
        display: flex;
        justify-content: center;
        padding:10px;
        font-size:12px;
    }

    .header{
        
    }

    .content{
        padding:50px 30px;
        padding-bottom:0px;
        position:relative;
    }

    .text-xs{
        font-size:14px;
    }

    .link{
        padding:0px 15px;
    }

    </style>
</head>
<body>
<div class="container">
<div class="header" style="background-color:#198754!important;
        color:#fff;
        font-size:1rem;
        padding:20px;
        display:flex;
        align-items:center;
        justify-content:center;
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
       font-weight: 700;">
    LIEN D'INVITATION A LA REUNION D'OUVERTURE 
</div>

<div class="content">
    <div>
        Nous vous prions de trouver çi-joint le lien d'invitation pour la réunion d'ouverture des offres du marché : <br> <br>
        <strong>{{ $data->marche()->first()->intitule}}</strong> <br><br>
         prévu pour le <strong class="text-danger">{{ $data->date_ouverture}}</strong> précises. <br><br>
        Cordialement.
    </div>

    <div class="mt-2">
    <div class="text-danger">Lien</div>
    </div class="link">
    {!! $data->meet_link !!}
    </div>

    <div class="mt-2 d-flex flex-column footer" style="display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        padding: 50px 50px ;
        margin-top:5rem;
        text-align:center;">
    <img src="https://i.goopics.net/37byla.png" alt="logo de la plateforme" class="img-app"></a>k
    <small class="fw-bold">e<span class="text-success">MARCHES</span><span class="text-warning">PUBLICS&</span><span class="text-danger">PRIVES</span></small>
    <div class="text-xs">Plateforme de dématérialisation du processus d'attribution des marchés publics </div>
    <div class="copy">&copy; <span id="year"></span> eMarchesPublics&Privés | Tous droits réservés.  </div>
    
    </div>
</div>


    
    <script>
    document.getElementById("year").innerHTML= new Date().getFullYear();
    </script>
</body>
</html>