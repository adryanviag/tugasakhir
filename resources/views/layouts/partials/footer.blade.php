<footer class="main-footer">
    <strong>Copyright &copy; 2021 Adryan Viag.</strong>
    All rights reserved.
</footer>
</div>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('dist/js/adminlte.js') }}"></script>

<script>
    $("#sm_select").change(function() {
        if ($(this).val() === 'Belum Dikerjakan' || $(this).val() === 'Berlangsung' || $(this).val() ===
            'Selesai') {
            $("#Penerima").attr("disabled", "disabled");
            $("#IsiDisposisi").attr("disabled", "disabled");
            $("#Catatan").attr("disabled", "disabled");
        } else {
            $("#Penerima").removeAttr("disabled");
            $("#IsiDisposisi").removeAttr("disabled");
            $("#Catatan").removeAttr("disabled");
        }
    }).trigger("change");
</script>
</body>

</html>
