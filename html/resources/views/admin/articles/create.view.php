<?php include COMPONENTS . "/admin/header.view.php" ?>

<?php include COMPONENTS . "/admin/sidebar.view.php" ?>

<div class="content-area flex-1 p-6">
    <h2 class="text-2xl font-bold mb-4">Создать статью</h2>
    <div class="bg-white rounded-lg shadow-md p-6">
        <form method="post" action="/admin/articles">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Заголовок</label>
                <input name="title" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Категория</label>
                <select name="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                    <option value="">Выберите категорию</option>
                    <?php foreach ($categories as $c): ?>
                        <option value="<?php echo (int)$c['id']; ?>"><?php echo htmlspecialchars($c['name'], ENT_QUOTES, 'UTF-8'); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Теги</label>
                <div class="flex flex-wrap gap-3">
                    <?php foreach ($tags as $t): ?>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="tag_ids[]" value="<?php echo (int)$t['id']; ?>" class="mr-2">
                            <span><?php echo htmlspecialchars($t['name'], ENT_QUOTES, 'UTF-8'); ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Содержимое</label>
                <textarea name="content" rows="8" class="w-full px-4 py-2 border border-gray-300 rounded-md" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Статус</label>
                <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    <option value="draft">Черновик</option>
                    <option value="published">Опубликовано</option>
                </select>
            </div>
            <div class="flex justify-end">
                <a href="/admin/articles" class="mr-2 px-3 py-1 rounded-md bg-gray-200 text-gray-800">Отмена</a>
                <button type="submit" class="bg-sky-600 text-white px-3 py-1 rounded-md hover:bg-sky-700">Сохранить</button>
            </div>
        </form>
    </div>
</div>


