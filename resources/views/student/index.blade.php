<div class="page-banner home-banner">
    <div class="svg" style="margin-left: auto; margin-right:auto; display: none; position: relative; opacity: 100%; width: 100px; height: 100px;">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: transparent; display: block; shape-rendering: auto;" width="calc(100% - 30px)" height="calc(100% - 30px)" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
            <circle cx="50" cy="50" fill="none" stroke="#1d0e0b" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
            </circle>
            <!-- [ldio] generated by https://loading.io/ -->
        </svg>
    </div>
    <div class="row align-items-center flex-wrap-reverse h-100">
        <div class="col-md-6 py-5 wow fadeInLeft">
            <h1 class="mb-4">Dapatkan tanda tangan digital dosenmu sekarang!</h1>
            <a href="#" class="btn btn-primary btn-split" data-toggle="modal" data-target="#staticBackdrop">Minta Tanda Tangan<div class="fab"><span class="mai-add"></span></div></a>
        </div>
        <div class="col-md-6 py-5 wow zoomIn">
            <div class="img-fluid text-center">
                <img src="{{ asset('img/1924480.png') }}" alt="E-Signature">
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade mt-5" style="" id="staticBackdrop" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form novalidate id="form-permohonan">
        @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form Permohonan Tanda Tangan Digital</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <table style="width: 100%">
                            <tbody>
                                <tr>
                                    <td>Dosen</td>
                                    <td>
                                        <select required class="form-control" name="lecturer_id" id="lecturer_id">
                                            <option></option>
                                        </select>
                                        <div class="invalid-feedback">Nama dosen tidak boleh kosong.</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Perihal</td>
                                    <td>
                                        <textarea required name="note" id="note" cols="30" class="form-control" rows="10"></textarea>
                                        <div class="invalid-feedback">Catatan tidak boleh kosong.</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Kirim Permohonan</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    (() => {
        'use strict';

        const form = document.querySelector('#form-permohonan');

        form.addEventListener('submit', (event) => {
            console.log(!form.checkValidity())
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }else if(form.checkValidity()){
                event.preventDefault()
                $.ajax({
                    url: "{{ route('signature-req') }}",
                    type: "POST",
                    data: $('form').serialize(),
                    success: (res) => {
                        Toastify({
                            text: "Permohonan telah dikirim",
                            duration: 3000,
                            className: "info",
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            }
                        }).showToast();
                        $('.modal').modal('hide')
                        $('#form-permohonan')[0].reset()
                        $('#lecturer_id').val(null).trigger('change');
                        
                        form.classList.remove('was-validated');
                    }
                })
            }
            form.classList.add('was-validated');
        }, false);
    })();
    
    $('select').select2({
        placeholder: 'Pilih Dosen',
        dropdownAutoWidth : true,
        width: '100%',
        ajax: {
            url: `{{ route("get-lecturer") }}`,
            data: function (params) {
                return {
                    q: $.trim(params.term),
                    page: params.page || 1
                };
            },
            processResults: function(data) {
                let results = []
                data.forEach((element, _index) => {
                    results.push({
                        id: element.id,
                        text: element.fullname
                    })
                });
                return {
                    results: results
                }
            }
        }
    });

    function listenerAction() {
        document.querySelector('.row').style.display = "none"
        setTimeout(() => {
            document.querySelector('.svg').style.display = "block"
            document.querySelectorAll('.nav-item')[0].classList.remove('active')
            document.querySelectorAll('.nav-item')[1].classList.add('active')
            $.ajax({
                url: "{{ route('get-permohonan') }}",
                type: "GET",
                success: (res) => {
                    $('#main').html(res)
                }
            })
        }, 100);
        document.querySelectorAll('.nav-item')[1].removeEventListener("click", listenerAction)
    }

    document.querySelectorAll('.nav-item')[1].addEventListener("click", listenerAction)

</script>