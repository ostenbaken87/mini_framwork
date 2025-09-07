<?php include COMPONENTS . "/header.view.php"; ?>

<!-- Контент по умолчанию (404) -->
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 text-center error-container">
        <div>
            <h1 class="error-code text-9xl font-bold text-primary">404</h1>
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Страница не найдена</h2>
            <p class="mt-4 text-lg text-gray-600">К сожалению, запрашиваемая страница не существует или была перемещена.</p>
        </div>
        <div class="mt-8 space-y-4">
            <p class="text-gray-500">Возможно, вы искали одну из этих страниц:</p>
            <div class="grid grid-cols-2 gap-4 mt-4">
                <a href="#" class="px-4 py-2 bg-light text-gray-700 rounded-md hover:bg-gray-200 transition">Главная</a>
                <a href="#" class="px-4 py-2 bg-light text-gray-700 rounded-md hover:bg-gray-200 transition">Новости</a>
                <a href="#" class="px-4 py-2 bg-light text-gray-700 rounded-md hover:bg-gray-200 transition">Политика</a>
                <a href="#" class="px-4 py-2 bg-light text-gray-700 rounded-md hover:bg-gray-200 transition">Контакты</a>
            </div>
        </div>
        <div class="mt-8">
            <a href="/" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-primary hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                <i class="fas fa-home mr-2"></i> Вернуться на главную
            </a>
        </div>
        <div class="mt-12 pt-8 border-t border-gray-200">
            <p class="text-gray-500">Если вы считаете, что это ошибка, пожалуйста, свяжитесь с нами.</p>
            <a href="#" class="mt-2 inline-block text-primary hover:text-blue-800">support@newsportal.ru</a>
        </div>
    </div>
</div>

<?php include COMPONENTS . "/footer.view.php"; ?>