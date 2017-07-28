<DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>%TITLE%</title>

        <!-- Bootstrap -->
        <link href="/~user11/myphp/task7/templates/css/bootstrap.min.css" rel="stylesheet">

        <!-- My style -->
        <link href="/~user11/myphp/task7/templates/css/style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container mt-50">
            <div class="row">
                <div class="col-md-12">
                     <h1>Contact form</h1>
                 </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form action="index.php" method="post">
                        <div class="form-group">
                            <label class="custom-file">Name:</label>
                                <input type="text" name="name" class="custom-file-input">
                                %ERROR_NAME%
                             </div>
                            <div class="form-group">
                                 <label class="custom-file">Subject:</label>
                                 <select name="subject">
                                    <option value="0">Please select subject</option>
                                    <option value="Course HTML">Course HTML</option>
                                    <option value="Course PHP">Course PHP</option>
                                    <option value="Course PERL">Course PERL</option>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label class="custom-file">Email:</label>
                                <input type="email" name="email" class="custom-file-input" value="">
                             </div>

                            <div class="form-group">
                                 <label for="comment">Message:</label>
                                  <textarea name="message" class="form-control" rows="5" id="comment"></textarea>
                            </div>

                            <input type="submit" class="btn btn-info" value="Send">
                        </div>
                    </form>
                </div>
            </div>

   
        </div>
         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <!-- Include all compiled plugins (below), or include individual files as needed -->
         <script src="/~user11/myphp/task7/templates/js/bootstrap.min.js"></script>

    </body>
</html>

