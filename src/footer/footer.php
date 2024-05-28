<footer class="flex items-center justify-center w-full text-white h-20">
    &copy; &nbsp;<span id="year"></span>&nbsp; Copyright AWSEM web applications
</footer>
<script>
    $('document').ready(
        function(){
            const date = new Date();
            const year = date.getFullYear();
            $('#year').append(year);
        }
    )
</script>