<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Game</title>
</head>
<body>

    <h2>Create Game</h2>
    <form action="{{ route('games.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>

        <!-- Description -->
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea><br>

        <!-- Release Date -->
        <label for="release_date">Release Date:</label>
        <input type="date" name="release_date" id="release_date" required><br>

        <!-- Developer -->
        <label for="developer">Developer:</label>
        <input type="text" name="developer" id="developer" required><br>

        <!-- Platform -->
        <label for="platform">Platform:</label>
        <input type="text" name="platform" id="platform" required><br>

        <!-- Categories -->
        <div id="category-container">
            <h3>Available Categories</h3>
            @foreach($categories as $category)
                <label>
                    <input type="checkbox" name="category_ids[]" value="{{ $category->category_id }}">
                    {{ $category->name }}
                </label>
            @endforeach
        </div>

        <!-- Image -->
        <label for="image">Image:</label>
        <input type="file" name="image" id="image"><br>

        <!-- Link -->
        <label for="link">Link:</label>
        <input type="url" name="link" id="link" required><br>

        <button type="submit">Create Game</button>
    </form>

</body>
</html>