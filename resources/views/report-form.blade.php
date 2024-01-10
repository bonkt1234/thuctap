<!-- report-form.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Post</title>
</head>
<body>

    <h2>Report Post</h2>

    <form action="{{ route('report.post', ['postId' => $postId]) }}" method="post">
        @csrf

        <label for="reason">Reason for Report:</label>
        <textarea name="reason" id="reason" required></textarea>

        <button type="submit">Submit Report</button>
    </form>

</body>
</html>
