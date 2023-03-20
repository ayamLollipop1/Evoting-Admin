<footer>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        <?php if (isset($_SESSION['message'])); ?>
        alertify.set('notifier', 'position', 'top-right');
        alertify.success('<?php echo $_SESSION['message']; ?>');
        <?php unset($_SESSION['message']); ?>
    </script>

    <script>
        <?php if (isset($_SESSION['warning'])); ?>
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('<?php echo $_SESSION['warning']; ?>');
        <?php unset($_SESSION['warning']); ?>
    </script>

    <script>
        <?php if (isset($_SESSION['msg'])); ?>
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('<?php echo $_SESSION['msg']; ?>');
        <?php unset($_SESSION['msg']); ?>
    </script>
</footer>

</body>

</html>