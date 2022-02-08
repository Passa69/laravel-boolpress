<header>
    <h1>HOMEPAGE</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @auth
        <h1>Hi {{ Auth::user() -> name }}!</h1>
        <a class="btn btn-secondary" href="{{ route('logout') }}">LOGOUT</a>
    @else
        <h1>If you wanne see my site you have to login/register</h1>
   

        <h2>Register</h2>
        <form action="{{ route('register') }}" method="POST">

            @method('POST')
            @csrf

            <label for="name">Name</label>
            <input type="text" name="name" value="Tommaso"><br>

            <label for="email">E-mail</label>
            <input type="text" name="email" value="aaa@bbb.ccc"><br>

            <label for="password">Password</label>
            <input type="password" name="password" value="password"><br>

            <label for="password_confirmation">Password confirm</label>
            <input type="password" name="password_confirmation" value="password"><br><br>

            <input class="btn btn-secondary" type="submit" value="REGISTER">

        </form>

        <br><hr class="bg-white"><br>

        <h2>Login</h2>
            <form action="{{ route('login') }}" method="POST">

            @method('POST')
            @csrf

            <label for="email">E-mail</label>
            <input type="text" name="email" value="aaa@bbb.ccc"><br>

            <label for="password">Password</label>
            <input type="password" name="password" value="password"><br><br>
            
            <input class="btn btn-secondary" type="submit" value="LOGIN">

        </form>

        <br><hr class="bg-white"><br>
    @endauth
</header>