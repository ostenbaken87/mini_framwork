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