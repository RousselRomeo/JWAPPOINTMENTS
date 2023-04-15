<!doctype html>
<html lang="en">

<head>

    Hello automatisch
    <!-- Requi meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700');




        ::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #BCBBBB !important;
            opacity: 1;
            /* Firefox */
        }

        :-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: #BCBBBB !important;
        }

        ::-ms-input-placeholder {
            /* Microsoft Edge */
            color: #BCBBBB !important;
        }

        body {
            font-family: 'Roboto' !important;
        }

        .shadow-md {
            box-shadow: 0 0 3px rgba(1, 1, 1, 0.2);
        }


        ._br {
            border-radius: 4px !important;
        }

        ._no-br-bottom {
            border-bottom-left-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
        }


        .institutionsearchheader {
            text-align: center;
            font-weight: bold;
            font-size: 18px;
        }

        .institutionsearchheader2 {
            font-weight: bold;
            font-size: 17px;
        }

        .ProfileVerfügbarfont {
            font-style: italic;
            font-size: 14px;
        }

        .ProfileSkillsFont {
            font-size: 14px;
            font-weight: 400;
        }

        .ProfileNames {
            font-weight: 600;
            font-size: 22px;

        }

        @media(max-width:766px) and (min-width: 576px) {
            .ProfileNames {
                font-size: 25px;
            }

            .ProfileCity {
                font-size: 18px !important;
            }
        }

        .ProfileCity {
            font-size: 14px;
            font-weight: 500;
        }

        .Top3Talents {
            font-size: 16px;
            font-weight: 500;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .container {
            max-width: 1128px;
        }

        .input-group {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            width: 100%;

        }

        .erweitertesuche {
            font-size: 15px;
            font-weight: bold;
            color: #3685D6;
        }

        .thinbottomline {
            height: 0.5px;
            background-color: #BCBBBB;
            width: 103.3%;
            left: 50%;
            top: 120%;
            position: absolute;
            transform: translate(-50%, -50%);
        }

        .thinbottomline2 {
            height: 0.5px;
            background-color: #BCBBBB;
            width: 107.3%;
            left: 50%;
            top: 150%;
            position: relative;
            transform: translate(-50%, -50%);
        }

        .img-pos {
            position: absolute;
            top: 0px;
            left: 0px;
        }

        .MatchPercentage {
            color: #3685D6;
            font-size: 16px;
            font-weight: 600;
        }

        .MatchPercentage2 {
            color: #3685D6;
            font-size: 20px;
            font-weight: 600;
        }

        .text-primary {
            color: #3685D6 !important;
        }

        .btn-primary {
            background-color: #3685D6 !important;
        }

        .btn-outline-primary {
            border-color: #3685D6 !important;
            color: #3685D6 !important;
        }

        hr {
            margin: 1rem 1;
            color: #BCBBBB;
            border: 0;
            opacity: 0.25;
        }

        .row {
            --bs-gutter-x: 0 !important;
            --bs-gutter-y: 0 !important;
            margin: auto !important;
            max-width: 1128px;
        }


        .btn_start {
            background-color: #3785d5;
            border: #3785d5 5px solid;
            color: white;
            font-size: 13px;
        }


        .MyTemplateTitle3 {

            font-size: 15px;
            line-height: 20px;
            color: black;
            font-weight: 500;
        }

        .ClearFilters {

            font-size: 13px;
            color: #3685D6;
            font-weight: 600;
        }


        .form-control {
            font-size: 15px !important;
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #636466 !important;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #BCBBBB;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;

        }


        .InviteDropdownBtn {
            color: #BCBBBB;
            background: #FFFFFF;
            font-size: 15px;
            border: 1px solid #BCBBBB;
            box-sizing: border-box;
            border-radius: 6px;
            height: 35px;
            width: 180px;

        }
    </style>


</head>

<body style="background-color: #f6f6f6">




    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white">
        <div class="container ">
            <a class="navbar-brand" href="#">
                <img src="cw.png" alt="" width="" height="34">
            </a>
            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item me-4">
                        <a class="nav-link" aria-current="page" href="insti.php">Suche Talente</a>
                    </li>
                    <li class="nav-item  me-4">
                        <a class="nav-link" href="interviews.php">Interviews</a>
                    </li>
                    <li class="nav-item  me-4">
                        <a class="nav-link" href="#">In Kontakt </a>
                    </li>
                    <li class="nav-item me-4 ">
                        <a class="nav-link" href="#">Inbox</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle me-5" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Johanneswerk
                        </a>
                        <ul class="dropdown-menu" style="font-size: 13px;" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="test9.php">Meine Vorlagen</a></li>
                            <li><a class="dropdown-item" href="test10.php">Company Profil</a></li>
                            <li><a class="dropdown-item" href="settingsInsti.php">Profil Einstellungen</a></li>
                            <li><a class="dropdown-item" href="#">Ausloggen</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    

    <div class="" style="margin-top: 80px; ">
        <div class="row my-3 mx-xl-3 mx-0  m-md-2 m-0">


            <div class="col-12 mb-2">
                <div class="px-4 py-2 shadow-md _br m-md-2 m-0" style="background-color: white;">
                    <div class="d-inline"><img src="lupe.svg" style="width:20px"></div>
                    <input type="text" style="border:none;width:90%" placeholder="Suche nach Fähigkeiten, Schlüsselwörtern oder Positionen">
                </div>
            </div>
            <div class="col-lg-3">

                <div class="_br m-md-2 m-0" style="background-color: white;">
                    <div class="d-lg-block text-start d-sm-none mb-2 institutionsearchheader">
                        <div class="row px-3 pt-3">
                            <div class="col-7 institutionsearchheader2">Such-Kriterien</div>
                            <div class="col-5 ClearFilters text-end mt-1">Filter löschen</div>
                        </div>
                        <hr>
                    </div>
                    <div class="px-4 px-lg-3 pb-2">
                        <div class="row">
                <div class=" text-light">
   
         @foreach($savesearchhistory as $value) 
        <h6 style="color:blue;">History_location: {{$value-> location}} </h6>
        <h6 style="color:blue;">History_Arbeitstelle: {{$value-> jobTitle}} </h6>
        <h6 style="color:blue;">History_Arbeitserfahrung: {{$value-> workExperience}} </h6>
        <button onclick="searchTalent(this)" type="submit" data-startdate="{{$value->location}}" class="btn btn-outline-primary " >Search Talent</button>
        @endforeach
 
                    </div>

                        </div>
                    </div>
                </div>
            </div>


            <div id="listsTown" class="col-lg-9 mt-lg-2">
     

        </div>
    </div>
    </div>

    </div>









    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Datepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>

    
 function searchTalent(value){
 var query=value.getAttribute("data-startdate")
    console.log(query)

            $.ajax({
                type:'POST',
                url:'search',
                data:{'search':query ,  "_token": "{{ csrf_token() }}"},
                dataType:'json',
                success:function(res){

                    
                     console.log(res)
                    var employees = '';
                    $('#listsTown').html('')
                    $.each(res,function(index,value){

                      var dateToBeReversed= value.startContract.replaceAll('-','.')
                      var reversedDate= dateToBeReversed.split('.').reverse().join('.')
                     


                        employees =  
                        `<div class="mt-3 mt-sm-1 mt-md-3 mt-lg-0 px-4 py-3 shadow-md _br mx-0 mx-md-2 mb-lg-3" style="background-color: white;">
                    <div style="width: 100%; height: 40px; font-size: 20px; border-bottom: 0.5px solid #BCBBBB" class="d-md-none d-block text-primary text-center fw-bold mb-3"> 95% Match</div>

                    <div class="row position-relative m-md-2 m-0">
                        <div class="col-4 col-sm-3 img-pos">
                            <div class="d-none d-md-block d-lg-none" style="width: 25vw; max-width: 155px;">
                                <img src="assets/img/Profilbild.png" alt="" style="width: 25vw; max-width: 155px;">

                                <div class="text-center d-none d-md-block mt-1 MatchPercentage">95% Match</div>
                            </div>

                            <div class="d-lg-block d-none" style="width: 25vw; max-width: 135px;">
                                <img src="assets/img/Profilbild.png" alt="" style="width: 25vw; max-width: 135px;">

                                <div class="text-center d-none d-md-block mt-1 MatchPercentage">95% Match</div>
                            </div>

                            <div class="d-sm-block d-md-none" style="width: 25vw; max-width: 145px;">
                                <img src="assets/img/Profilbild.png" alt="" style="width: 25vw; max-width: 145px;">
                                <div class="d-none d-sm-block d-md-none text-center col-12 align-text-middle ProfileVerfügbarfont">Verfügbar ab: ${reversedDate}</div>
                                <div class="text-center d-none d-md-block mt-1 MatchPercentage">95% Match</div>
                            </div>
                        </div>

                        <div class="offset-md-3 offset-4 col-md-9 col-8">
                            <div class="row mb-lg-3 mb-0">
                                <div class="col-12 d-flex justify-content-between px-lg-0">
                                    <div class="div ProfileNames mt-3 mt-md-2">
                                        <div>${value.fName} <span class="invisible">..</span> <span class="ProfileCity d-lg-inline-block d-sm-inline-block d-md-none d-none">aus ${value.location}</span></div>
                                    </div>
                                    <div style="margin-top: 15px" class="div d-md-block d-none ProfileVerfügbarfont me-lg-3 me-2">Verfügbar ab: ${reversedDate }</div>
                                </div>
                                <div class="col-12 d-block d-sm-none d-md-block d-lg-none ProfileCity mb-3">aus ${value.location}</div>
                            </div>
                        </div>
                        <div class="d-block d-sm-none" style="height: 12vw"></div>

                        <div class="col-12 col-sm-8 col-lg-5 offset-0 offset-sm-4 offset-md-3 px-lg-0">
                            <div class="mt-0 mt-sm-3 mt-md-2 mt-lg-4 ProfileSkillsFont">${value.jobTitle}</div>
                            <div class="mt-3 ProfileSkillsFont">${value.workExperience} Jahre Berufserfahrung</div>
                            <div class="mt-3 mb-sm-3 mb-md-1 ProfileSkillsFont">Sucht nach: ${value.contractType}stelle</div>
                            <div class="mt-5 d-sm-none d-block ProfileVerfügbarfont">Verfügbar ab: sofort</div>
                        </div>



                        <div class="col-12 col-md-9 col-lg-4 offset-0 offset-md-3 offset-lg-0 mt-lg-2">
                            <div class="row">
                              
                                <div class="mt-3 col-md-6 col-lg-11 ms-lg-3 pe-md-2 pe-lg-0">
                                <form action="http://localhost:8000/api/saveProfile"  method="POST">

                                <input type="hidden"  name="talent_id" value="${value.id}">
                                <input type="hidden"  name="company_id" value="1">
                                  
                                <button  type="submit"  class="btn btn-outline-primary w-100" >Profil speichern</button>
                                </form>
                             
                                </div>
                                
                                <div class="mt-3 col-md-6 col-lg-11 ps-md-2 ps-lg-0">
                                  <a href="http://localhost:8000/employees/${value.id}"><button id="empCompleteProfile" type="button"  class="btn btn-primary w-100 ms-lg-3">Profil ansehen</button></a>  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ">

                        </div>
                    </div>
                </div>`
                
        

                $('#listsTown').append(employees);
                })
                }
            })
              



                $(".datepicker").datepicker( 
                    {
                        dateFormat:"dd.mm.yy",
                        monthNames: ['Januar','Februar','März','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember'],
                        dayNames: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag','Samstag'],
                        dayNamesMin: ['So', 'Mo', 'Die', 'Mi', 'Do', 'Fre', 'Sa']
                    }
                 );
              
                }
           
    </script>

    

</body>

</html>