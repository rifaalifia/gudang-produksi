@extends("signup.layout")
@section("content")

    <h2>Sign Up System</h2>

    <form action="{{ route("Signup.store") }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama User</strong>
                    <input type="text" name="name" class="form-control" placeholder="Nama User">
                </div>
            </div>

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
                <button type="submit" class="btn btn-primary">Daftar</button>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="/Login">
                    <button type="button" class="btn btn-info">Masuk</button>
                </a>
            </div>
        </div>
    </form>
    @if ($message = Session::get("success"))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
@endsection
