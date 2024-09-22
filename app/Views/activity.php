<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Log</title>
    <link rel="stylesheet" href="<?= base_url('path/to/your/css/styles.css'); ?>">
</head>
<body>
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Activity Log</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID Activity</th>
                          
                            <th scope="col">Activity</th>
                            <th scope="col">Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($activities) && is_array($activities)): ?>
                            <?php foreach ($activities as $activity): ?>
                                <tr>
                                    <th scope="row"><?= esc($activity->id_activity); ?></th>
                                   
                                    <td><?= esc($activity->activity); ?></td>
                                    <td><?= esc($activity->timestamp); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">No activities found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
