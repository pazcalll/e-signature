<div class="login-wrapper">
    <h2 class="login-title">Masuk</h2>
    <form id="login" novalidate action="{{ route('authenticate') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="userid" class="sr-only">User ID</label>
            <input required type="text" name="userid" id="userid" class="form-control" placeholder="User ID">
            <div class="invalid-feedback">User ID harus diisi.</div>
        </div>
        <div class="form-group mb-3">
            <label for="password" class="sr-only">Password</label>
            <input required type="password" name="password" id="password" class="form-control" placeholder="Password">
            <div class="invalid-feedback">Password harus diisi.</div>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-5">
            <button  name="login" id="login" class="btn login-btn" type="submit">
                Login
            </button>
        </div>
    </form>           
    <p class="login-wrapper-footer-text">Belum punya akun <a href="javascript:void(0)" class="text-reset">Daftar di sini.</a></p>
</div>
<script>
    (() => {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('#login');

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
    $('.text-reset').on('click', function() {
        $('.form-section').html(`
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgb(255, 255, 255); display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
            <circle cx="50" cy="50" fill="none" stroke="#1d0e0b" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
            </circle>
            <!-- [ldio] generated by https://loading.io/ -->
        </svg>
        `)
        $.ajax({
            url: '{{ url("register") }}',
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