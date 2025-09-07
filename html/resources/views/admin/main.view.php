<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора - Новостной портал</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e40af',
                        secondary: '#374151',
                        accent: '#dc2626',
                        light: '#f3f4f6',
                        dark: '#1f2937'
                    }
                }
            }
        }
    </script>
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 50;
                height: 100vh;
            }
            .sidebar.open {
                transform: translateX(0);
            }
        }
        .content-area {
            transition: all 0.3s ease;
        }
        .table-row:hover {
            background-color: #f9fafb;
        }
        .modal {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .modal.hidden {
            opacity: 0;
            transform: scale(0.9);
            pointer-events: none;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans text-gray-800 flex flex-col md:flex-row min-h-screen">
    <!-- Мобильное меню -->
    <div class="md:hidden fixed top-0 left-0 right-0 bg-white shadow-md z-40 p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-primary">Админ-панель</h1>
        <button id="mobile-menu-button" class="text-gray-600">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>

    <!-- Боковая панель -->
    <div class="sidebar bg-dark text-white w-64 min-h-screen flex-shrink-0 md:relative fixed z-40">
        <div class="p-6 border-b border-gray-700">
            <h1 class="text-xl font-bold">Новостной Портал</h1>
            <p class="text-gray-400 text-sm mt-1">Административная панель</p>
        </div>
        
        <nav class="p-4">
            <div class="mb-6">
                <p class="text-gray-400 text-xs uppercase tracking-wider mb-3">Основное</p>
                <a href="#" class="block py-2 px-4 rounded bg-primary text-white mb-2">
                    <i class="fas fa-tachometer-alt mr-2"></i> Дашборд
                </a>
                <a href="#" class="block py-2 px-4 rounded text-gray-300 hover:bg-gray-800 mb-2">
                    <i class="fas fa-newspaper mr-2"></i> Статьи
                </a>
                <a href="#" class="block py-2 px-4 rounded text-gray-300 hover:bg-gray-800 mb-2">
                    <i class="fas fa-folder mr-2"></i> Категории
                </a>
                <a href="#" class="block py-2 px-4 rounded text-gray-300 hover:bg-gray-800">
                    <i class="fas fa-tags mr-2"></i> Теги
                </a>
            </div>
            
            <div class="mb-6">
                <p class="text-gray-400 text-xs uppercase tracking-wider mb-3">Дополнительно</p>
                <a href="#" class="block py-2 px-4 rounded text-gray-300 hover:bg-gray-800 mb-2">
                    <i class="fas fa-users mr-2"></i> Пользователи
                </a>
                <a href="#" class="block py-2 px-4 rounded text-gray-300 hover:bg-gray-800 mb-2">
                    <i class="fas fa-comments mr-2"></i> Комментарии
                </a>
                <a href="#" class="block py-2 px-4 rounded text-gray-300 hover:bg-gray-800">
                    <i class="fas fa-cog mr-2"></i> Настройки
                </a>
            </div>
            
            <div class="pt-4 border-t border-gray-700">
                <a href="#" class="block py-2 px-4 rounded text-gray-300 hover:bg-gray-800">
                    <i class="fas fa-sign-out-alt mr-2"></i> Выйти
                </a>
            </div>
        </nav>
    </div>

    <!-- Основной контент -->
    <div class="content-area flex-grow p-6 md:ml-0 mt-16 md:mt-0">
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Управление статьями</h2>
                <button id="add-article-btn" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-blue-800 flex items-center">
                    <i class="fas fa-plus mr-2"></i> Добавить статью
                </button>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Заголовок</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Категория</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Теги</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дата</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Статус</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Действия</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="table-row">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Встреча мировых лидеров</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Политика</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-wrap gap-1">
                                    <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded">G20</span>
                                    <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded">Саммит</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">15.05.2023</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Опубликовано</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <button class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Новая операционная система</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Технологии</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-wrap gap-1">
                                    <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded">Софт</span>
                                    <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded">Обновление</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">14.05.2023</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded-full">Черновик</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <button class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Открытие культурного центра</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Общество</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-wrap gap-1">
                                    <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded">Культура</span>
                                    <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded">Город</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">13.05.2023</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Опубликовано</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <button class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Пагинация -->
            <div class="flex items-center justify-between mt-6">
                <div class="text-sm text-gray-700">
                    Показано с 1 по 3 из 15 записей
                </div>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 bg-white hover:bg-gray-50">
                        Назад
                    </button>
                    <button class="px-3 py-1 rounded border border-primary text-white bg-primary hover:bg-blue-800">
                        1
                    </button>
                    <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 bg-white hover:bg-gray-50">
                        2
                    </button>
                    <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 bg-white hover:bg-gray-50">
                        3
                    </button>
                    <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 bg-white hover:bg-gray-50">
                        Вперед
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Блоки категорий и тегов -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Категории -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Категории</h2>
                    <button class="bg-primary text-white px-3 py-1 rounded-md hover:bg-blue-800 flex items-center text-sm">
                        <i class="fas fa-plus mr-1"></i> Добавить
                    </button>
                </div>
                
                <ul class="divide-y divide-gray-200">
                    <li class="py-3 flex justify-between items-center">
                        <div>
                            <span class="text-gray-900 font-medium">Политика</span>
                            <p class="text-sm text-gray-500">15 статей</p>
                        </div>
                        <div>
                            <button class="text-blue-600 hover:text-blue-900 mr-3">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </li>
                    <li class="py-3 flex justify-between items-center">
                        <div>
                            <span class="text-gray-900 font-medium">Экономика</span>
                            <p class="text-sm text-gray-500">12 статей</p>
                        </div>
                        <div>
                            <button class="text-blue-600 hover:text-blue-900 mr-3">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </li>
                    <li class="py-3 flex justify-between items-center">
                        <div>
                            <span class="text-gray-900 font-medium">Общество</span>
                            <p class="text-sm text-gray-500">8 статей</p>
                        </div>
                        <div>
                            <button class="text-blue-600 hover:text-blue-900 mr-3">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </li>
                    <li class="py-3 flex justify-between items-center">
                        <div>
                            <span class="text-gray-900 font-medium">Технологии</span>
                            <p class="text-sm text-gray-500">10 статей</p>
                        </div>
                        <div>
                            <button class="text-blue-600 hover:text-blue-900 mr-3">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
            
            <!-- Теги -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Теги</h2>
                    <button class="bg-primary text-white px-3 py-1 rounded-md hover:bg-blue-800 flex items-center text-sm">
                        <i class="fas fa-plus mr-1"></i> Добавить
                    </button>
                </div>
                
                <div class="flex flex-wrap gap-2">
                    <div class="bg-blue-50 border border-blue-200 rounded-full px-3 py-1 flex items-center">
                        <span class="text-blue-700 text-sm">G20</span>
                        <button class="ml-1 text-blue-500 hover:text-blue-700">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    </div>
                    <div class="bg-blue-50 border border-blue-200 rounded-full px-3 py-1 flex items-center">
                        <span class="text-blue-700 text-sm">Саммит</span>
                        <button class="ml-1 text-blue-500 hover:text-blue-700">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    </div>
                    <div class="bg-blue-50 border border-blue-200 rounded-full px-3 py-1 flex items-center">
                        <span class="text-blue-700 text-sm">Софт</span>
                        <button class="ml-1 text-blue-500 hover:text-blue-700">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    </div>
                    <div class="bg-blue-50 border border-blue-200 rounded-full px-3 py-1 flex items-center">
                        <span class="text-blue-700 text-sm">Обновление</span>
                        <button class="ml-1 text-blue-500 hover:text-blue-700">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    </div>
                    <div class="bg-blue-50 border border-blue-200 rounded-full px-3 py-1 flex items-center">
                        <span class="text-blue-700 text-sm">Культура</span>
                        <button class="ml-1 text-blue-500 hover:text-blue-700">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    </div>
                    <div class="bg-blue-50 border border-blue-200 rounded-full px-3 py-1 flex items-center">
                        <span class="text-blue-700 text-sm">Город</span>
                        <button class="ml-1 text-blue-500 hover:text-blue-700">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    </div>
                    <div class="bg-blue-50 border border-blue-200 rounded-full px-3 py-1 flex items-center">
                        <span class="text-blue-700 text-sm">Бизнес</span>
                        <button class="ml-1 text-blue-500 hover:text-blue-700">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    </div>
                    <div class="bg-blue-50 border border-blue-200 rounded-full px-3 py-1 flex items-center">
                        <span class="text-blue-700 text-sm">Финансы</span>
                        <button class="ml-1 text-blue-500 hover:text-blue-700">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    </div>
                </div>
                
                <div class="mt-4">
                    <input type="text" placeholder="Добавить тег" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <button class="mt-2 bg-gray-100 text-gray-700 px-3 py-1 rounded-md hover:bg-gray-200 text-sm">
                        Добавить
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Модальное окно добавления статьи -->
    <div id="article-modal" class="modal fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center p-4 z-50 hidden">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl max-h-screen overflow-y-auto">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-800">Добавить новую статью</h3>
                <button id="close-modal" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="p-6">
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Заголовок статьи</label>
                        <input type="text" id="title" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Введите заголовок">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="category">Категория</label>
                        <select id="category" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="">Выберите категорию</option>
                            <option value="politics">Политика</option>
                            <option value="economy">Экономика</option>
                            <option value="society">Общество</option>
                            <option value="technology">Технологии</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">Теги</label>
                        <select id="tags" multiple class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent h-32">
                            <option value="g20">G20</option>
                            <option value="summit">Саммит</option>
                            <option value="software">Софт</option>
                            <option value="update">Обновление</option>
                            <option value="culture">Культура</option>
                            <option value="city">Город</option>
                        </select>
                        <p class="text-gray-500 text-xs mt-1">Для выбора нескольких тегов удерживайте Ctrl</p>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="content">Содержание статьи</label>
                        <textarea id="content" rows="10" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Напишите содержание статьи"></textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Обложка статьи</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-md p-6 text-center">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                            <p class="text-gray-500">Перетащите изображение сюда или</p>
                            <label for="cover-image" class="cursor-pointer text-primary hover:underline">выберите файл</label>
                            <input type="file" id="cover-image" class="hidden" accept="image/*">
                        </div>
                    </div>
                    
                    <div class="mb-4 flex items-center">
                        <input type="checkbox" id="publish" class="mr-2">
                        <label for="publish" class="text-gray-700 text-sm">Опубликовать сразу</label>
                    </div>
                </form>
            </div>
            
            <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                <button id="cancel-modal" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100">Отмена</button>
                <button class="px-4 py-2 bg-primary text-white rounded-md hover:bg-blue-800">Сохранить статью</button>
            </div>
        </div>
    </div>

    <script>
        // Управление мобильным меню
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const sidebar = document.querySelector('.sidebar');
        
        mobileMenuButton.addEventListener('click', () => {
            sidebar.classList.toggle('open');
        });
        
        // Закрытие меню при клике вне его области
        document.addEventListener('click', (e) => {
            if (!sidebar.contains(e.target) && e.target !== mobileMenuButton && window.innerWidth < 768) {
                sidebar.classList.remove('open');
            }
        });
        
        // Управление модальным окном
        const articleModal = document.getElementById('article-modal');
        const addArticleBtn = document.getElementById('add-article-btn');
        const closeModalBtn = document.getElementById('close-modal');
        const cancelModalBtn = document.getElementById('cancel-modal');
        
        addArticleBtn.addEventListener('click', () => {
            articleModal.classList.remove('hidden');
        });
        
        closeModalBtn.addEventListener('click', () => {
            articleModal.classList.add('hidden');
        });
        
        cancelModalBtn.addEventListener('click', () => {
            articleModal.classList.add('hidden');
        });
        
        // Закрытие модального окна при клике вне его области
        articleModal.addEventListener('click', (e) => {
            if (e.target === articleModal) {
                articleModal.classList.add('hidden');
            }
        });
        
        // Имитация функциональности тегов
        const tagInput = document.querySelector('input[placeholder="Добавить тег"]');
        const addTagButton = tagInput.nextElementSibling;
        
        addTagButton.addEventListener('click', () => {
            if (tagInput.value.trim() !== '') {
                const tagsContainer = document.querySelector('.flex.flex-wrap.gap-2');
                const newTag = document.createElement('div');
                newTag.className = 'bg-blue-50 border border-blue-200 rounded-full px-3 py-1 flex items-center';
                newTag.innerHTML = `
                    <span class="text-blue-700 text-sm">${tagInput.value}</span>
                    <button class="ml-1 text-blue-500 hover:text-blue-700">
                        <i class="fas fa-times text-xs"></i>
                    </button>
                `;
                
                // Добавляем обработчик удаления тега
                newTag.querySelector('button').addEventListener('click', function() {
                    this.parentElement.remove();
                });
                
                tagsContainer.appendChild(newTag);
                tagInput.value = '';
            }
        });
        
        // Добавляем обработчики удаления для существующих тегов
        document.querySelectorAll('.bg-blue-50 button').forEach(button => {
            button.addEventListener('click', function() {
                this.parentElement.remove();
            });
        });
    </script>
</body>
</html>