<svg style="display: none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgb(255, 255, 255); display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
    <circle cx="50" cy="50" fill="none" stroke="#1d0e0b" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
    </circle>
</svg>
<div class="login-wrapper">
    <h2 class="login-title">Daftar</h2>
    <form id="register" novalidate class="needs-validation" action="{{ url('/register') }}" method="POST">
        @csrf
        @method('POST')
        <div class="alert alert-danger" style="display: none;"></div>
        <div class="form-group">
            <label for="fullname" class="sr-only">Nama Lengkap</label>
            <input required type="text" name="fullname" id="fullname" class="form-control" placeholder="Nama Lengkap">
            <div class="invalid-feedback">Nama lengkap harus diisi.</div>
        </div>
        <div class="form-group">
            <label for="role" class="sr-only">Peran</label>
            <select required name="role" class="custom-select" style="color: black" id="role">
                <option style="color: black" value="1">Mahasiswa</option>
                <option style="color: black" value="2">Dosen</option>
            </select>
            <div class="invalid-feedback">Peran harus diisi.</div>
        </div>
        <div class="form-group">
            <label for="userid" class="sr-only">User ID</label>
            <input required type="text" name="userid" id="userid" class="form-control" placeholder="User ID">
            <div class="invalid-feedback">User ID harus diisi.</div>
        </div>
        <div class="form-group">
            <label for="email" class="sr-only">Email</label>
            <input required type="email" name="email" id="email" class="form-control" placeholder="Email">
            <div class="invalid-feedback">Email harus diisi.</div>
        </div>
        <div class="form-group mb-3">
            <label for="password" class="sr-only">Password</label>
            <input required type="password" name="password" id="password" class="form-control" placeholder="Password">
            <div class="invalid-feedback">Password harus diisi.</div>
        </div>
        <div class="form-group mb-3">
            <label for="c_password" class="sr-only">Konfirmasi Password</label>
            <input required type="password" name="c_password" id="c_password" class="form-control" placeholder="Konfirmasi Password">
            <div class="invalid-feedback">Password harus dikonfirmasi.</div>
        </div>
        <div class="form-group mb-3">
            <button type="submit" class="btn login-btn">
                Kirim
            </button>
        </div>
    </form>
    <p class="login-wrapper-footer-text">Sudah punya akun? <a href="javascript:void(0)" class="text-reset">Login di sini.</a></p>
</div>
<script>
    (() => {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms).forEach((form) => {
            form.addEventListener('submit', (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
    $('form').on('submit', function(event) {
        event.preventDefault()
        document.querySelector('.login-wrapper').style.display = "none"
        document.querySelector('svg').style.display = "inherit"
        console.log($(this).serialize())
        $.ajax({
            url: "{{ url('/register') }}",
            type: "POST",
            data: $(this).serialize(),
            success: (res) => {
                // window.location.reload()
                console.log(res)
            }, 
            error: (err) => {
                err = err.responseJSON.errors
                document.querySelector('form').classList.remove('was-validated')
                var errMaker = ``
                if (err == false) {
                    errMaker = `<li>User ID atau Password salah</li>`
                    document.querySelector('.alert').innerHTML = errMaker
                } else {
                    Object.keys(err).forEach(item => {
                        err[item].forEach(detail => {
                            errMaker += `<li>${detail}</li>`
                        })
                    })
                    document.querySelector('.alert').innerHTML = errMaker
                    document.querySelector('.alert').style.display = "block"
                }
            },
            complete: () => {
                document.querySelector('.login-wrapper').style.display = "block"
                document.querySelector('svg').style.display = "none"
            }
        })
    })
    $('.text-reset').on('click', function() {
        $('.form-section').html(`
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgb(255, 255, 255); display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
            <circle cx="50" cy="50" fill="none" stroke="#1d0e0b" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
            </circle>
            <!-- [ldio] generated by https://loading.io/ -->
        </svg>
        `)
        $("title").html("Login")
        $.ajax({
            url: '{{ url("login") }}',
            type: 'GET',
            success: (res) => {
                $('.form-section').html(res)
            },
            error: (err) => {
                $('.form-section').html(err)
            }
        })
    })
</script>