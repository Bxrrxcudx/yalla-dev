@extends('layouts.home')

@section('content')
    <main>
        <section class="presentation">
            <h2>Faites l'école pas la guerre</h2>
            <img src="img-layout/background-home.png" alt="">
            <a href="{{ url('donations') }}">Nous soutenir</a>
        </section>
        <section class="who">
            <div>
                <h2>Yalla!</h2>
                <img src="img-layout/diplome.png" alt="">
            </div>
            <span>Qui sommes-nous ?</span>
            <p>Yalla! Pour les enfants est une association de droit français indépendante, apolitique, non-confessionnelle et impartiale, créée en juillet 2013.</p>
            <p>Basée au Liban, Yalla! se donne pour mission première de remettre les enfants déscolarisés à la suite d’un conflit sur le chemin de l’école.  </p>

            <a href="{{ url('presentation') }}">Nous découvrir</a>
        </section>
        <div class="separation"></div>
        <section class="conflit">
            <div>
                <h2>Le conflit syrien</h2>
                <img src="img-layout/loupe.png" class="picto" alt="">
            </div>
            <span>130 000 morts<br>4 millions de réfugiés<br>plus six millions de déplacés internes.</span>
            <p>Déscolarisés depuis des mois, voire des années, ces enfants se voient refuser leur droit fondamental à l’éducation, garanti par la Convention relative aux droits de l’enfant de 1989.<p>
            <p>Au 1er janvier 2015, le Haut commissariat aux réfugiés des Nations Unies comptait 400 000 enfants syriens enregistrés au Liban. Parmi eux, un peu plus de 100 000 bénéficient d’une éducation formelle ou informelle.</p>
        </section>
        <section class="action">
            <div class="action-desc">
                <h2>Comment agir ?</h2>
                <img src="img-layout/action.png" class="picto" alt="">
            </div>
            <span>En donnant 15 euros par mois, vous couvrez les frais de scolarisation d’un enfant syrien pendant une semaine.</span>
            <div class="action-call">
                <img src="img-layout/img-agir.png" alt="">
                <div>
                    <h3>L’ECOLE YALLA !</h3>
                    <p>120 enfants réfugiés syriens<br>Entre 6 et 13 ans</p>
                    <a href="{{ url('donations') }}">Nous soutenir</a>
                </div>
            </div>
        </section>
        <section class="valeurs">
            <div class="proximite">
                <span>Aide de proximité</span>
                <p>Votre don sert directement à la mise en œuvre des projets de Yalla! sur le terrain et notamment au paiement des indemnités des professeurs et animateurs, du loyer des locaux de l’école, des fournitures scolaires et celles destinées aux activités socio-éducatives.</p>
            </div>
            <div class="transparence">
                <span>Transparence</span>
                <p>Les frais administratifs de Yalla ! sont réduits au minimum afin que l’ensemble des dons bénéficient aux enfants et aux bénévoles locaux. 98% des fonds sont dédiés à la mise en oeuvre des projets sur le terrain et 2% pour les dépenses administrative.</p>
            </div>
            <a href="{{ url('mission') }}">En savoir +</a>
        </section>
        <section class="actus">
            <div>
                <h2>Actualités</h2>
                <img src="img-layout/img-actu.png" alt="">
            </div>
            <article>
                <h3>Fest-noz solidaire<br>29 octobre à Poullaouen</h3>
                <p>Yalla! Pour les Enfants vous convie le samedi 29 octobre à un fest-noz de levée de fonds dont les entiers bénéfices reviendront à son école d’Aley, située au Liban, à quelques kilomètres.</p>
            </article>
            <a href="{{ url('actualites') }}">Toutes les actus</a>
        </section>
        <section class="partenaires clearfix">
            <h2>Nos partenaires</h2>
            <div class="partners">
                <div>
                    <div class="clearfix">
                        <a href="http://www.institutfrancais-liban.com/"><img src="img-content/institut-français.png" alt="Institut français"></a>
                    </div>
                    <div class="clearfix">
                        <a href="http://codssy.org/"><img src="img-content/codssy.png" alt=""></a>
                    </div>
                    <div class="clearfix">
                        <a href="https://www.w4.org/fr/project/education-enfants-refugies-syrie/"><img src="img-content/wwww.png" alt=""></a>
                    </div>
                </div>
                <div>
                    <div class="clearfix">
                        <a href="http://www.kitabna.org/"><img src="img-content/kitabna.png" alt=""></a>
                    </div>
                    <div class="clearfix">
                        <a href=""><img src="img-content/bistro-syrien.png" alt=""></a>
                    </div>
                    <div class="clearfix">
                        <a href="http://www.institutcalam.fr/"><img src="img-content/calam.png" alt=""></a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
