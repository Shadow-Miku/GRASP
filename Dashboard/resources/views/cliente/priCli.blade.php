@extends('cliente.plantillaCli')

@section('contenido')



<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
        <h1 align="center"> Bienvenid@ {{ auth()->user()->name }}  </h1> <br>

        <main class="main columns">
            <section class="column main-column">
              <a class="article first-article" href="https://www.unicef.org/es/end-violence/concurso-comics-superheroe-escuela">
                <figure class="article-image is-4by3">
                  <img src="https://www.unicef.org/sites/default/files/styles/hero_desktop/public/HERO%20IMAGE%20COMIC%20BOOK.jpg?itok=nMQDAv9z" alt="">
                </figure>
                <div class="article-body">
                  <h2 class="article-title">
                    Ganador del concurso de comics UNICEF
                  </h2>
                  <p class="article-content">
                  Después de buscar a lo largo y ancho del planeta, hemos elegido a la superheroína que lucha para eliminar la violencia en la escuela: ¡Cipta!
                  Cipta, Rajwa para sus compañeros, es una niña de 15 años que es capaz de convertir sus dibujos en objetos de la vida real y utilizarlos para detener la violencia en las escuelas.
                  En cuanto entra a una escuela en la que abunda el acoso, Rajwa descubre a dos niñas acorralando a otra niña en un salón de clase vacío. Parece que después de haberla humillado durante todo el verano por internet, estas acosadoras están dispuestas a dar un paso más. Sin duda, esta es una tarea para Cipta, pero primero tendrá que enfrentarse a un dragón de tres cabezas, a un ogro y a un monstruo de piedra. ¿Existe algún poder más perverso detrás de todo esto? Cipta, cuyos poderes solo están limitados por su imaginación, debe usar todo su ingenio y empatía para derrotar a la fuerza invisible responsable y restablecer la paz.
                  </p>
                  <footer class="article-info">
                    <span>Por John Blaskowithz</span>
                    <span>1814 comments</span>
                  </footer>
                </div>
              </a>

              <div class="columns">
                <div class="column nested-column">
                  <a class="article" href="https://aweita.larepublica.pe/anime-manga-y-comics/2021/08/24/kaijuu-no8-oshi-ko-se-consagran-como-ganadores-next-manga-awards-2021-7052">
                    <figure class="article-image is-16by9">
                      <img src="https://imgmedia.aweita.pe/640x345/aweita/original/2021/08/24/61250d01fa3072673851a06d.webp" alt="">
                    </figure>
                    <div class="article-body">
                      <h2 class="article-title">
                        Especiales del mundo de anime
                      </h2>
                      <p class="article-content">
                      El día de hoy se dieron a conocer los ganadores del gran premio ‘Next Manga Awards 2021’,
                      entregado por Da Vinci y el conocido portal Nico Nico. Este año la lista de nominados contaba con varios
                      nombres de mangas importantes tanto en la categoría web como en la impresa,
                      siendo el mas destacados el reciente éxito de la editorial Shueisha, Kaijuu No. 8.
                      </p>
                      <footer class="article-info">
                        <span>By Aldo Rojas</span>
                        <span>785 comments</span>
                      </footer>
                    </div>
                  </a>
                </div>

                <div class="column">
                  <a class="article" href="https://www.emaze.com/@ACQITRIZ">
                    <figure class="article-image is-16by9">
                      <img src="https://userscontent2.emaze.com/images/34c08dde-cf17-4cf9-a162-b52cd99fee68/b7184a88c93e1bf2aeddfe37ca91ecf3.jpg" alt="">
                    </figure>
                    <div class="article-body">
                      <h2 class="article-title">
                        Como los libros han ayudado a la libertad de expresión
                      </h2>
                      <p class="article-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      </p>
                      <footer class="article-info">
                        <span>By Alejandro Vargas</span>
                        <span>379 comments</span>
                      </footer>
                    </div>
                  </a>
                  <a class="article" href="#">
                    <div class="article-body">
                      <h2 class="article-title">
                        Hello World
                      </h2>
                      <p class="article-content">
                        Lorem ipsum dolor sit amet.
                      </p>
                      <footer class="article-info">
                        <span>By Joe Smith</span>
                        <span>42 comments</span>
                      </footer>
                    </div>
                  </a>
                  <a class="article" href="#">
                    <div class="article-body">
                      <h2 class="article-title">
                        Hello World
                      </h2>
                      <p class="article-content">
                        Lorem ipsum dolor sit amet feugiat facilisis.
                      </p>
                      <footer class="article-info">
                        <span>By Joe Smith</span>
                        <span>42 comments</span>
                      </footer>
                    </div>
                  </a>
                </div>
              </div>
            </section>

            <section class="column">
              <a class="article" href="https://es.resonancescience.org/blog/masa-negativa-creada-en-la-universidad-estatal-de-washington">
                <figure class="article-image is-3by2">
                  <img src="https://kajabi-storefronts-production.kajabi-cdn.com/kajabi-storefronts-production/blogs/26406/images/Kluk7dBzQ1eMtXl5QvK2_9.jpeg" alt="">
                </figure>
                <div class="article-body">
                  <h2 class="article-title">
                    La masa negativa
                  </h2>
                  <p class="article-content">
                  Físicos de la Universidad Estatal de Washington han creado un fluido con masa negativa,
                  que es exactamente lo que su naturaleza indica: si lo empujas,
                  no se acelera en la dirección en la que fue empujado,
                  se acelera hacia atrás, a diferencia de todos los objetos físicos del mundo que conocemos.
                  </p>

                  <footer class="article-info">
                    <span>By Unko Nami</span>
                    <span>42 comments</span>
                  </footer>
                </div>
              </a>

              <a class="article" href="#">
                <div class="article-body">
                  <h2 class="article-title">
                    Hello World
                  </h2>
                  <p class="article-content">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  </p>
                  <footer class="article-info">
                    <span>By Joe Smith</span>
                    <span>42 comments</span>
                  </footer>
                </div>
              </a>

              <a class="article" href="#">
                <div class="article-body">
                  <h2 class="article-title">
                    Hello World
                  </h2>
                  <p class="article-content">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  </p>
                  <footer class="article-info">
                    <span>By Joe Smith</span>
                    <span>42 comments</span>
                  </footer>
                </div>
              </a>

              <a class="article" href="#">
                <div class="article-body">
                  <h2 class="article-title">
                    Hello World
                  </h2>
                  <p class="article-content">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  </p>
                  <footer class="article-info">
                    <span>By Joe Smith</span>
                    <span>42 comments</span>
                  </footer>
                </div>
              </a>
            </section>
          </main>
    </body>

</html>

@stop
