<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ @asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ @asset('/fontawesome/css/all.min.css') }}">
</head>
<body>
<div id="site">
    <header class="header">
        <div class="container header__container">
            <nav class="header__nav">
                <div class="header__title">
                    <a href="{{ route('home') }}" class="link-nav">
                        <img src="{{ @asset('/img/logo.svg') }}" alt="logo">
                    </a>
                </div>
                <ul class="header__ul">
                    <li><a href="{{ route('home') }}" class="link-nav {{ request()->routeIs('home') ? 'active' : '' }}">Главная</a>
                    </li>
                    <li><a href="{{ route('about') }}"
                           class="link-nav {{ request()->routeIs('about') ? 'active' : '' }}">О Самирель</a></li>
                    <li><a href="{{ route('products') }}"
                           class="link-nav {{ request()->routeIs('products') ? 'active' : '' }}">Каталог</a></li>
                    <li><a href="{{ route('partners') }}"
                           class="link-nav {{ request()->routeIs('partners') ? 'active' : '' }}">Партнерам</a></li>
                    <li><a href="{{ route('news') }}" class="link-nav {{ request()->routeIs('news') ? 'active' : '' }}">Новости</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer class="footer">
        <section class="footer__section">
            <div class="container footer__container">
                <div class="footer__blocks">
                    <div class="footer__block">
                        <h4>ООО "Самирель"</h4>
                        <div class="footer__content footer__contacts">
                            <div class="footer__address">
                                <p>452750 Республика Башкортостан</p>
                                <p>Туймазинский р-н</p>
                                <p>с. Зигитяк</p>
                                <p>ул. Набережная, 69</p>
                            </div>
                            <div class="footer__contacts-links">
                                <div class="footer__contact">
                                    <i class="fa-solid fa-phone"></i>
                                    <a href="tel:+73478235206" class="link-nav">+7 (34782) 3 52 06</a>
                                </div>
                                <div class="footer__contact">
                                    <i class="fa-solid fa-mobile"></i>
                                    <a href="tel:+79177951858" class="link-nav">+7 (917) 795 18 58</a>
                                </div>
                                <div class="footer__contact">
                                    <i class="fa-solid fa-envelope"></i>
                                    <a href="mailto:info@samirel.ru" class="link-nav">info@samirel.ru</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer__block footer__block__news">
                        <h4>Новости</h4>
                        <div class="footer__news">
                            @foreach($last_news as $news)
                                <a href="{{ route('news.show', $news->id) }}" class="link-nav">
                                    {{ $news->title }}
                                    <span class="news-date">{{ $news->formatted_date }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="footer__block footer__block__nav">
                        <h4>Компания</h4>
                        <nav class="footer__nav">
                            <ul>
                                <li>
                                    <a href="{{ route('about') }}" class="link-nav">О компании</a>
                                </li>
                                <li>
                                    <a href="{{ route('products') }}" class="link-nav">Каталог</a>
                                </li>
                                <li>
                                    <a href="#" class="link-nav">Сертификаты Халяль</a>
                                </li>
                                <li>
                                    <a href="#" class="link-nav">Награды</a>
                                </li>
                                <li>
                                    <a href="#" class="link-nav">Галерея</a>
                                </li>
                                <li>
                                    <a href="#" class="link-nav">Документы</a>
                                </li>
                                <li>
                                    <a href="{{ route('reviews') }}" class="link-nav">Обратная связь</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <p class="footer__madeby">© 2025 ООО Самирель</p>
            </div>
        </section>
    </footer>
</div>
</body>
</html>
