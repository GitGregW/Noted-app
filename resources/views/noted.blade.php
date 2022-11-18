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
            *{
                box-sizing: border-box;
            }
        </style>
    </head>
    <body style="margin:0;">
        <div style="height:22em;background: linear-gradient(180deg, #889CAE 10%, rgba(136, 156, 174, 0) 100%), url(/images/dose-media-bU6JyhSI6zo-unsplash.jpg) bottom; background-size: cover">
            <div style="display: flex;justify-content: space-between;padding: 1em 0">
                <span></span>
                <div class="shrink-0 flex items-end" style="border-bottom: 2px #92E5FF solid;min-width: 10em;">
                        <x-application-logo style="color:white;font-size: 1.563rem;text-align: center;margin-bottom: auto;" />
                </div>
                <div style="display: flex;justify-content:space-evenly;margin: 0.5em 1em;text-align: center;gap: 1.5em;">
                    <a href='/login' style="color:white;text-decoration: none;font-weight:bold;margin: auto 0;">Login</a>
                    <button style="background: #FFC700;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-radius: 5px;border:none;">
                        <a href='/register' style="text-decoration: none;font-weight: bold;">Sign Up</a>
                    </button>
                </div>
            </div>
            <p style="color:white;margin: 3em 6em;text-align: justify;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Aliquam eleifend mi in nulla posuere sollicitudin aliquam.
                Risus nullam eget felis eget.
            </p>
        </div>
        
        <div style="width:100%;overflow: auto;background: radial-gradient(124.68% 255.38% at -2.36% 53.51%, rgba(136, 156, 174, 0.52) 0%, #889CAE 73.20%, #FFE073 73.26%) /* warning: gradient uses a rotation that is not supported by CSS and may not behave as expected */;border-top: 4px solid #FFE073;">
            <div style="display: flex;gap: 2.5em;margin: 2em 0;margin-left: 20%;">
                <img style="width:48px; height:48px;" src="/icons/OfficeSVGs/folders-files-and-folders-svgrepo-com.svg" />
                <span style="color: white;margin: auto 0;font-size:1.2rem;">Organised notes</span>
            </div>
            <div style="display: flex;gap: 2.5em;margin: 2em 0;margin-left: 20%;">
                <img style="width:48px; height:48px;" src="/icons/OfficeSVGs/list-svgrepo-com.svg" />
                <span style="color: white;margin: auto 0;font-size:1.2rem;">Note snapshots</span>
            </div>
            <div style="display: flex;gap: 2.5em;margin: 2em 0;margin-left: 20%;">
                <img style="width:48px; height:48px;" src="/icons/OfficeSVGs/document-files-and-folders-svgrepo-com.svg" />
                <span style="color: white;margin: auto 0;font-size:1.2rem;">Note revisions</span>
            </div>
            <div style="display: flex;gap: 2.5em;margin: 2em 0;margin-left: 20%;">
                <img style="width:48px; height:48px;" src="/icons/OfficeSVGs/pen-business-and-finance-svgrepo-com.svg" />
                <span style="color: white;margin: auto 0;font-size:1.2rem;">Write Notes</span>
            </div>
        </div>
        
        <div style="background-color: #FFE073;padding: 3em;display: flex;flex-direction: column;gap: 1em;align-items: center;">
            <div style="margin-left: -1em;margin-right: 2em;max-width: 25em;width:fit-content;padding: 1em;background: #FFFFFF;box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);border-radius: 5px;overflow: auto;">
                <div style="display: inline-block;border-radius:24px;height:48px;width:48px;margin-top: 0.5em;margin-right: 1em;background: url(/images/317727_facebook_social_media_social_icon.png);background-size: cover;background-position: center;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));"></div>
                <div style="position: relative;font-size: 1em;display: inline-block; width: 18em;margin: auto 0;margin-top:0.5rem;vertical-align: top;">
                    Sed do eiusmod tempor incididunt ut labore et dolore magna
                    <span style="position: absolute;bottom: -0.5rem;right: 0;font-size: 0.8em;text-align: end;margin-top: -1rem;margin-bottom: 0;">- Joe Bloggs</span>
                </div>
                
            </div>
            <div style="margin-left: 2em;margin-right: -1em;max-width: 25em;width:fit-content;padding: 1em;background: #FFFFFF;box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);border-radius: 5px;overflow: auto;">
                <div style="position: relative;font-size: 1em;display: inline-block;width: 18em;margin: auto 0;margin-top:0.5rem;vertical-align: top;">
                    Sed do eiusmod tempor incididunt ut labore et dolore magna
                    <span style="position: absolute;bottom: -0.5rem;right: 0;font-size: 0.8em;text-align: end;margin-top: -1rem;margin-bottom: 0;">- Jane Doe</span>
                </div>
                <div style="border-radius:24px;height:48px;width:48px;float: right;margin-top: 0.5em;margin-left: 1em;background: url(/images/3225191_app_instagram_logo_media_popular_icon.png);background-size: cover;background-position: center;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));"></div>
            </div>
        </div>
    </body>
</html>
