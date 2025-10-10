<?php include COMPONENTS . "/admin/header.view.php" ?>

<!-- Боковая панель -->
<?php include COMPONENTS . "/admin/sidebar.view.php" ?>

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
                <a href="/admin/categories/create" class="bg-primary text-white px-3 py-1 rounded-md hover:bg-blue-800 flex items-center text-sm">
                    <i class="fas fa-plus mr-1"></i> Добавить
                </a>
            </div>

            <ul class="divide-y divide-gray-200">
                <?php foreach ($categories as $category): ?>
                    <li class="py-3 flex justify-between items-center">
                        <div>
                            <span class="text-gray-900 font-medium"><?php echo $category['name'] ?></span>
                            <p class="text-sm text-gray-500">15 статей</p>
                        </div>
                        <div>
                            <a href="/admin/categories/<?php echo (int)$category['id']; ?>/edit" class="text-blue-600 hover:text-blue-900 mr-3">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="/admin/categories/<?php echo (int)$category['id']; ?>/delete" method="post" style="display:inline">
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Удалить категорию?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Теги -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-gray-800">Теги</h2>
                <a href="/admin/tags/create" class="bg-primary text-white px-3 py-1 rounded-md hover:bg-blue-800 flex items-center text-sm">
                    <i class="fas fa-plus mr-1"></i> Добавить
                </a>
            </div>

            <div class="flex flex-wrap gap-2">
                <?php foreach ($tags as $tag): ?>
                    <div class="bg-blue-50 border border-blue-200 rounded-full px-3 py-1 flex items-center">
                        <span class="text-blue-700 text-sm"><?php echo $tag['name']; ?></span>
                        <form action="/admin/tags/<?php echo (int)$tag['id']; ?>/delete" method="post">
                            <button class="ml-1 text-blue-500 hover:text-blue-700" onclick="return confirm('Удалить тег?')">
                                <i class="fas fa-times text-xs"></i>
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
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
                        <?php foreach ($tags as $tag): ?>
                            <option value="<?php echo $tag['id']; ?>"><?php echo $tag['name']; ?></option>
                        <?php endforeach; ?>
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

<?php include COMPONENTS . "/admin/scripts.view.php" ?>