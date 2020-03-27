<script src="{{asset('assets/app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/extensions/jquery.knob.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/extensions/knob.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/extensions/unslider-min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/core/app-menu.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/core/app.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/customizer.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/core/colors/palette-climacon.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/fonts/simple-line-icons/style.min.css')}}">
<script src="{{asset('assets/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/tables/datatables/datatable-advanced.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/modal/components-modal.min.js')}}"></script>

<script src="{{asset('assets/app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/forms/extended/typeahead/bloodhound.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/forms/extended/typeahead/handlebars.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/forms/extended/form-typeahead.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/forms/extended/form-inputmask.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/forms/extended/form-maxlength.min.js')}}"></script>

<script src="{{asset('assets/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/forms/form-repeater.min.js')}}"></script>
<script src="{{asset('js/jquery-3.4.1.slim.min.js')}}"></script>

<script src="{{asset('assets/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/forms/select/form-select2.min.js')}}"></script>

<script>
    $(function()
    {
        $(document).on('click', '.btn-add', function(e)
        {
            e.preventDefault();
            var controlForm = $('#myRepeatingFields:first'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);
            newEntry.find('input').val('');
            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="fa fa-minus"></span>');
        }).on('click', '.btn-remove', function(e)
        {
            e.preventDefault();
            $(this).parents('.entry:first').remove();
            return false;
        });

    });
</script>
<script >
    $(document).ready(function () {
        $('.hour').timePicker({
            timeFormat: 'HH:mm',
        });
    });
</script>