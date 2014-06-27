<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nox b0t</title>
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Nox</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/">Home</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

        <div class="col-md-6">
            <p>
                <div class="btn-group">
                    <button class="btn btn-lg btn-default" id="status" ><span class="glyphicon glyphicon-refresh"></span></button>
                    <button class="btn btn-lg btn-default" id="active"  disabled="disabled"><span class="glyphicon glyphicon-stop"></span></button>
                </div>
            </p>
            <p>
                <div class="btn-group">
                    <button class="btn btn-success" data-action="active">Active</button>
                    <button class="btn btn-warning" data-action="suspend">Suspend</button>
                </div>
            </p>
            <p>
                  <div class="btn-group">
                    <button class="btn btn-primary" data-action="bot" data-bot-action="login"><span class="glyphicon glyphicon-log-in"></span></button>
                    <button class="btn btn-primary" data-action="bot" data-bot-action="planet.list">Planet List</button>
                    <button class="btn btn-primary" data-action="bot" data-bot-action="event.list">Fleet event</button>
                    <button class="btn btn-primary" data-action="bot" data-bot-action="planet.collect">Collect Ressource</button>
                  </div>
            </p>
            <p>
                  <div class="btn-group">
                    <button class="btn btn-primary" data-action="bot" data-bot-action="planet.builder">Build</button>
                    <button class="btn btn-primary" data-action="bot" data-bot-action="planet.shipyard">Fleet</button>
                    <button class="btn btn-primary" data-action="bot" data-bot-action="planet.defense">Defense</button>
                    <button class="btn btn-primary" data-action="bot" data-bot-action="planet.reserch">Research</button>
                </div>
            </p>
        </div>
        <div class="col-md-6">
            <pre id="output"></pre>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/app.js"></script>
  </body>
</html>
