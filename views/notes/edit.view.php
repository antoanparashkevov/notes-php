<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <meta name="description" content="My Personal Notes">
    <title>Notes | Edit a note</title>
</head>
    <body class="flex flex-col min-h-screen bg-white">
    <?php view('partials/header.php'); ?>
    <main>
        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                 aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                     style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">

                <div class="text-center">

                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Edit</h1>

                    <form method="post" action="/note" class="flex flex-col gap-4 justify-center items-center mt-6">

                        <input type="hidden" name="_method" value="PATCH">

                        <!-- pass the id with a hidden input because we are actually sending a POST request and want to handle that id with the $_POST super global -->
                        <input type="hidden" name="id" value="<?= $note['id'] ?>">

                        <textarea
                            class="border border-blue-500 rounded-lg focus:border-blue-700 resize-none"
                            name="body"
                            id="body"
                            cols="30"
                            rows="10"
                            required
                        ><?= htmlspecialchars($note['body']) ?></textarea>

                        <?php if(isset($errors['body'])) : ?>

                            <p class="text-red-500 text-xs font-bold"> <?= $errors['body'] ?> </p>

                        <?php endif; ?>

                        <div class="flex gap-x-4 items-center justify-center">
                            <a
                                href="/notes"
                                class="
                                    rounded-lg bg-red-500 p-4 text-sm font-semibold text-white shadow-sm
                                    hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600
                                "
                            >
                                Cancel
                            </a>

                            <button
                                type="submit"
                                class="
                                    rounded-lg bg-orange-500 p-4 text-sm font-semibold text-white shadow-sm
                                    hover:bg-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600
                                "
                            >
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                 aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                     style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
        </div>
    </main>
    <?php view('partials/footer.php'); ?>
    </body>
</html