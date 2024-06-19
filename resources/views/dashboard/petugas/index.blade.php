@extends('layout.main')

@section('container')
<div class="container">

    @include('partials.aside')

    <div style="display: flex;align-items:center;justify-content:center" class="barcode-container">

        <div class="barcode">
            <h1>Tap absen anda disini</h1>
        <form action="/dashboard/petugas" method="POST" enctype="multipart/form-data" id="form">
            <video style="display:block" id="preview"></video>
            @csrf
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="nis" id="nis">
        </form>
        @if (session()->has('success'))
        <div style="text-align: center" class="alert alert-success" role="alert">
            {{  session('success') }}
          </div>
        @endif
        </div>
    </div>

    
    @if (session()->has('success'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <img src="..." class="rounded me-2" alt="...">
            <strong class="me-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            {{  session('success') }}
          </div>
        </div>
      </div>
    
    @endif


    <button style="display: none" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
        data-bs-whatever="@mdo">Open modal for @mdo</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('petugas.pesan') }}" method="POST" id="sendMessageForm">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="body" name="body"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="sendButton">Send message</button>
                    </div>
                </div>
            </div>
        </div>        
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script>
    $(document).ready(function() {
        $('#exampleModal').modal('hide'); // Sembunyikan modal saat halaman dimuat
    });

    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
        console.log(content);
        $('#id').val(content); // Mengisi nilai id dari hasil pemindaian QR code
        $('#nis').val(content); // Mengisi nilai nis dari hasil pemindaian QR code
        $('#form').submit(); // Mengirimkan form setelah nilai diisi
    });

    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });

    $('#sendButton').click(function(e) {
        e.preventDefault(); // Hindari pengiriman form secara langsung
        if ($('#sendMessageForm').valid()) {
            // Lakukan sesuatu di sini setelah validasi berhasil
            $('#sendMessageForm').submit(); // Contoh: mengirim form setelah validasi
        }
    });

    // Tangkap respons JSON dari controller
    $(document).on('submit', '#form', function(event) {
        event.preventDefault(); // Hindari pengiriman form secara langsung
        let formData = $(this).serialize();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    // Tampilkan modal jika operasi berhasil
                    $('#exampleModal').modal('show');
                } else {
                    // Tampilkan pesan kesalahan jika diperlukan
                    alert('Data Gagal atai Data sudah absen!');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat melakukan operasi.');
            }
        });
    });

</script>

@endsection
