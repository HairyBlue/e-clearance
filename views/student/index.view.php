<!-- 
    $profile["studentId"]
    $profile["name"]
    $profile["course"]
    $profile["year"]
    $profile["divisionName"]
 -->

<?php require base_path("views/partials/head.php") ?>
<main class="w-full h-screen flex items-center justify-center">
    <div class="w-[60%] border p-4">
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
        <div class="mt-4 pr-8 pl-8">
            <h3 class="font-bold text-4xl mb-4">Clearance Status</h3>
            <div>
                <div>
                    <div class="flex text-2xl font-bold justify-between mb-4 ">
                        <div>
                            WEW
                        </div>
                        <div>
                            Offices
                        </div>
                        <div>
                            Status
                        </div>
                    </div>
                    <?php foreach ($status as $key => $val) : ?>
                        <div class="flex text-2xl font-bold justify-between mb-4 ">
                            <div>
                                <?php if ($val == 0) : ?>
                                    <div>
                                        <img src="/assets/image/pending-check.svg" alt="">
                                    </div>
                                <?php else : ?>
                                    <div>
                                        <img src="/assets/image/approved-check.svg" alt="">
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div>
                                <?= $key ?>
                            </div>
                            <div>
                                <?php if ($val == 0) : ?>
                                    <div>
                                        Pending
                                    </div>
                                <?php else : ?>
                                    <div>
                                        Approved
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>


</main>

<?php require base_path("views/partials/footer.php") ?>