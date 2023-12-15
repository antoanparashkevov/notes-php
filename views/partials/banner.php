<div class="mx-auto max-w-7xl py-6 -x-4 sm:px-6 lg:px-8">
    <h1 class="font-bold text-xl text-gray-900">
        Welcome,
        <?= isset($_SESSION['has_logged_in']) && isset($_SESSION['user']) ? $_SESSION['user']['email'] : 'Guest' ?>
    </h1>
</div>