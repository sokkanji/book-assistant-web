<!DOCTYPE html>
<html>
    <head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/includeHtml.js"></script>
    <script type="text/javascript">
        function headerCompleted() {
            $("#header").html();
        }
        function footerCompleted() {
            $("#footer").html();
        }
    </head>
<body>
<include-html target="header.html" completed="headerCompleted"></include-html>

<include-html target="footer.html" completed="footerCompleted"></include-html>

<script>includeHtml();</script>

<?php

?>

</body>
</html>

