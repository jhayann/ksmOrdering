<html>
    
    haha welcome
    
    <body>
       <script src="{{URL::to('js/lib/jquery/jquery.min.js')}}"></script>
        <script>
        $(document).ready(function () {
    function disableBack() {window.history.forward()}

    window.onload = disableBack();
    window.onpageshow = function (evt) {if (evt.persisted) disableBack()}
        });
        </script>
    </body>
</html>