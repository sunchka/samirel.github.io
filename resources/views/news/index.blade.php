@extends('layout')

@section('content')
    <section class="news__page">
        <div class="container">
            <div class="news__blocks">
                @foreach($news as $new)
                    <div class="news__block">
                        <img src="{{ @asset($new->photo_url) }}" alt="Новость">
                        <div class="news__content">
                            <h5>{{ $new->title }}</h5>
                            <p class="news__content-desc">{{ $new->title_desc }}</p>
                            <p class="news__content-date">{{ $new->formatted_date }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
