<h1>Ola</h1>
@guest
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Cadastro</a>
@else
    <h1>Ola, kkkk {{ Auth::user()->name }}</h1>
    <br>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endguest
