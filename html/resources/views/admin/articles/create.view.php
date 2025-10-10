<?php include COMPONENTS . "/admin/header.view.php" ?>

<?php include COMPONENTS . "/admin/sidebar.view.php" ?>

<div class="content-area flex-1 p-6">
    <h2 class="text-2xl font-bold mb-4">Создать статью</h2>
    <div class="bg-white rounded-lg shadow-md p-6">
        <form method="post" action="/admin/articles">
            <?php echo \App\Traits\CsrfHelper::csrfFieldStatic(); ?>
            <?php if (!empty($errors)): ?>
                <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                    <?php foreach ($errors as $field => $error): ?>
                        <p><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Заголовок</label>
                <input name="title" type="text" value="<?php echo htmlspecialchars($_POST['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                <?php if (isset($errors['title'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($errors['title'], ENT_QUOTES, 'UTF-8'); ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Категория</label>
                <select name="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                    <option value="">Выберите категорию</option>
                    <?php foreach ($categories as $c): ?>
                        <option value="<?php echo (int)$c['id']; ?>" <?php echo ((int)$c['id'] === (int)($_POST['category_id'] ?? 0)) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($c['name'], ENT_QUOTES, 'UTF-8'); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if (isset($errors['category_id'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($errors['category_id'], ENT_QUOTES, 'UTF-8'); ?></p>
                <?php endif; ?>
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
                <textarea name="content" rows="8" class="w-full px-4 py-2 border border-gray-300 rounded-md" required><?php echo htmlspecialchars($_POST['content'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                <?php if (isset($errors['content'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($errors['content'], ENT_QUOTES, 'UTF-8'); ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Статус</label>
                <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    <option value="draft" <?php echo ($_POST['status'] ?? 'draft') === 'draft' ? 'selected' : ''; ?>>Черновик</option>
                    <option value="published" <?php echo ($_POST['status'] ?? 'draft') === 'published' ? 'selected' : ''; ?>>Опубликовано</option>
                </select>
                <?php if (isset($errors['status'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($errors['status'], ENT_QUOTES, 'UTF-8'); ?></p>
                <?php endif; ?>
            </div>
            <div class="flex justify-end">
                <a href="/admin/articles" class="mr-2 px-3 py-1 rounded-md bg-gray-200 text-gray-800">Отмена</a>
                <button type="submit" class="bg-sky-600 text-white px-3 py-1 rounded-md hover:bg-sky-700">Сохранить</button>
            </div>
        </form>
    </div>
</div>


