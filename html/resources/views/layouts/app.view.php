<?php include COMPONENTS . "/header.view.php"; ?>

    <!-- Основной контент -->
    <main class="container mx-auto px-4 py-8">
        <!-- Главная новость -->
        <section class="mb-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div>
                    <img src="https://picsum.photos/800/500?news=1" alt="Главная новость" class="w-full h-auto rounded-lg shadow-md">
                </div>
                <div class="flex flex-col justify-center">
                    <span class="text-accent font-semibold uppercase text-sm mb-2">Политика</span>
                    <h2 class="text-3xl font-bold mb-4">Встреча мировых лидеров: подписано новое соглашение о сотрудничестве</h2>
                    <p class="text-gray-600 mb-4">Лидеры стран G20 договорились о новых мерах по борьбе с изменением климата и укреплению экономического сотрудничества в условиях глобальных вызовов.</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <span>Иван Петров</span>
                        <span class="mx-2">•</span>
                        <span>2 часа назад</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Сетка новостей -->
        <section class="mb-12">
            <h2 class="text-2xl font-bold mb-6 border-b pb-2">Последние новости</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Новость 1 -->
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <img src="https://picsum.photos/400/250?news=2" alt="Новость" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-accent text-xs font-semibold uppercase">Экономика</span>
                        <h3 class="text-xl font-bold my-2">Центробанк объявил о новых мерах поддержки бизнеса</h3>
                        <p class="text-gray-600 text-sm">Регулятор представил пакет мер, направленных на поддержку малого и среднего бизнеса в условиях текущей экономической ситуации.</p>
                        <div class="flex items-center mt-4 text-xs text-gray-500">
                            <span>15 мая 2023</span>
                            <span class="mx-2">•</span>
                            <span>5 мин чтения</span>
                        </div>
                    </div>
                </article>

                <!-- Новость 2 -->
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <img src="https://picsum.photos/400/250?news=3" alt="Новость" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-accent text-xs font-semibold uppercase">Технологии</span>
                        <h3 class="text-xl font-bold my-2">Новая операционная система выйдет в следующем месяце</h3>
                        <p class="text-gray-600 text-sm">Крупная tech-компания анонсировала выпуск обновленной версии своей флагманской операционной системы с улучшенной безопасностью.</p>
                        <div class="flex items-center mt-4 text-xs text-gray-500">
                            <span>14 мая 2023</span>
                            <span class="mx-2">•</span>
                            <span>4 мин чтения</span>
                        </div>
                    </div>
                </article>

                <!-- Новость 3 -->
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <img src="https://picsum.photos/400/250?news=4" alt="Новость" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-accent text-xs font-semibold uppercase">Общество</span>
                        <h3 class="text-xl font-bold my-2">В городе открылся новый культурный центр</h3>
                        <p class="text-gray-600 text-sm">Многофункциональное пространство для выставок, лекций и творческих мероприятий начало работу в центральном районе города.</p>
                        <div class="flex items-center mt-4 text-xs text-gray-500">
                            <span>13 мая 2023</span>
                            <span class="mx-2">•</span>
                            <span>3 мин чтения</span>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        <!-- Боковая панель и дополнительные новости -->
        <section class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <div class="lg:col-span-3">
                <h2 class="text-2xl font-bold mb-6 border-b pb-2">Популярное</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Популярная новость 1 -->
                    <article class="flex space-x-4">
                        <div class="flex-shrink-0">
                            <img src="https://picsum.photos/120/120?news=5" alt="Новость" class="w-24 h-24 object-cover rounded">
                        </div>
                        <div>
                            <h3 class="font-bold mb-2">Ученые обнаружили новое полезное свойство зеленого чая</h3>
                            <p class="text-gray-600 text-sm">Исследование показало положительное влияние на когнитивные функции.</p>
                            <div class="text-xs text-gray-500 mt-2">12 мая 2023</div>
                        </div>
                    </article>

                    <!-- Популярная новость 2 -->
                    <article class="flex space-x-4">
                        <div class="flex-shrink-0">
                            <img src="https://picsum.photos/120/120?news=6" alt="Новость" class="w-24 h-24 object-cover rounded">
                        </div>
                        <div>
                            <h3 class="font-bold mb-2">Футбол: результаты матчей чемпионата</h3>
                            <p class="text-gray-600 text-sm">Обзор прошедших игр и предварительный прогноз на следующий тур.</p>
                            <div class="text-xs text-gray-500 mt-2">11 мая 2023</div>
                        </div>
                    </article>

                    <!-- Популярная новость 3 -->
                    <article class="flex space-x-4">
                        <div class="flex-shrink-0">
                            <img src="https://picsum.photos/120/120?news=7" alt="Новость" class="w-24 h-24 object-cover rounded">
                        </div>
                        <div>
                            <h3 class="font-bold mb-2">Как изменится рынок недвижимости к концу года</h3>
                            <p class="text-gray-600 text-sm">Эксперты дают прогнозы по ценам на жилье в разных регионах.</p>
                            <div class="text-xs text-gray-500 mt-2">10 мая 2023</div>
                        </div>
                    </article>

                    <!-- Популярная новость 4 -->
                    <article class="flex space-x-4">
                        <div class="flex-shrink-0">
                            <img src="https://picsum.photos/120/120?news=8" alt="Новость" class="w-24 h-24 object-cover rounded">
                        </div>
                        <div>
                            <h3 class="font-bold mb-2">Новые правила налогообложения для самозанятых</h3>
                            <p class="text-gray-600 text-sm">Что изменится с 1 июля для freelancers и малого бизнеса.</p>
                            <div class="text-xs text-gray-500 mt-2">9 мая 2023</div>
                        </div>
                    </article>
                </div>
            </div>

            <!-- Боковая панель -->
            <div class="lg:col-span-1">
                <div class="bg-light p-6 rounded-lg">
                    <h3 class="font-bold text-lg mb-4">Подписка на новости</h3>
                    <p class="text-gray-600 text-sm mb-4">Получайте самые важные новости первыми</p>
                    <form>
                        <input type="email" placeholder="Ваш email" class="w-full px-4 py-2 mb-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
                        <button type="submit" class="w-full bg-primary text-white py-2 rounded hover:bg-blue-800">Подписаться</button>
                    </form>
                </div>

                <div class="mt-8">
                    <h3 class="font-bold text-lg mb-4">Рубрики</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-primary">Политика</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary">Экономика</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary">Общество</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary">Технологии</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary">Культура</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary">Спорт</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary">Наука</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </main>

    <!-- Футер -->
<?php include COMPONENTS . "/footer.view.php"; ?>