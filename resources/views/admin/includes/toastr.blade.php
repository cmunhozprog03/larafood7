@if (Session::has('record_added'))
    <script>
        toastr.success("{!! Session::get('record_added') !!}", "Registro", toastr.options = {
            "positionClass": "toast-bottom-right",
            "timeOut": "1500",
        })
        
    </script>
@endif
@if (Session::has('record_changed'))
    <script>
        toastr.success("{!! Session::get('record_changed') !!}", "Registro", toastr.options = {
            "positionClass": "toast-bottom-right",
            "timeOut": "1500",
        })
    </script>
@endif
@if (Session::has('record_exclused'))
    <script>
        toastr.success("{!! Session::get('record_exclused') !!}", "Registro", toastr.options = {
            "positionClass": "toast-bottom-right",
            "timeOut": "1500",
        })
    </script>
@endif