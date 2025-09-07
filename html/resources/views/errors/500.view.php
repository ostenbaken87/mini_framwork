<?php include COMPONENTS . "/header.view.php"; ?>

<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 text-center error-container">
        <div>
            <h1 class="error-code text-9xl font-bold text-accent">500</h1>
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Внутренняя ошибка сервера</h2>
            <p class="mt-4 text-lg text-gray-600">На сервере произошла непредвиденная ошибка. Пожалуйста, попробуйте позже.</p>
        </div>
        <div class="mt-8 space-y-4">
            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-md text-left">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-400"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700">Мы уже работаем над устранением проблемы. Приносим извинения за временные неудобства.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8 flex justify-center space-x-4">
            <button onclick="location.reload()" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-primary hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                <i class="fas fa-redo mr-2"></i> Попробовать снова
            </button>
            <a href="/" class="inline-flex items-center px-4 py-2 border border-gray-300 text-base font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                <i class="fas fa-home mr-2"></i> На главную
            </a>
        </div>
        <div class="mt-12 pt-8 border-t border-gray-200">
            <p class="text-gray-500">Если проблема persists, пожалуйста, свяжитесь с нашей службой поддержки.</p>
            <a href="#" class="mt-2 inline-block text-primary hover:text-blue-800">support@newsportal.ru</a>
        </div>
    </div>
</div>

<?php include COMPONENTS . "/footer.view.php"; ?>