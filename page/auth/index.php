<div class="w-100 min-vh-100 d-flex justify-content-center align-items-center">
    <div class="card border border-0 shadow w-50">
        <div class="card-body">
            <h1 class="text-center fw-bold fs-1 fst-italic">LOGIN</h1>
            <p class="text-center fw-light text-secondary fst-italic">"Rental Mobil di Mana Saja dan Kapan Saja"</p>
            <form action="?logic=logic&login=login" method="post">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" name="login" class="btn btn-md btn-primary w-100">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>