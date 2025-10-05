<?php include COMPONENTS . "/admin/header.view.php" ?>

<!-- Боковая панель -->
<?php include COMPONENTS . "/admin/sidebar.view.php" ?>

<!-- Главное содержимое -->
<div class="content-area flex-1 p-6">
    <h2 class="text-2xl font-bold mb-4">Список тегов</h2>
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Теги</h2>
            <a href="/admin/tags/create" class="bg-sky-600 text-white px-3 py-1 rounded-md hover:bg-sky-700 text-sm">Добавить</a>
        </div>

        <?php if (!empty($tags)): ?>
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Название</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($tags as $tag): ?>
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-900"><?php echo (int)$tag['id']; ?></td>
                            <td class="px-4 py-2 text-sm text-gray-900"><?php echo htmlspecialchars($tag['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td class="px-4 py-2 text-sm text-right">
                                <a href="/admin/tags/<?php echo (int)$tag['id']; ?>/edit" class="text-blue-600 hover:text-blue-800 mr-3">Изменить</a>
                                <form action="/admin/tags/<?php echo (int)$tag['id']; ?>/delete" method="post" style="display:inline">
                                    <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Удалить тег?')">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-gray-600">Тегов пока нет.</p>
        <?php endif; ?>
    </div>
</div>