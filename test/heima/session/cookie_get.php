<?php
var_dump($_COOKIE);
?>

<hr>
<button onclick="getCookie();">get Cookie</button>
<script type type="text/javascript">
function getCookie(){
    alert(document.cookie);
}
</script>