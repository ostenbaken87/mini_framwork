<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новостной портал | <?= $title ?? '' ?></title>
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
                        light: '#f3f4f6'
                    }
                }
            }
        }
    </script>
    <style>
        .error-code {
            text-shadow: 3px 3px 0 rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50 font-sans text-gray-800">
    <!-- Шапка -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-primary">Новостной Портал</h1>
                </div>
                
                <nav class="hidden md:flex space-x-6">
                    <a href="/" class="text-secondary hover:text-primary font-medium">Главная</a>
                    <a href="#" class="text-secondary hover:text-primary font-medium">Политика</a>
                    <a href="#" class="text-secondary hover:text-primary font-medium">Экономика</a>
                    <a href="#" class="text-secondary hover:text-primary font-medium">Общество</a>
                    <a href="#" class="text-secondary hover:text-primary font-medium">Технологии</a>
                </nav>
                
                <div class="flex items-center space-x-4">
                    <button class="bg-primary text-white px-4 py-2 rounded hover:bg-blue-800">Войти</button>
                    <button class="md:hidden">
                        <i class="fas fa-bars text-xl text-secondary"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>