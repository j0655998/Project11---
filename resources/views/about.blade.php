<!doctype html>
<html lang="en">
<head>
    <link href="css/tw.css" rel="stylesheet"/>
</head>
<body>
    <div class='dashboard'>
        <div class="server-list"><slot></slot>
          <div class="server has-failed">
                <div class="server-icon fa fa-tasks">
                </div>
                <ul class="server-details">
                    <li>Hostname:<span class="data">www.google.com</span></li>
                  <li>Status: <span class='data signal'>Offline</span></li>
                  <li>Address: <span class='data'>192.168.0.24</span></li>
                </ul>
            </div>
          <div class="server">
                <div class="server-icon fa fa-globe">
                </div>
                <ul class="server-details">
                    <li>Hostname:<span class="data">www.google.com</span></li>
                  <li>Status: <span class='data signal'>Online</span></li>
                    <li>Address:<span class='data'>192.168.0.25</span></li>
                </ul>
            </div>
        </div>
        </div>






</body>
</html>
