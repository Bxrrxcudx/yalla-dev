@extends ('layouts.home')

@section ('content')
    <main class="member-main clearfix">
        <section class="member">
            <img src="img-layout/membre-bck.png" alt="background image">
            <div class="title">
                <h2>je deviens adhérent</h2>
            </div>
        </section>
        <section class="membre-section qui-member">
            <img src="img-layout/member.svg" alt="nos membres qui sont-ils ?">
            <h3>nos adhérents</h3>
            <p>Les adhérents de Yalla! sont des personnes de tous horizons qui partagent les valeurs de l’association, sa vision et sa objectif.</p>
            <h3>qui peut adhérer ?</h3>
            <p>Tout individu majeur à jour de sa cotisation peut être adhérent de Yalla !</p>
        </section>
        <section class="membre-section new-member">
            <img src="img-layout/volunteer.svg" alt="Comment adhérer ?">
            <p>Pour devenir adhérent, vous pouvez compléter le formulaire téléchargeable ci-dessous accompagné d’un chèque ou virement bancaire, d’adhésion annuelle de 20 euros et le renvoyer par la poste à l’adresse suivante :</p>
            <address>Yalla ! / Adhésion</br>13, rue René Villermé</br> 75011 Paris</address>
            <p>Vous pouvez également renvoyer le formulaire par email à :</p>
            <p class="email">yalla.enfants@gmail.com</p>
            <button><a href="">virement bancaire</a></button>
        </section>
        <section class="membre-section download">
            <h3>Téléchargez :</h3>
            <a href="">Le bulletin d’adhésion Yalla ! Pour les enfants (pdf)</a>
        </section>

    </main>
@endsection