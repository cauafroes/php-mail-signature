# php-cdf-img-gen

Small PHP tool that i wrote as a personal project to help co-workers automatically generate an e-mail signature, without having to wait several days for one to be ready.

I would put an url to a live environment running this application here as a demo, but, is the same my coworkers use, and for their security i will not be doing that (i'm not a fan of exposing my servers urls on github).

If you want to run it, just clone the project, then:

create a .env (app will throw an error if there isn't one)

`mv .env.example .env`

then, to serve it, run this on the app root:

`php -S 0.0.0.0:3000`

The password is inside the .env file
