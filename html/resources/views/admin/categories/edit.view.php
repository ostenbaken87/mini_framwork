<?php include COMPONENTS . "/admin/header.view.php" ?>

<!-- Боковая панель -->
<?php include COMPONENTS . "/admin/sidebar.view.php" ?>

<!-- Главное содержимое -->
<div class="content-area flex-1 p-6">
    <h2 class="text-2xl font-bold mb-4">Редактировать категорию</h2>
    <div class="bg-white rounded-lg shadow-md p-6">
        <form method="post" action="/admin/categories/<?php echo (int)$category['id']; ?>">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Название</label>
                <input name="name" type="text" value="<?php echo htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8'); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required minlength="2" maxlength="50">
            </div>
            <div class="flex justify-end">
                <a href="/admin/categories" class="mr-2 px-3 py-1 rounded-md bg-gray-200 text-gray-800">Отмена</a>
                <button type="submit" class="bg-sky-600 text-white px-3 py-1 rounded-md hover:bg-sky-700">Сохранить</button>
            </div>
        </form>
    </div>
</div>