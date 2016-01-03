<?php var_dump(isset($_GET['categoryid'])); ?>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://github.com/makeusabrew/bootbox/releases/download/v4.4.0/bootbox.min.js"></script>
<script>
    $(document).on("click", "#deleteBtn", function(e) {
        bootbox.confirm("Sure?", function(result) {
            var catId = $("form#editform").data("id");
            window.location = "category_delete.php?id="+catId;
        });
    });
</script>
</body>
</html>