<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Simple app</h3>
    <p>Welcome to the blog appp.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut voluptatibus perferendis quia praesentium ea harum doloribus doloremque, cumque iste animi dolor quaerat nostrum adipisci. Voluptatum praesentium eos perspiciatis alias quos.
    </p>

    @auth 
        <h3>You are logged in as {{ auth()->user()['name'] }}</h3>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <br><br>
        <div style="border: 3px solid black">
            <h2>Create Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input required type="text" name="title" placeholder="enter your title">
                <textarea required name="body" placeholder="create content"></textarea>
                <button type="submit">Create post</button>
            </form>
        </div>
        <br><br>
        <div style="border: 3px solid black">
            <h2>All Blog Post </h2>
            @foreach ($postByUser as $post)
                <div style="background: gray; padding: 10px; margin:10px;">
                    <h4>{{$post['title']}} by {{$post->user->name}}</h4>
                    <p>{{$post['body']}}</p>
                    <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

    @else
        <div style="border: 3px solid black">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input required type="text" name="name" placeholder="enter your name">
                <input required type="text" name="email" placeholder="enter your email">
                <input required type="password" name="password" placeholder="password">
                <button type="submit">Register</button>
            </form>
        </div>
        <br><br>

        <div style="border: 3px solid black">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input required type="text" name="lname" placeholder="enter your name">
                <input required type="password" name="lpassword" placeholder="password">
                <button type="submit">Login</button>
            </form>
        </div>
        <br><br>
        <div style="border: 3px solid black">
            <h2>All Blog Post</h2>
            @foreach ($posts as $post)
                <div style="background: gray; padding: 10px; margin:10px;">
                    <h4>{{$post['title']}} by {{$post->user->name}}</h4>
                    <p>{{$post['body']}}</p>
                </div>
            @endforeach
        </div>
    @endauth

    
</body>
</html>