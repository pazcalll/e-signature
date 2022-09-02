<div class="container" style="margin-top: 8rem; margin-bottom: 10rem">
    <h1 class="mb-4">Daftar Permohonan Tanda Tangan</h1>
    <table class="table table-bordered data-striped">
        <thead>
            <tr>
                <td>No.</td>
                <td>Waktu</td>
                <td>Hash</td>
                <td>Keterangan</td>
                <td>Tindakan</td>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <script>
        function openModal(hash) {
            $(':input','form')
                .not(':button, :submit, :reset, input[name="_token"]')
                .val(null)
                .prop('checked', false)
                .prop('selected', false)
            $('#hash').val(hash)
            $(".dropify-clear").trigger("click")
            $('.modal').modal('show')
        }
        let dt = $('table').DataTable({
            ajax: '{{route("unsigned")}}',
            serverSide: true,
            processing: true,
            searching: false,
            scrollX: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json"
            },
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '15%', targets: 1 },
                { width: '20%', targets: 2 },
                { width: '30%', targets: 3 },
                { width: '30%', targets: 4 },
            ],
            columns: [
                {
                    data: '',
                    render: (data, type, row, meta) => {
                        return meta.row + meta.settings._iDisplayStart + 1
                    }
                },
                {
                    data: null,
                    render: function(data, type, full, meta) {
                        return `
                        <div style="word-break: break-all">
                            ${data.created_at}
                        </div>
                        `
                    }
                },
                {
                    data: null,
                    render: function(data, type, full, meta) {
                        return `
                        <div style="word-break: break-all">
                            ${data.signature_detail.hash}
                        </div>
                        `
                    }
                },
                {
                    data: null,
                    render: function(data, type, full, meta) {
                        return `
                            ${data.signature_detail.note}
                            <br>
                            dari: <span style="color: #0388fc">${data.student.fullname}</span>
                        `
                    }
                },
                {
                    data: null,
                    render: function(data, type, full, meta) {
                        let action = `
                        <div style="display: flex">
                            <button onclick=openModal("${data.signature_detail.hash}") style="margin-right: 10px" type="button" class="btn-primary btn-sm">
                                <i class="mai mai-pencil"></i>
                                Tanda Tangani
                            </button>
                            <button type="button" class="btn-danger btn-sm">
                                <i class="mai mai-trash-bin"></i>
                                Tolak
                            </button>
                        </div>
                        `
                        return action
                    }
                }
            ]
        })
    </script>
</div>

<!-- Modal -->
<div class="modal fade mt-5" style="" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Masukan Tanda Tangan Digital</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                @csrf
                <div class="modal-body">
                    <div style="display: none; background: #FFFFFF; position: absolute; opacity: 100%; width: calc(100% - 30px); height: calc(100% - 30px);">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgb(255, 255, 255); display: block; shape-rendering: auto;" width="calc(100% - 30px)" height="calc(100% - 30px)" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                            <circle cx="50" cy="50" fill="none" stroke="#1d0e0b" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                            </circle>
                            <!-- [ldio] generated by https://loading.io/ -->
                        </svg>
                    </div>
                    <label for="signature">Tanda Tangan (.png)</label><br>
                    <label for="signature" class="badge badge-danger">Ukuran max. 1 mb</label><br>
                    <label for="signature" class="badge badge-danger">Panjang atau lebar min. 200px</label>
                    <br>
                    <input name="signature" id="signature" required type="file" onchange="loadFile(event)" data-plugin="dropify" data-allowed-file-extensions="png" data-height="100px" data-min-width="200" data-min-height="200" data-max-file-size="1M" class="dropify">
                    <img  src="" style="display: none; max-width: 700px; max-height:700" alt="Tanda Tangan Preview">
                    
                    <script>
                        const loadFile = (event) => {
                            const image = document.querySelectorAll('img')[0]
                            image.src = URL.createObjectURL(event.target.files[0])
                            
                            //3 arg verison
                            setTimeout(() => {
                                const width = image.width
                                const height = image.height
                                console.log(width, height)
                                let rectangleSide = 200
                                if (width > height) {
                                    rectangleSide = height
                                } else{
                                    rectangleSide = width
                                }
                            }, 300)

                        };
                    </script>
                    <input required type="hidden" name="hash" id="hash">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('.dropify').dropify({
        messages: {
            'default': 'Masukkan tanda tangan',
            'replace': 'Masukkan tanda tangan pennganti',
            'remove':  'Hapus',
            'error':   'Maaf, terjadi kesalahan.'
        },
        error: {
            'fileSize': 'Ukuran terlalu besar (1 mb max).',
            'minWidth': 'Gambar kurang lebar (200px min).',
            'minHeight': 'Bambar kurang tinggi (200px min).',
            'imageFormat': 'Format gambar tidak sesuai (png).',
            'fileExtension': 'Format berkas tidak sesuai (hanya png).'
        }
    })
    $('form').on('submit', function(event) {
        event.preventDefault()
        let fd = new FormData(this);
        var file_data = $('#signature').prop('files')[0];
        fd.append('file', file_data);
        $.ajax({
            url: '{{ route("sign") }}',
            type: 'POST',
            processData: false,
            contentType: false,
            data: fd,
            success: (res) => {
                console.log(res)
                $('modal').modal('hide')
                $('modal').on('hidden.bs.modal', function (e) {
                    $(':input','form')
                        .not(':button, :submit, :reset, input[name="_token"]')
                        .val(null)
                        .prop('checked', false)
                        .prop('selected', false)
                    $('#hash').val(hash)
                    $(".dropify-clear").trigger("click")
                })
            }
        })
    })
</script>