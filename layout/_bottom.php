        </main>
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
<? require($_SERVER['DOCUMENT_ROOT'] . '/layout/_sidebar.php'); ?>
        </div>
      </div>
    </div>
<?# jQuery (necessary for Bootstrap's JavaScript plugins), with local fallback ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery.min.js"><\/script>')</script>
<?# Latest compiled and minified JavaScript ?>
    <script src="/assets/js/resume.min.js?ts=<? echo Config::$assetTimestamp ?>"></script>
  </body>
</html>