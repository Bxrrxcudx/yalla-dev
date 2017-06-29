@extends ('layouts.home')

@section ('content')
    <main class="actu-main clearfix">
        <section class="actu">
            <img src="img-layout/actu-bck.png" alt="background image">
            <div class="title">
                <h2>actualités</h2>
            </div>
        </section>
        @foreach ($news as $actu)
        <section class="article article-actu">
            <h3>{{ $actu->title }}</h3>
            <img src="img-layout/img-actu.png" alt="image de l'actualité">
            <p>{{ str_limit($actu->content, $limit = 100, $end = '...') }}</p>
            <div class="detail-article">
            @if($actu->category)
                <div class="folder">
                    <img src="img-layout/folder.svg" alt="classe de l'article">
                    <span>{{ $actu->category->name }}</span>
                </div>
            @endif
                <div class="date">
                    <img src="img-layout/time.svg" alt="date de l'article">
                    <span>{{ $actu->created_at }}</span>
                </div>
            </div>
            <button>Lire l'article</button>
        </section>
        @endforeach
    </main>
@endsection