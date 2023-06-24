<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Edit Post</h1>
    <div style="border: 3px solid black; padding: 40px;">
    <form action="/edit-post/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')
        <input required type="text" name="title" value={{$post->title}} placeholder="enter your title">
        <textarea required name="body" placeholder="create content">{{$post->body}} </textarea>
        <button type="submit">Save changes</button>
    </form>
    </div>
</body>
</html>