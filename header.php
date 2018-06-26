<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notepad online</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <style type="text/css">

        html {
            background: url(diary.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        #homePageContainer{

            margin-top:52px;

        }

        .container{

            text-align:center;
            width:400px;

        }

        body{
            background:none;
            color: #ffffff;
            font-family: sans-serif;
        }


        input[type="email"], input[type="password"]
        {
            width: 100%;
            margin: 0;
            padding: 5px 10px;
            background: 0;
            border: 0;
            border-bottom: 1px solid #FFFFFF;
            border-top: 0;
            font-style: italic;
            font-size: 12px;
            font-weight: 400;
            letter-spacing: 1px;
            margin-bottom: 5px;
            color: #FFFFFF;
            outline: 0;
            border-top-left-radius: 0;
            border-top-right-radius: 0;

        }

        input[type="email"]:active,
        input[type="email"]:hover,
        input[type="email"]:focus,
        input[type="password"]:active,
        input[type="password"]:hover,
        input[type="password"]:focus{
            background-color:transparent;
            -webkit-box-shadow: none;
            transition: background-color 5000s ease-in-out 0s;
            -webkit-text-fill-color: #fff !important;
            border-bottom: 1px solid lightgreen;
        }

        #signUpForm{
            display:none;
        }

        a{
            color:#fff;
        }

        a:hover{
            color:green;
            text-decoration:none;
        }

        .stayLoggedIn{
            width:16px;
            float:left;
        }

        label{
            font-size:70%;
            float:left;
            -webkit-touch-callout: none; /* iOS Safari */
            -webkit-user-select: none; /* Safari */
            -moz-user-select: none; /* Firefox */
            -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome and Opera */
        }

        #error{
            background-color: rgba(0, 0, 0, 0.43);
            font-size:100%;
            font-weight: bold;
            color:lightcoral;
            z-index:999;
            text-align:center;
            margin: 0 auto;
            width:100%;
        }

        #diary{
            width:100%;
            height:100%;
            /*background-color:rgba(255,255,255,0.25);*/
            /*color:black;*/
            background-color: rgba(0,0,0,0.52);
            color:white;
            font-family:sans-serif;
            font-style: italic;
            outline:none;
            resize: none;
        }

        #diary:focus,
        #diary:active,
        #diary:hover,
        #diary:after
        {
            outline-color: transparent;
            outline-style: none;
            outline:0 !important;
            -webkit-appearance: none;
            -webkit-tap-highlight-color: rgba(0,0,0,0);
            -webkit-box-shadow: 0 0 3px 1px black;
            -moz-box-shadow: 0 0 3px 1px black;
            box-shadow: 0 0 3px 1px black;
        }

        /*.p{*/
            /*font-style: italic;*/
            /*font-size: 52%*/
            /*color: lightgreen; !important*/
        /*}*/

        #loggedInText{
            color:black;
        }

    </style>
</head>
<body>