<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Products manager</title>
<LINK href="/css/style.css" type=text/css rel=stylesheet>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/profile.js"></script>
<script src="/js/jquery.validate.pack.js" type="text/javascript"></script>
<script type="text/javascript">
      $(document).ready(function(){
      $("#contactform").validate();
      });
  </script> 
</head>
<body>

    <?php include 'application/views/' . $content_view; ?>

</body>
</html>