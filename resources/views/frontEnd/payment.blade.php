<!DOCTYPE html>
<html>
<head>
    <title>Proses Pembayaran</title>
</head>
<body>
    <h2>Mohon tunggu, membuka pembayaran...</h2>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    
    <script type="text/javascript">
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                alert("Pembayaran sukses!");
                window.location.href = "{{ route('frontEnd.index') }}";
            }
            , onPending: function(result) {
                alert("Menunggu pembayaran...");
                window.location.href = "{{ route('frontEnd.index') }}";
            }
            , onError: function(result) {
                alert("Pembayaran gagal.");
                window.location.href = "{{ route('frontEnd.index') }}";
            }
            , onClose: function() {
                alert("Popup ditutup tanpa menyelesaikan pembayaran.");
                window.location.href = "{{ route('frontEnd.index') }}";
            }
        });

    </script>
</body>
</html>
