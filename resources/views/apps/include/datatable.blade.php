<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{url('theme/js/paging.js')}}"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableData').paging({limit:5});
    });
</script>