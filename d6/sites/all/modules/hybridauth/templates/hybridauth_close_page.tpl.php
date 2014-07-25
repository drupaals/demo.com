<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Closing</title>
<script type="text/javascript">
  <!--//--><![CDATA[//><!--
  var redirect = <?php $redirect  ? print 'true' : print 'false'; ?>;
  if (window.opener && redirect){
    window.opener.parent.location.href = "<?php print url($destination, array('absolute' => TRUE)); ?>";
    window.self.close();
  }
  else if (window.opener) {
    window.opener.location.replace(window.opener.location.href);
    window.self.close();
  }
  else if (redirect) {
    window.location.href = "<?php print url($destination, array('absolute' => TRUE)); ?>";
  }
  else {
    window.location.replace(window.location.href);
  }
  //--><!]]>
</script>
</head>
<body>
<div>Closing</div>
</body>
</html>