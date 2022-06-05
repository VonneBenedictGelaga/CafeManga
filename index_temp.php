<html>
<head>
 <link rel="stylesheet" type="text/css" href="stylesheet.css" />
 <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
 <script type="text/javascript" src="jquery.autocomplete.js"></script>
 <script> 
 jQuery(function(){ 
 $("#search").autocomplete("search.php");
 });
 </script>
</head>
<body>
 <form action="get_form.php">
 Book Name : <input type="text" name="q" id="search" placeholder="Enter Book Name">
 <input type="submit" value="Submit"/>
 </form> 
</body>
</html>