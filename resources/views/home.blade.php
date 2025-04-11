@extends('layout')

@section('content')
    <section class="title__section">
        <div class="container">
            <h1>"Самирель" - это новая компания, созданная исключительно для производства продукции халяль. <br>
                
            <p>Гармония в нашей природе начинается с Самирель, она является хранительницей семейных традиций и вековых
                рецептов. Самирель создает продукты из дозволенного сырья и имеет все необходимые сертификаты
                соответствия нормам ислама и наивысшим стандартам качества, ведь только в единении материального и
                духовного можно найти гармонию вкуса и пользу для здоровья наших близких.</p>
        </div>
    </section>
    <section class="news__section">
        <div class="container">
            <div class="news__slider">
                @foreach($news as $new)
                    <div class="news__item">
                        <img src="{{ $new->photo_url }}" alt="Новость">
                        <div class="news__info">
                            <h2>{{ $new->title }}</h2>
                            <p>{{ $new->title_desc }}</p>
                            <a href="{{ route('news.show', $new->id) }}" class="btn-main">Узнать больше</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="about__section">
        <div class="container">
            <div class="about__content">
                <div class="about__info">
                    <h2>ООО "Самирель"</h2>
                    <p>"Самирель" - это новая компания, созданная исключительно для производства продукции халяль.
                        <br><br>
                        Наша продукция изготавливается из экологически чистого и дозволенного сырья.
                        <br><br>
                        Имеет все необходимые сертификаты соответствия нормам ислама и наивысшим стандартам качества,
                        ведь
                        только в единении материального и духовного можно найти гармонию вкуса и пользу для здоровья
                        ваших
                        близких.</p>
                    <a href="{{ route('about') }}" class="btn-main">О компании</a>
                </div>
                <a class="about__video" href="https://www.youtube.com/watch?v=Ie0lay1FMFI" class="about__video"
                   target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('/img/video.png') }}" alt="Видео">
                </a>
            </div>
        </div>
    </section>
    <section class="advantages__section">
        <div class="container">
            <h2>Ключевые преимущества</h2>
            <div class="advantages">
                <div class="advantage">
                    <i class="fa fa-leaf"></i>
                    <h3>Экология</h3>
                    <p>Зеленые поля и луга, свежий воздух и чистые реки. Производство расположилось в экологически
                        чистом уголке Туймазинского района.</p>
                </div>
                <div class="advantage">
                    <i class="fa-solid fa-certificate"></i>
                    <h3>Сертификат "Халяль"</h3>
                    <p>Вся продукция имеет все необходимые сертификаты соответствия нормам ислама.</p>
                </div>
                <div class="advantage">
                    <i class="fa-solid fa-thumbs-up"></i>
                    <h3>Качество</h3>
                    <p>Мы ценим нашего покупателя, производя продукцию только из сырья высшего качества, отвечающего
                        всем самым строгим требованиям.</p>
                </div>
                <div class="advantage">
                    <i class="fa-solid fa-truck-moving"></i>
                    <h3>Логистика</h3>
                    <p>Наличие собственного парка автомобилей позволяет доставлять товары в кратчайшие сроки.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="awards__section">
        <div class="container">
            <div class="awards__content">
                <img src="{{ @asset('/img/quality.png') }}" alt="Фото">
                <div class="awards__info">
                    <h2>Качество подтверждается сертификатами</h2>
                    <p>Для компании "Самирель" качество продукции - это не пустой звук. Мы ценим нашего покупателя,
                        производя продукцию только из сырья высшего качества, отвечающего всем самым строгим
                        требованиям.
                        <br><br>
                        Продукция "Самирель" неизменно завоёвывает высшие награды на выставках.</p>
                    <div class="awards__links">
                        <a href="#" class="btn-main">Наши награды</a>
                        <a href="#" class="btn-main">Сертификаты Халяль</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const items = document.querySelectorAll('.news__item');
        let currentIndex = 0;

        function showItem(index) {
            items.forEach((item, i) => {
                item.classList.toggle('active', i === index);
            });
        }

        function nextItem() {
            currentIndex = (currentIndex + 1) % items.length;
            showItem(currentIndex);
        }

        showItem(currentIndex);

        setInterval(nextItem, 5000);
    });

</script>
