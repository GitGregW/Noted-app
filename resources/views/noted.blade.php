<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Noted</title>

        <style>
            @media only screen and (min-width: 850px) {
                div.background{
                    height: 45rem;
                }
            }
            body {
                font-family: 'Nunito', sans-serif;
            }
            .background{
                width: 100%;
                height: 30rem;
                overflow: hidden;
            }
            .background--image{
                object-position: 100% 65%;
                object-fit: cover;
                height: inherit;
                width: 100%;
            }
            .welcome{
                position: absolute;
                float: right;
                width: 50%;
            }
            .welcome-text{
                color: white;
            }
        </style>
    </head>
    <body>
        <div class="background">
            <div class="welcome">
                <a href='/login'>Login</a>
                <h3 class="welcome-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Aliquam eleifend mi in nulla posuere sollicitudin aliquam.
                    Risus nullam eget felis eget.
                </h3>
            </div>
            <img class="background--image" src="/images/dose-media-bU6JyhSI6zo-unsplash.jpg" alt="">
        </div>
    </body>
</html>
