<?php include COMPONENTS . "/admin/header.view.php" ?>

<!-- Боковая панель -->
<?php include COMPONENTS . "/admin/sidebar.view.php" ?>

<!-- Главное содержимое -->
<div class="content-area flex-1 p-6">
    <h2 class="text-2xl font-bold mb-4">Редактировать тег</h2>
    <div class="bg-white rounded-lg shadow-md p-6">
        <form method="post" action="/admin/tags/<?php echo (int)$tag['id']; ?>">
            <?php echo \App\Helpers\CsrfHelper::csrfField(); ?>
            <?php if (!empty($errors)): ?>
                <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Название</label>
                <input name="name" type="text" value="<?php echo htmlspecialchars($_POST['name'] ?? $tag['name'], ENT_QUOTES, 'UTF-8'); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required minlength="2" maxlength="50">
                <?php if (isset($errors['name'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($errors['name'], ENT_QUOTES, 'UTF-8'); ?></p>
                <?php endif; ?>
            </div>
            <div class="flex justify-end">
                <a href="/admin/tags" class="mr-2 px-3 py-1 rounded-md bg-gray-200 text-gray-800">Отмена</a>
                <button type="submit" class="bg-sky-600 text-white px-3 py-1 rounded-md hover:bg-sky-700">Сохранить</button>
            </div>
        </form>
    </div>
</div>


