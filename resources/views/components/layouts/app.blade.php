<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'DCodeMania' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-slate-200 dark:bg-slate-700">
       @livewire('partials.navbar')
        <main>
        {{ $slot }}
        </main>
        @livewire('partials.footer')
        @livewireScripts
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('cart-updated', (event) => {
            const toast = document.createElement('div');
            toast.innerHTML = '✓ Product added to cart successfully!';
            toast.style.cssText = 'position:fixed;top:20px;right:20px;background:#10b981;color:white;padding:15px 25px;border-radius:8px;z-index:9999;font-weight:600;box-shadow:0 4px 6px rgba(0,0,0,0.1);';
            document.body.appendChild(toast);
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transition = 'opacity 0.3s';
                setTimeout(() => toast.remove(), 300);
            }, 2700);
        });
    });
</script>
    </body>
</html>