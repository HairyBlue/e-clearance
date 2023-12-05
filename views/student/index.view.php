<!-- 
    $profile["studentId"]
    $profile["name"]
    $profile["course"]
    $profile["year"]
    $profile["divisionName"]
 -->

<?php require base_path("views/partials/head.php") ?>
<main class="w-full h-screen">
    <div class="w-[70%] m-auto mt-8">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight"><?= htmlspecialchars($profile["name"]) ?></h2>
                <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <p class="mr-2 font-semibold">Course and Year:</p>
                        <?= htmlspecialchars($profile["course"]) ?> -
                        <?= htmlspecialchars($profile["year"]) ?>
                    </div>
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <p class="mr-2 font-semibold">Division: </p>
                        <?= htmlspecialchars($profile["divisionName"]) ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="mt-4">
            <h3 class="font-bold text-2xl">Clearance Status</h3>
        </div>
    </div>


</main>

<?php require base_path("views/partials/footer.php") ?>