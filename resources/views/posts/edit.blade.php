<!-- resources/views/posts/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <!-- Add your stylesheets or scripts here -->
</head>
<body>
    <h2>Edit Post</h2>

    <form action="{{ route('posts.update', $post->post_id,$post->game_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="game_title">Tên:</label>
        <input type="text" name="game_title" required>
        <br>

        <label for="game_description">Game Description:</label>
        <textarea name="game_description" required></textarea>
        <br>

        <label for="release_date">Release Date:</label>
        <input type="date" name="release_date" required>
        <br>

        <label for="developer">Developer:</label>
        <input type="text" name="developer" required>
        <br>

        <label for="platform">Platform:</label>
        <input type="text" name="platform" required>
        <br>

        <label for="game_image">Game Image:</label>
        <input type="file" name="game_image">
        <br>

        <label for="game_link">Link web game:</label>
        <input type="text" name="game_link" required>
        <br>
        <div id="category-container">
            <h3>Available Categories</h3>
            @foreach($categories as $category)
                <label>
                    <input type="checkbox" name="category_ids[]" value="{{ $category->category_id }}">
                    {{ $category->name }}
                </label>
            @endforeach
        </div>
        <br>
        <label for="post_title">Tên bài đăng:</label>
        <input type="text" name="post_title" required>
        <br>

        <label for="post_content">Giới thiệu về game:</label>
        <textarea name="post_content" required></textarea>
        <br>

        <label for="post_image">ảnh:</label>
        <input type="file" name="post_image">
        <br>

        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</body>
</html>
