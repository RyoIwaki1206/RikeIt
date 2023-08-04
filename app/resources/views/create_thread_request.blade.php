<head>
    <title>スレッド作成申請</title>
</head>
<body>
    <h1>スレッド作成申請</h1>
    <form method="POST" action="{{ route('thread_request.store') }}">
        @csrf
        <div>
            <label for="title">スレッド名</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div>
            <label for="reason">申請理由</label>
            <textarea name="reason" id="reason" rows="4" required></textarea>
        </div>

        <div>
            <button type="submit">申請</button>
        </div>
    </form>
</body>
</html>