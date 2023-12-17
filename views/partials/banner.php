<div class="mx-auto max-w-7xl py-6 -x-4 sm:px-3 px-8">
    <h1 class="font-bold text-sm text-gray-900">
        Welcome,
        <?= isset($_SESSION['has_logged_in']) && isset($_SESSION['user']) ?
            $_SESSION['user']['email'] :
            'Guest'
        ?>
    </h1>
</div>