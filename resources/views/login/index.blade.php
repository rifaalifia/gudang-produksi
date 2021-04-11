@extends("login.layout")
@section("content")

    <h2>LOGIN</h2>
    @if ($message = Session::get("success"))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get("unsuccess"))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get("unlogin"))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="{{ route("Login.store") }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email</strong>
                    <input type="text" name="email" class="form-control" placeholder="Email">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password</strong>
                    <input type="password" name="password" class="form-control" placeholder="Password">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kategori</strong>
                    <select name="kategori" class="form-control" >
                        <option value="gudang" selected='selected'>gudang
                        </option>
                        <option value="produksi" >produksi
                        </option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Masuk</button>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="/Signup">
                    <button type="button" class="btn btn-info">Daftar</button>
                </a>
            </div>
        </div>
    </form>
@endsection

