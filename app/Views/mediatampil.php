<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Media Feed</h6>

    <!-- Media Items -->
    <?php foreach ($media as $item): ?>
        <div id="media-<?= $item->id ?>" class="media-item mt-4">
            <!-- Display Username -->
            <h6>Uploaded by: <?= $item->nama_lengkap ?></h6>

            <!-- Display media based on type -->
            <?php if ($item->media_type === 'photo'): ?>
                <img src="<?= base_url('images/' . $item->media_path) ?>" alt="Photo" class="img-fluid rounded">
            <?php elseif ($item->media_type === 'video'): ?>
                <video src="<?= base_url('images/' . $item->media_path) ?>" class="img-fluid rounded" controls></video>
            <?php endif; ?>

            <!-- Display Description -->
            <?php if (!empty($item->description)): ?>
                <p><?= $item->description ?></p>
            <?php endif; ?>

            <!-- Display Like Count -->
            <p class="mt-2"><strong id="like-count-<?= $item->id ?>"><?= $item->like_count ?> Likes</strong></p>

            <!-- Like Form -->
            <form action="javascript:void(0);" method="post" class="mt-3" onsubmit="likeMedia(<?= $item->id ?>)">
                <button type="submit" class="btn btn-outline-primary" id="like-button-<?= $item->id ?>" <?= $item->user_has_liked ? 'disabled' : '' ?>>
                    <?= $item->user_has_liked ? 'Liked' : 'Like' ?>
                </button>
            </form>

            <!-- Comment Form -->
            <form action="/home/comment/<?= $item->id ?>" method="post" class="mt-3">
                <div class="input-group mb-2">
                    <textarea class="form-control" name="comment" placeholder="Write a comment"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">Comment</button>
            </form>

            <!-- View Comments Button -->
            <button class="btn btn-outline-secondary mt-3" onclick="toggleComments('comments-<?= $item->id ?>')">View Comments</button>

            <!-- Display One Comment -->
            <div id="comments-<?= $item->id ?>" class="comments mt-3" style="display: none;">
                <?php if (!empty($item->comment_text)): ?>
                    <p class="bg-dark p-2 rounded"><?= $item->comment_text ?></p>
                <?php else: ?>
                    <p>No comments yet.</p>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<script>
    function toggleComments(commentId) {
        const commentsDiv = document.getElementById(commentId);
        commentsDiv.style.display = commentsDiv.style.display === "none" ? "block" : "none";
    }

    function likeMedia(media_id) {
    const xhr = new XMLHttpRequest();
    const url = `<?= base_url('home/like') ?>/${media_id}`;

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Menangani response jika perlu
                console.log('Response:', xhr.responseText);
            } else {
                alert('Request failed: ' + xhr.statusText);
            }
        }
    };

    // Mengirimkan hanya media_id
    xhr.send(`media_id=${media_id}`);

    // Update jumlah like di frontend
    const likeCountElement = document.getElementById(`like-count-${media_id}`);
    let currentLikes = parseInt(likeCountElement.textContent) || 0; // Ambil jumlah like saat ini
    likeCountElement.textContent = `${currentLikes + 1} Likes`; // Tambah 1 likes

    const likeButton = document.querySelector(`button[data-media-id="${media_id}"]`);
    likeButton.textContent = 'Liked'; // Ubah teks tombol menjadi 'Liked'
    likeButton.disabled = true; // Nonaktifkan tombol setelah di-like
}


</script>
