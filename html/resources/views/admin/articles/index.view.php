<?php include COMPONENTS . "/admin/header.view.php" ?>

<?php include COMPONENTS . "/admin/sidebar.view.php" ?>

<div class="content-area flex-1 p-6">
    <h2 class="text-2xl font-bold mb-4">Список статей</h2>
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Статьи</h2>
            <a href="/admin/articles/create" class="bg-sky-600 text-white px-3 py-1 rounded-md hover:bg-sky-700 text-sm">Добавить</a>
        </div>

        <?php if (!empty($articles)): ?>
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">№</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Заголовок</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Категория</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Статус</th>
                    <th class="px-4 py-2"></th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <?php $i = 1; foreach ($articles as $article): ?>
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-900"><?php echo $i++; ?></td>
                        <td class="px-4 py-2 text-sm text-gray-900"><?php echo htmlspecialchars($article['title'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td class="px-4 py-2 text-sm text-gray-900"><?php echo htmlspecialchars($article['category_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td class="px-4 py-2 text-sm text-gray-900"><?php echo htmlspecialchars($article['status'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td class="px-4 py-2 text-sm text-right">
                            <a href="/admin/articles/<?php echo (int)$article['id']; ?>/edit" class="text-blue-600 hover:text-blue-800 mr-3">Изменить</a>
                            <form action="/admin/articles/<?php echo (int)$article['id']; ?>/delete" method="post" style="display:inline">
                                <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Удалить статью?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-gray-600">Статей пока нет.</p>
        <?php endif; ?>
    </div>
</div>


