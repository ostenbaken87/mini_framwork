<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора - <?= $title ?? '' ?></title>
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