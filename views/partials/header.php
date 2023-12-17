<header class="w-full z-50">
    <nav class="flex items-center justify-between p-6 sm:px-8" aria-label="Global">

        <div class="flex sm:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only">My Notes</span>
                <img class="h-8 w-auto" src="images/notes-logo.svg" alt="Notes Logo">
            </a>
        </div>

        <div class="flex sm:hidden">
            <button onclick="expandCollapseMenu()" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-sm p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                     aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
            </button>
        </div>

        <div class="hidden sm:flex sm:gap-x-12">

            <a href="/" class="text-sm font-semibold text-gray-900 hover:underline">Home</a>

            <?php if($_SESSION['has_logged_in'] ?? false) : ?>

                <a href="/notes" class="text-sm font-semibold text-gray-900 hover:underline">Notes</a>
            <?php endif; ?>
        </div>

        <div class="hidden sm:flex sm:flex-1 sm:justify-end">

            <?php if($_SESSION['has_logged_in'] ?? false) : ?>

                <form action="/session" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="text-sm font-semibold text-gray-900 hover:underline">Logout</button>
                </form>
            <?php else : ?>

                <div class="flex justify-center items-center gap-x-6">
                    <a href="/register" class="text-sm font-semibold text-gray-900 hover:underline">
                        Register
                    </a>
                    <a href="/login" class="text-sm font-semibold text-gray-900 hover:underline">
                        Login
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </nav>

    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="hidden sm:hidden" role="dialog" aria-modal="true" id="menu">

        <div class="
                fixed top-0 right-0 z-50
                w-full h-full
                overflow-y-auto bg-white
                px-6 py-6
                sm:ring-1 sm:ring-gray-900/10
            "
        >

            <div class="flex items-center justify-between">

                <a href="/" class="p-1.5">
                    <span class="sr-only">My notes</span>
                    <img class="h-8 w-auto" src="/images/notes-logo.svg" alt="Notes Logo">
                </a>

                <button onclick="expandCollapseMenu()" type="button" class="rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <img class="h-8 w-auto" src="/images/close-button.svg" alt="Close Button">
                </button>
            </div>

            <div class="mt-4 flow-root">

                <div class="divide-y divide-gray-500/10">

                    <div class="py-6">

                        <a href="/" class="block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">
                            Home
                        </a>

                        <?php if($_SESSION['has_logged_in'] ?? false) : ?>

                            <a href="/notes" class="block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">
                                Notes
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="py-6">

                        <?php if($_SESSION['has_logged_in'] ?? false) : ?>

                            <form action="/session" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="w-full flex px-3 py-2.5 text-base font-semibold text-gray-900 hover:bg-gray-50">Logout</button>
                            </form>
                        <?php else : ?>

                            <a href="/register" class="block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                Register
                            </a>
                            <a href="/login" class="block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                Login
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    let menu = document.getElementById('menu');

    const expandCollapseMenu = () => {
        console.log('clicked')

        if( menu && menu.classList ) {

            if( menu.classList.contains('hidden')) {
                menu.classList.remove('hidden')
            } else {
                menu.classList.add('hidden')
            }
            // console.dir(menu)
            // console.log(menu.classList)
            // console.log(menu.classList.contains('hidden'))
        }
    }
</script>